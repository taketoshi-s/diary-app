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

class DiaryController extends Controller
{
    private $Character_items = ["nickname", "age", "weight","height","icon",'gender'];
    
    //characterstore用バリデーション
    private $validator = [
		
            'nickname' => 'required|string|max:10',
            'age'=> 'required|integer|regex:/^[0-9]+$/i|between:10,100|', 
            'weight' => 'required','numeric','regex:/^[1-9][0-9]{0,2}(\.[0-9]{1,2})?$/','between:30,150',
            'height' => 'required|integer|regex:/^[0-9]+$/i|between:110,220|',
            'gender' => 'required|integer',
    
    ];
    
    //user_icon用バリデーション
    private $validator_icon = [
		
            'icon' => 'required',
    ];

    //ログイン・新規登録画面
    public function signup()
    {   
        return view('Diary.signup');
    }
    
    //アプリトップ画面
    public function top()
    {   
        $user_information = User::where('id', '=',Auth::user()->id)
                            ->first();
                            
        if(empty($user_information->nickname)){

            return redirect()->action("DiaryController@character_create");
        
        }
        return view('Diary.top');
    }
    
    //ニックネーム登録フォームを呼び出す処理
    public function character_create()
    {   
        return view('Diary.nickname');
    }
    
    //ニックネーム登録フォームに入力された内容をセッションに保存
    public function character_store(CharacterRequest $request)
    {       
        //フォームに入力された値をそれぞれに入れる
        $input = $request->only($this->Character_items);

        $validator = Validator::make($input, $this->validator);
        
        //バリデーションに掛かればフォームに戻る
        if($validator->fails()){
			
            return redirect()->action("DiaryController@character_create")
				->withInput()
				->withErrors($validator);
        }

        //セッションに値を入れる
        $request->session()->put("character_input", $input);

        return redirect()->action("DiaryController@character_confirm");

    }
    
    //ニックネーム登録フォームに入力された内容の確認画面
    public function character_confirm(Request $request){
        
        //セッションから値を取り出す
        $input = $request->session()->get("character_input");
        
        //セッションに値が無い時はフォームに戻る
        if(!($input)){

            return redirect()->action("DiaryController@character_create");
        }
        
        return view('Diary.character_confirm',["input" => $input]);
    }
    
    //ニックネーム登録フォームに入力された内容の登録処理
    public function character_send(Request $request){

        //セッションから値を取り出す
        $input = $request->session()->get("character_input");
            
        //戻るボタンの処理
        if($request->has("back")){
            return redirect()->action("DiaryController@character_create")
                ->withInput($input);
        }
        
        //セッションに値が無い時はフォームに戻る (後々解決)
        if(!$input){

            return redirect()->action("DiaryController@character_create");
        }
    
        //セッションに値が無い時はフォームに戻る※
        if(empty($input['nickname'])){
        
            return redirect()->action("DiaryController@character_create");
        }
        
        //セッションの値をデータベースに保存
        $character = Auth::user();
        $character->nickname = $input['nickname'];
        $character->age = $input['age'];
        $character->weight = $input['weight'];
        $character->height = $input['height'];
        $character->gender = $input['gender'];
        $character->save();
    
        return redirect()->action('DiaryController@icon_select');
    }

    //アイコン登録画面を呼び出す処理
    public function icon_select(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("character_input");
        \Log::debug($input);
        
        return view('Diary.icon',["input" => $input]);
    }

    //登録ボタンで送信された画像パスをセッションに保存
    public function icon_store(Request $request)
    {
        //画像クリック時に登録ボタンに入力される画像パスを変数に代入
        $input = $request->only($this->Character_items);
        
        $validator = Validator::make($input, $this->validator_icon,);
        
        //バリデーションに掛かればアイコン選択画面に戻る
        if($validator->fails()){
			
            return redirect()->action("DiaryController@icon_select")
				->withInput()
				->withErrors($validator);
        }
        
        //セッションに値を入れる
        $request->session()->put("character_input", $input);

        return redirect()->action("DiaryController@icon_confirm");
    }

    //選択されたアイコンの確認画面
    public function icon_confirm(Request $request){
        
        //セッションから値を取り出す
        $input = $request->session()->get("character_input");
        
        //セッションに値が無い時はフォームに戻る
        if(!$input){
        
            return redirect()->action("DiaryController@icon_select");
        }

        return view('Diary.icon_confirm',["input" => $input]);
    }	
    
    //選択されたアイコンの登録処理
    public function icon_send(Request $request){
        //セッションから値を取り出す
        $input = $request->session()->get("character_input");
        
        //戻るボタンの処理
        if($request->has("back")){
            return redirect()->action("DiaryController@icon_select")
                ->withInput($input);
        }
        
        
        //セッションに値が無い時はフォームに戻る
        if(!$input){
        
            return redirect()->action("DiaryController@icon_select");
        }
        
        //セッションの値を登録
        $user = Auth::user();
        $user->icon = $input['icon'];
        $user->save();
        
        //セッションを空にする
        $request->session()->forget("character_input");
        
        return redirect()->action('DiaryController@top');
    }

    //登録内容の変更画面呼び出し処理
    public function character_edit(Request $request){

        //ログインしているユーザーの情報を表示
        $character = Auth::user();

        return view('Diary.character_edit',compact('character'));
    }

    //登録内容の変更処理
    public function character_update(CharacterRequest $request){

        //ログインしているユーザーの情報
        $character = Auth::user();
        
        //ログインしているユーザーの情報の登録処理
        $character->nickname = $request->nickname;
        $character->gender = $request->gender;
        $character->age = $request->age;
        $character->height = $request->height;
        $character->weight = $request->weight;
        $character->save();

        return redirect()->action('DiaryController@top');
    }
    
    //履歴画面表示
    public function history(Request $request)
    {   
        return view('Diary.history');
    }
    
    //体重記録の履歴画面表示
    public function weight_history(Request $request)
    {   
        $user = Auth::id();
        
        //ログインしているユーザーのweight_recprdsテーブルのデータを取得
        $weights = WeightRecord::where('user_id', '=', $user)
                ->orderBy('created_at', 'desc')
                ->get();

        return view('Diary.weight_history',compact('weights'));
    }
    //食事記録の履歴画面表示
    public function food_history(Request $request)
    {   
        $user = Auth::id();
        
        //ログインしているユーザーのFood_recprdsテーブルのデータを取得
        $foods = FoodRecord::where('user_id', '=', $user)
                ->orderBy('created_at', 'desc')
                ->get();
        
        //ログインしているユーザーのweight_recprdsテーブルのデータを取得
        $weight_data = DB::table('weight_records')
                ->where('user_id', '=', $user)
                ->get();
        
        //ログインしているユーザーのweight_recprdsテーブルのデータがあればtrue,なければfalseでusersテーブルの情報を取得
        if(!empty($last_weight_data)){
            
            //基礎代謝の計算
            $bmr = 13.397 * $weight_data->weight + 4.799 * Auth::user()->height - 5.677 * Auth::user()->age + 88.362;
        
        }else{
            
            $weight_data = '';
            $bmr = 13.397 * Auth::user()->weight + 4.799 * Auth::user()->height - 5.677 * Auth::user()->age + 88.362;
        }
                

        return view('Diary.food_history',compact('foods','bmr','weight_data'));
    }
}