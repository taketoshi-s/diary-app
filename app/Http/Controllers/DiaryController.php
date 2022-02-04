<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\DB;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CharacterRequest;
use App\Models\WeightRecord;
use App\Models\FoodRecord;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
//lllllllll
class DiaryController extends Controller
{
    private $Characteritems = ["nickname", "age", "weight","height","icon"];
    
    //characterstore用バリデーション
    private $validator = [
		
            'nickname' => 'required|string|max:10',
            'age'=> 'required|integer|regex:/^[0-9]+$/i|between:10,100|', 
            'weight' => 'required','numeric','regex:/^[1-9][0-9]{0,2}(\.[0-9]{1,2})?$/','between:30,150',
            'height' => 'required|integer|regex:/^[0-9]+$/i|between:110,220|',
    
    ];
    
    //user＿icon用バリデーション
    private $validator_icon = [
		
            'icon' => 'required',
    ];

    //ログイン・新規登録画面
    public function signup()
    {   
        return view('Diary.signup');
    }
    
    //アプリトップ画面（現状、手はほとんどつけていません）
    public function top()
    {   
        return view('Diary.top');
    }
    
    //ニックネーム登録フォームを呼び出す処理
    public function charactercreate()
    {   
        return view('Diary.nickname');
    }
    
    //ニックネーム登録フォームに入力された内容をセッションに保存
    public function characterstore(CharacterRequest $request)
    {       
        //フォームに入力された値をそれぞれに入れる
        $input = $request->only($this->Characteritems);
        
        $validator = Validator::make($input, $this->validator);
        
        //バリデーションに掛かればフォームに戻る
        if($validator->fails()){
			
            return redirect()->action("DiaryController@charactercreate")
				->withInput()
				->withErrors($validator);
        }
   
        //セッションに値を入れる
        $request->session()->put("character_input", $input);

        return redirect()->action("DiaryController@characterconfirm");

    }
    
    //ニックネーム登録フォームに入力された内容の確認画面
    public function characterconfirm(Request $request){
        
        //セッションから値を取り出す
        $input = $request->session()->get("character_input");
        
        //セッションに値が無い時はフォームに戻る
        if(!($input)){
           
            return redirect()->action("DiaryController@charactercreate");
        }
        
        return view('Diary.characterconfirm',["input" => $input]);
    }
    
    //ニックネーム登録フォームに入力された内容の登録処理
    public function charactersend(Request $request){
       
        //セッションから値を取り出す
        $input = $request->session()->get("character_input");
            
        //戻るボタンの処理
        if($request->has("back")){
            return redirect()->action("DiaryController@charactercreate")
        		->withInput($input);
                \Log::debug($input);
        }
        
        //セッションに値が無い時はフォームに戻る (後々解決)
        if(!$input){
          
            return redirect()->action("DiaryController@charactercreate");
        }
    
        //セッションに値が無い時はフォームに戻る※
        if(empty($input['nickname'])){
          
            return redirect()->action("DiaryController@charactercreate");
        }
        
        //セッションの値をデータベースに保存
        $character = Auth::user();
        $character->nickname = $input['nickname'];
        $character->age = $input['age'];
        $character->weight = $input['weight'];
        $character->height = $input['height'];
        $character->save();
    
        return redirect()->action('DiaryController@iconselect');
    }
   
    //アイコン登録画面を呼び出す処理
    public function iconselect(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("character_input");
        \Log::debug($input);
        
        return view('Diary.icon',["input" => $input]);
    }

    //登録ボタンで送信された画像パスをセッションに保存
    public function iconstore(Request $request)
    {
        //画像クリック時に登録ボタンに入力される画像パスを変数に代入
        $input = $request->only($this->Characteritems);
        \Log::debug($input);
        
        $validator = Validator::make($input, $this->validator_icon,);
        
        //バリデーションに掛かればアイコン選択画面に戻る
        if($validator->fails()){
			
            return redirect()->action("DiaryController@iconselect")
				->withInput()
				->withErrors($validator);
        }
        
        //セッションに値を入れる
        $request->session()->put("character_input", $input);

        return redirect()->action("DiaryController@iconconfirm");
    }

    //選択されたアイコンの確認画面
    public function iconconfirm(Request $request){
        
        //セッションから値を取り出す
        $input = $request->session()->get("character_input");
        
        //セッションに値が無い時はフォームに戻る
        if(!$input){
           
            return redirect()->action("DiaryController@iconselect");
        }

        return view('Diary.iconconfirm',["input" => $input]);
    }	
    
    //選択されたアイコンの登録処理
    public function iconsend(Request $request){
        //セッションから値を取り出す
        $input = $request->session()->get("character_input");
        
        //戻るボタンの処理
        if($request->has("back")){
            return redirect()->action("DiaryController@iconselect")
        		->withInput($input);
                \Log::debug($input);
        }
        
        
        //セッションに値が無い時はフォームに戻る
        if(!$input){
          
            return redirect()->action("DiaryController@iconselect");
        }
    
        $user = Auth::user();
        $user->icon = $input['icon'];
        $user->save();
        \Log::debug($input['icon']);
        //セッションを空にする
        $request->session()->forget("character_input");
        
        return redirect()->action('DiaryController@top');
    }
    
    public function history(Request $request)
    {   
        $start = Auth::user()->created_at;# 開始日時 ＜ユーザー登録時＞
        $end = Carbon::today();# 終了日時
        
        $period = CarbonPeriod::start(Auth::user()->created_at)->untilNow()->toArray();
        foreach($period as $carbon){
            
        }
        $records = WeightRecord::where('user_id',Auth::user()->id)->get();
        
        
        rsort($period);
        return view('Diary.history',compact('period','records'));
    }

    public function history_show(Request $request)
    {   
        
        return view('Diary.history');
    }
    
    public function sample(Request $request)
    {   
        $avg_Weight_Record=[];
        $max_Weight_Record=[];
        $min_Weight_Record=[];

        $target_days = [
            "2021-11-02",
            "2021-11-05",
            "2021-11-06",
        ];

        foreach($target_days as $created_at){

            list($avg,$max,$min) = $this->getWeightRecordDate($created_at);
            $avg_Weight_Record[] = $avg;
            $max_Weight_Record[] = $max;
            $min_Weight_Record[] = $min;
        }
    
        return view('Diary.sample',[
            'lavel' => [
                '2021年10月',
                '2021年11月', 
            ],
            'avg_Weight_Record' => $avg_Weight_Record,
            'max_Weight_Record' => $max_Weight_Record,
            'min_Weight_Record' => $min_Weight_Record,
        
        ]);
    }

    function getWeightRecordDate($created_at)
    {   
        $sum = 0;
        $max = 0;
        $min = 500;
        $logs = WeightRecord::where('created_at','like',$created_at.'%')->where('user_id',Auth::user()->id)->get();
        
        
        foreach($logs as $log){
            
            $weight = $log->weight;
            $sum += $weight;
            $max = max($max,$weight);
            $min = min($min,$weight);
        }

        $avg = ($logs->count() > 0) ? $sum / $logs->count() : 0;

        return[
            $avg.
            $max.
            $min
        ];
    }


    








    
    


    public function jjj(Request $request)
    {   
        $start = Auth::user()->created_at->format('Y-m-d'); # 開始日時
        $end = Carbon::today()->format('Y-m-d');
        
        for ($i = $start; $i <= $end; $i = date('Y-m-d', strtotime($i . '+1 day'))) {
            
                $onedays_rc =DB::table('weight_records')->select('weight')
                ->whereDate('created_at','=',$i)
                ->where('user_id','=',Auth::user()->id)
                ->first(); //ユーザーID->get();
                
        }
        return view('Diary.sample');

        $onedays_rc =DB::table('weight_records')->select('weight')
                ->whereDate('created_at','=',$today->format('y-m-d'))
                ->where('user_id','=',Auth::user()->id)
                ->first(); //ユーザーID->get();
        
        
        if(!empty($onedays_rc)){
            $result_w = $onedays_rc->weight;
        }else{
            
            $result_w = '記録なし';
        }
    }
    
    public function samplesave(Request $request)
    {   
        
        $weightrecord = new WeightRecord();
        $weightrecord->weight= $request->weight;
        \Log::debug($weightrecord);
        $weightrecord->save();}
        
}