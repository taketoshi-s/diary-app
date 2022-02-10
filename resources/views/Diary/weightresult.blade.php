@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ニックネーム登録') }}</div>
                <div class="card-body">
                    
                    <p>今日の体重</p>
                    <p>{{$today_record->weight}}</p>
                    
                    <p>前回との差　{{$last_time_day}}</p>
                    @if($result_weight > 0)
                    <p>+{{round($result_weight,1)}}</p>
                    <p>画像①</p>
                    @elseif($result_weight < 0)
                    <p>{{round($result_weight,1)}}</p>
                    <p>画像②</p>
                    @else
                    <p>{{round($result_weight,1)}}</p>
                    <p>画像③</p>
                    @endif
                    
                    @if($Month_sub_weight != '')
                        <p>今月の変動</p>
                        @if($Month_sub_weight > 0)
                        <p>+{{round($Month_sub_weight,1)}}</p>
                        <p>画像①</p>
                        @elseif($Month_sub_weight < 0)
                        <p>{{round($Month_sub_weight,1)}}</p>
                        <p>画像②</p>
                        @elseif($Month_sub_weight == 0)
                        <p>{{round($Month_sub_weight,1)}}</p>
                        <p>画像③</p>
                        @endif
                    @endif

                    @if($Week_sub_weight != '')
                        <p>今週の変動</p>
                        @if($Week_sub_weight > 0)
                        <p>+{{round($Week_sub_weight,1)}}</p>
                        <p>画像①</p>
                        @elseif($Week_sub_weight < 0)
                        <p>{{round($Week_sub_weight,1)}}</p>
                        <p>画像②</p>
                        @elseif($Week_sub_weight == 0)
                        <p>{{round($Week_sub_weight,1)}}</p>
                        <p>画像③</p>
                        @endif
                    @endif


                    
                    
                    <p>コメント</p>
                    <p>{{$msg}}</p>

                    

                    @if(!empty($week_msg))
                    <p>ーーーーーーーーーーーーー(削除予定)ーーーーーーーーーーーーーーー</p>
                    <p>先週の結果({{$one_week_ago->startOfWeek()->format('m/d')}}~{{$one_week_ago->endOfWeek()->format('m/d')}})  説明用 先週以前の最終体重{{$two_week_ago_record->weight}}({{$two_week_ago_record->created_at->format('y-m-d')}})  先週の最終体重{{$last_week_end_weight}}</p> 
                    <p>{{$week_msg}}</p>
                    @endif

                    
                    <div class = "icon-create-button">
                        <a href="/Diary/top">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

