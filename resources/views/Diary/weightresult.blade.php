@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('体重結果') }}</div>
                <div class="card-body">
                    
                    <div class="today_weight">
                        <p class="text-center font-weight-bold h4">今日の体重</p>
                        <p class="text-center font-weight-bold h2">{{$today_record->weight}}</p>
                    </div>
                    
                    <div class="last_weight d-flex justify-content-start d-flex align-items-center mx-sm-2 mb-1 mt-2 py-3">
                        <p class="text-left font-weight-bold h6">前回との差</p>
                        @if($result_weight > 0)
                        <p class="text-left font-weight-bold h4 mx-5">+{{round($result_weight,1)}}</p>
                        @elseif($result_weight < 0)
                        <p class="text-left font-weight-bold h4 mx-5">{{round($result_weight,1)}}</p>
                        @else
                        <p class="text-left font-weight-bold h4 mx-5">{{round($result_weight,1)}}</p>
                        @endif
                        
                        
                        <p class="text-left font-weight-bold h6">＜{{$last_time_day}}＞</p>
                        <p class="text-left font-weight-bold h4 mx-5">{{$last_record->weight}}</p>
                        
                        @if($result_weight > 0)
                        <p>画像①</p>
                        @elseif($result_weight < 0)
                        <p>画像②</p>
                        @else
                        <p>画像③</p>
                        @endif
                    </div>
                    
                    @if($Month_sub_weight != '')
                        <div class="toManth_weight d-flex justify-content-start d-flex align-items-center mx-sm-2 mb-1 mt-2 py-3">
                            <p class="text-left font-weight-bold h6">今月の変動</p>
                            @if($Month_sub_weight > 0)
                            <p class="text-left font-weight-bold h4 mx-5">+{{round($Month_sub_weight,1)}}</p>
                            @elseif($Month_sub_weight < 0)
                            <p class="text-left font-weight-bold h4 mx-5">{{round($Month_sub_weight,1)}}</p>
                            @elseif($Month_sub_weight == 0)
                            <p class="text-left font-weight-bold h4 mx-5">{{round($Month_sub_weight,1)}}</p>
                            @endif

                            <p class="text-left font-weight-bold h6">＜{{$last_Month_record->created_at->format('y-m')}}＞</p>
                            <p class="text-left font-weight-bold h4 mx-5">{{$last_Month_record->weight}}</p>

                            @if($Month_sub_weight > 0)
                            <p>画像①</p>
                            @elseif($Month_sub_weight < 0)
                            <p>画像②</p>
                            @elseif($Month_sub_weight == 0)
                            <p>画像③</p>
                            @endif
                        </div>
                    @endif

                    <div class="today_comment">
                        <p class="text-center font-weight-bold h2 py-3">{{$msg}}</p>
                    </div>

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

