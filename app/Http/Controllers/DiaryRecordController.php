<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\DB;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\WeightRecord;
use App\Models\FoodRecord;
use App\Models\Comments;
use App\Models\Diary;
use App\Models\Frends;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Http\Requests\DiaryRequest;

class DiaryRecordController extends Controller
{
    //characterstore用バリデーション
    private $validator = [
		
            'condition' => 'required',
            'fullness' => 'required',
            'effort' => 'required',
            'body' => 'required|max:255',
    ];

    //日記top　過去の日記一覧画面
    public function diary_history(Request $request){
        
        //記録当日の日付 (日記履歴欄で当日のデータのみ編集できるようにしたいため)
        $today=Carbon::today();
        //ログインしているユーザーの日記を取得
        $diaries = Diary::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();  
        
        
        
        return view('Diary.diary_history',compact('diaries','today')); 
    }

    //日記フォーム画面の呼び出し
    public function diary_record(Request $request)
    {   
         
        return view('Diary.diary_create');
    }
    
    //日記フォームの内容をセッションに保存
    public function diary_create(DiaryRequest $request)
    {   
        
        if ($request->has('exercise')) {

            $exercise = $request->exercise;

            $input['exercise'] = implode(",", $exercise);
        }
    
        $input['body'] = $request->body;
        $input['condition'] = $request->condition;
        $input['fullness'] = $request->fullness;
        $input['effort'] = $request->effort;
        

        //セッションに値を入れる
        $request->session()->put("diary_input", $input);

        return redirect()->action("DiaryRecordController@diary_create_confirm");
    }

    //日記内容の確認画面
    public function diary_create_confirm(Request $request){
        
        //セッションから値を取り出す
        $input = $request->session()->get("diary_input");
        
        $exercises = explode(",", $input['exercise']);
        
        //セッションに値が無い時は日記フォームに戻る
        if(!($input)){
           
            return redirect()->action("DiaryRecordController@diary_record");
        }
        
        return view('Diary.diary_create_confirm',["input" => $input,"exercises"=> $exercises]);
    }

    //日記の登録処理
    public function diary_save(Request $request){
       
        //セッションから値を取り出す
        $input = $request->session()->get("diary_input");
        //記録当日の日付
        $today=Carbon::today();
        
        //戻るボタンの処理
        if($request->has("back")){
            return redirect()->action("DiaryRecordController@diary_record")
        		->withInput($input);
                \Log::debug($input);
        }
        
        //記録当日のデータを取得
        $today_diaryrecord = DB::table('diaries')
            ->whereDate('created_at','=' ,$today)//当日のデータ
            ->where('user_id','=',Auth::user()->id) //ユーザーID
            ->first();
        
        
        
        //今日のデータがあれば上書き、なければ新規に記録
        if(!empty($today_diaryrecord)){

            $diary = Diary::find($today_diaryrecord->id);
            $diary->exercise = $input['exercise'];
            $diary->condition = $input['condition'];
            $diary->fullness = $input['fullness'];
            $diary->effort = $input['effort'];
            $diary->body = $input['body'];
            $diary->user_id = $request->user()->id;
            $diary->save();
            
            
        }else{
        
            //セッションの値をデータベースに保存
            $diary =new Diary;
            $diary->exercise = $input['exercise'];
            $diary->condition = $input['condition'];
            $diary->fullness = $input['fullness'];
            $diary->effort = $input['effort'];
            $diary->body = $input['body'];
            $diary->user_id = $request->user()->id;
            $diary->save();
        
        }

        //セッションを空にする
        $request->session()->forget("diary_input");

        return redirect()->action('DiaryRecordController@diary_history');
    }
    
    //＜日記を見る＞の画面
    public function diary_show($id)
    {   
        //選択した日記を取得
        $diary = Diary::find($id);
        $user = Auth::user();
        
        //コメントを取得
        $comments  = Comments::where('diary_id','=',$diary->id)->get();
        //コメントのユーザー情報を取得
        $comment_users = DB::table('users')->get();

        $exercises = explode(",", $diary->exercise);
        
        
        //選択した日記と同じ日付の<体重>を<WeightRecord>テーブルから取得
        $that_day_weight = WeightRecord::whereDate('created_at',$diary->created_at->format('y-m-d'))->where('user_id',$diary->user_id)->first();
        
        //選択した日記の日付より前で一番新しい日付の<体重>を<WeightRecord>テーブルから取得
        $last_day_weight = WeightRecord::whereDate('created_at','<',$diary->created_at->format('y-m-d'))
                                ->where('user_id',$diary->user_id)
                                ->orderBy('created_at','desc')
                                ->first();
 

        //上記のデータがあれば体重差を出し、なければ<-.-->を変数に代入　
        if(!empty($last_day_weight) && !empty($that_day_weight)){
            
            //計算結果　＝　日記の日付の体重　ー　日記の日付のひとつ前の体重
            $result_weight = $that_day_weight->weight - $last_day_weight->weight;
        }else{
            
            $result_weight = '＜ー.ーー＞';
        }
            
        return view('Diary.diary_show',compact('diary','that_day_weight','result_weight','last_day_weight','exercises','comments','comment_users','user'));
    }
    
    //日記編集　画面
    public function diary_edit($id)
    {   

        //選択した日記を取得
        $diary = Diary::find($id);
        return view('Diary.diary_edit')->with('diary',$diary);
    }

    //日記編集　処理
    public function diary_update(DiaryRequest $request,$id)
    {
        //選択した日記を取得
        $diary = Diary::find($id);
        
        if ($request->has('exercise')) {

            $exercise = $request->exercise;

            $exercises = implode(",", $exercise);
            $diary->exercise = $exercises;
        }
        
        $diary->condition = $request->condition;
        $diary->fullness = $request->fullness;
        $diary->effort = $request->effort;
        $diary->save();

        return redirect()->action('DiaryRecordController@diary_history');
    }

    public function frend_diary(Request $request)
    {
        //ログインしているユーザー
        $user = Auth::user();
        
        //フレンドのユーザーを取得
        $friends = Frends::where('user_id','=',$user->id)->get();
        //全ての日記を取得
        $diaries = Diary::orderBy('created_at','desc')->get();  
        
        //日記の作者を取得
        $authors = DB::table('users')->get();
        
        return view('Diary.frend_diary',compact('diaries','friends','authors'));
    }

    public function frend_diary_show ($id)
    {
       
        //選択した日記を取得
        $diary = Diary::find($id);
        //ログインしているユーザー
        $user = Auth::user();
        
        //コメントを取得
        $comments  = Comments::where('diary_id','=',$diary->id)->get();
        
        //コメントしたユーザー情報を取得
        $comment_users = DB::table('users')->get();
    
        $exercises = explode(",", $diary->exercise);
        
        //選択した日記と同じ日付の<体重>を<WeightRecord>テーブルから取得
        $that_day_weight = WeightRecord::whereDate('created_at',$diary->created_at->format('y-m-d'))->where('user_id',$diary->user_id)->first();
        
        //選択した日記の日付より前で一番新しい日付の<体重>を<WeightRecord>テーブルから取得
        $last_day_weight = WeightRecord::whereDate('created_at','<',$diary->created_at->format('y-m-d'))
                                ->where('user_id',$diary->user_id)
                                ->orderBy('created_at','desc')
                                ->first();
 

        //上記のデータがあれば体重差を出し、なければ<-.-->を変数に代入　
        if(!empty($last_day_weight) && !empty($that_day_weight)){
            
            //計算結果　＝　日記の日付の体重　ー　日記の日付のひとつ前の体重
            $result_weight = $that_day_weight->weight - $last_day_weight->weight;
        }else{
            
            $result_weight = '＜ー.ーー＞';
        }
            
        return view('Diary.frend_diary_show',compact('diary','that_day_weight','result_weight','last_day_weight','exercises','comments','comment_users','user'));
    }

    public function diary_comment_save (Request $request,$id)
    {
        //選択した日記を取得
        $diary = Diary::find($id);

        $diary_id = $diary->id;
        $comment = new comments;
        $comment->user_id = $request->user()->id;
        $comment->diary_id = $diary->id;
        $comment->body = $request->body;
        $comment->save();

        return redirect()->action('DiaryRecordController@frend_diary');
    }

    public function diary_comment_edit($id)
    {   

        //選択したコメントを取得
        $comment = Comments::find($id);

        return view('Diary.diary_comment_edit')->with('comment',$comment);
    }
    
    public function diary_comment_update(Request $request,$id)
    {
        //選択したコメントを取得
        $comment = Comments::find($id);
        
        $comment->user_id = $request->user()->id;
        $comment->diary_id = $comment->diary_id;
        $comment->body = $request->body;
        $comment->save();

        return redirect()->action('DiaryRecordController@frend_diary');
    }

    public function diary_comment_destroy($id) {
        
        //選択したコメントを取得
        $comment = Comments::find($id);
        
        $comment->delete();

        return redirect()->action('DiaryRecordController@frend_diary');
    }

    public function friend_find(Request $request) {
        
        $input = '';
    
        return view('Diary.friend_find',compact('input'));
    }

    public function friend_search(Request $request) {
        
        $input = $request->input;
         //ログインしているユーザー
        $user = Auth::user();
        $friend_user = User::where('name',$input)->first();
        
        
        return view('Diary.friend_find',compact('input','friend_user'));
    }

    public function friend_add(Request $request) {
        
        
        $friend_user = User::where('name',$request->input)->first();
        
        $friend = new frends;
        $friend->user_id =  $request->user()->id;
        $friend->friend_id =  $friend_user->id;
        $friend->save();
    
        return redirect()->action('DiaryRecordController@frend_diary');
    }

    public function friend_list(Request $request) {
        
        
        $friends = Frends::where('user_id','=',Auth::user()->id)->get();
        $users = DB::table('users')->get();
    
        return view('Diary.friend_list',compact('users','friends'));
    }

    public function friend_destroy($id) {
        
        //選択したコメントを取得
        $friend = Frends::find($id);
        
        $friend->delete();

        return redirect()->action('DiaryRecordController@friend_list');
    }

    
}
