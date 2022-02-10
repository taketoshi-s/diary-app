<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\DB;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\FoodRecordRequest;
use App\Models\WeightRecord;
use App\Models\FoodRecord;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class FoodRecordController extends Controller
{
    //食事記録処理
    public function food_record_save(FoodRecordRequest $request)
    {    
        
        //ログインしているユーザーを見つける
        $user = Auth::user()->id;
        
        //記録当日の日付
        $today=Carbon::today();
        
        //記録当日のデータを取得
        $today_foodrecord = DB::table('food_records')
            ->whereDate('created_at','=' ,$today)//当日のデータ
            ->where('user_id','=',$user) //ユーザーID
            ->get();
        
        //今日に体重記録をしていれば上書き
        if($today_foodrecord != '[]'){
            DB::table('food_records')
            ->whereDate('created_at','=' ,$today)//当日のデータ
            ->where('user_id','=',$user) //ユーザーID
            ->update([
                'morning' => $request->morning,
                'lunch' => $request->lunch,
                'dinner' => $request->dinner,
                'otherfood' => $request->otherfood
            ]);

            \Log::debug('emptyじゃない');
        }else{
           
            $foodrecord = new FoodRecord;
            $foodrecord->morning = $request->morning;
            $foodrecord->lunch = $request->lunch;
            $foodrecord->dinner = $request->dinner;
            $foodrecord->otherfood = $request->otherfood;
            $foodrecord->user_id =$request->user()->id;
            \Log::debug('empty');
            $foodrecord->save();
        }
        
        if($request->has("back")){
            return redirect('Diary/top');
        }
        
        //\Log::debug($today_foodrecord);
       
        
        return redirect()->action('FoodRecordController@food_record');
    }
    //食事記録画面
    public function food_record(Request $request)
    {   
        //ログインしているユーザーを見つける
        $user = Auth::user()->id;
        
        //記録当日の日付
        $today=Carbon::today();
        
        //記録当日のデータを取得
        $today_foodrecord = DB::table('food_records')
            ->whereDate('created_at','=' ,$today)//当日のデータ
            ->where('user_id','=',$user) //ユーザーID
            ->get();
        
        if($today_foodrecord != '[]'){
            
            $today_eat = $today_foodrecord[0];
            $today_consumed_cal = $today_eat->morning+$today_eat->lunch+$today_eat->dinner+$today_eat->otherfood;
        
        }else{
            
            $today_eat = '';
            $today_consumed_cal = 0;
        }
        
        $lastdata = DB::table('weight_records')
        ->where('user_id','=',$user)
        ->orderBy('id', 'desc')
        ->first();
    
        if(!empty($lastdata)){
        $bmr = 13.397 * $lastdata->weight + 4.799 * Auth::user()->height - 5.677 * Auth::user()->age + 88.362;
        }else{
        $bmr = 13.397 * Auth::user()->weight + 4.799 * Auth::user()->height - 5.677 * Auth::user()->age + 88.362;
        }
        
        if($request->has("back")){
            return redirect('Diary.top');
        }
        
        $day_all_cal = $today_consumed_cal - $bmr;
        
        return view('Diary.food_record',compact('today_eat','today_consumed_cal','bmr','day_all_cal'));
    }
}
