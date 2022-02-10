<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\DB;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\WeightRecordRequest;
use App\Models\WeightRecord;
use App\Models\FoodRecord;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class WeightRecordController extends Controller
{
    private $validator = [
		
        'weight' => 'required|numeric|regex:/^([1-9][0-9]{0,2}0)(\.[0-9]{1})?$/|between:30,150|',
        
    ];
    
    //体重記録画面
    public function weight_record(Request $request)
    {   
        return view('Diary.weight_record');
    }
    
    //体重記録処理
    public function weight_record_save(WeightRecordRequest $request)
    {    
        
        //ログインしているユーザーを見つける
        $user = Auth::user()->id;
        
        //記録当日の日付
        $today=Carbon::today();
        
        
        
        
        //記録当日のデータを取得
        $today_weightrecord = DB::table('weight_records')
            ->whereDate('created_at','=' ,$today)//当日のデータ
            ->where('user_id','=',$user) //ユーザーID
            ->first();
        
        
        
        //今日のデータがあれば上書き、なければ新規に記録
        if(!empty($today_weightrecord)){
            
            $weightrecord = WeightRecord::find($today_weightrecord->id);
            $weightrecord->weight = $request->weight;
            $weightrecord->user_id = $request->user()->id;
            $weightrecord->save();
        }else{
           
            $weightrecord = new WeightRecord;
            $weightrecord->weight = $request->weight;
            $weightrecord->user_id =$request->user()->id;
            \Log::debug('empty');
            $weightrecord->save();
        }
        
        
        //\Log::debug($today_weightrecord);
        
       
        return redirect()->action('WeightRecordController@weight_result');
    }

    public function weight_result(Request $request)
    {    
        //記録当日の日付
        $today=Carbon::today();//当日
        
        //各々の日付
        $yesterday =Carbon::today()->subDay();//1日前
        $one_week_ago =Carbon::today()->subDay(7);//7日前
        $one_month_ago=Carbon::today()->subMonth();//当日
        
        //説明用の変数
        $week_msg = "";
        $Month_msg = "";
        $two_week_ago_record=[];
        $last_week_end_weight="";
        
        //登録時のid・体重
        $user_id = Auth::user()->id;
        $oldest_weight = Auth::user()->weight;
        
        //ログインしてるユーザーの体重記録を新しい順に取得
        $user_record = WeightRecord::where('user_id','=',$user_id)->orderBy('created_at', 'desc')->get();
        
        //ログインしてるユーザーの体重記録を一番新しいデータ　＝＝　今日の体重
        $today_record =$user_record[0];

        //ログインしてるユーザーの体重記録を一番新しいデータの日付　＝＝　今日の日付　でなければ戻る
        if($today_record->created_at->format('y-m-d') !== $today->format('y-m-d')){
          
            return redirect()->action("WeightRecordController@weight_record");
        }
        
        
        //取得したデータが2つ以上あれば、上から2番目のデータを取得
        if(!empty($user_record[1])){
            
            //前回の記録
            $last_record = $user_record[1];
            //前回との差
            $result_weight = $today_record->weight - $last_record->weight;
            //前回の日付
            $last_time_day = $last_record->created_at->format('m/d');

                if($result_weight == 0){
            
                    $msg = '現状維持や！！';
                }elseif($result_weight < 0){
                    
                    $msg = '前より痩せてるやん！！ええ感じや！';
                }else{
        
                    $msg = 'アカーン！前より増えてるやーん！！';
                }
        
        }else{
            
            $result_weight = 'ーーーー';
            $last_time_day ='ー/ー';
            $msg = '今日が初めての記録';

        }
       
        //1日前のデータがあれば条件に合わせてコメントを出す
       if(!empty($last_record) && $last_time_day == $yesterday->format('m/d')){
           
        //昨日の体重から今日の体重を引く
        $sub =$today_record->weight - $last_record->weight;
            //昨日の体重が今日の体重'以下'なら
            
            if($sub == 0){
            
                $msg = '昨日から現状維持や！！';
            
            }elseif($sub < 0){
                    
                $msg = '昨日より痩せてるやん！！ええ感じや！';
            
            }else{
        
                $msg = 'アカーン！昨日より増えてるやん！！';
            
        }
    }
    

        //先週のデータを取得
        $last_week_record = WeightRecord::whereDate('created_at','<=',$one_week_ago->endOfWeek())
            ->whereDate('created_at','>=',$one_week_ago->startOfWeek())
            ->where('user_id','=',$user_id)
            ->orderby('created_at','desc')
            ->first(); 
        
        if(!empty($last_week_record)){
            
            $Week_sub_weight = $today_record->weight - $last_week_record->weight;
        
        }else{

            $Week_sub_weight = '';               
        }
        
        
        $start = Auth::user()->created_at;# 開始日時 ＜ユーザー登録時＞
        $end = Carbon::today();# 終了日時

    if($start->format('y-m') == $today->format('y-m')){

        $month_day = $start;

    }else{

        $month_day = $one_month_ago;

    }

        $last_Month_record = WeightRecord::whereDate('created_at','>=',$month_day->startOfMonth())
            ->whereDate('created_at','<=',$month_day->endOfMonth())
            ->where('user_id','=',$user_id)
            ->orderby('created_at','desc')
            ->first();

            
        
        if(!empty($last_Month_record) && $last_Month_record->created_at->format('y-m-d') !== $today->format('y-m-d')){
            
            $Month_sub_weight = $today_record->weight - $last_Month_record->weight;
            
        }else{

            $Month_sub_weight = '';    
        }
      
        
    return view('Diary.weightresult',compact('today_record','today','msg','result_weight','last_time_day','week_msg','one_week_ago','two_week_ago_record','oldest_weight','last_week_end_weight','Month_sub_weight','Week_sub_weight'));
   
    }

}
