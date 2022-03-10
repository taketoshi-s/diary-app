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
                        <p class="text-center font-weight-bold h2 ">{{$today_record->weight}}</p>
                    </div>
                    

                    <div class="text-center mx-sm-2 mb-1 mt-2 py-3">
                    @if($last_record != '')
                        <div class = 'd-flex align-items-center justify-content-center'>
                            <p class="text-center font-weight-bold h6">前回との差</p>
                            <p class="text-center font-weight-bold h6 mx-1">({{$last_time_day}})</p>
                        </div>

                        @if($result_weight > 0)
                            <div class = 'd-flex align-items-center justify-content-center'>
                                <p class="text-center font-weight-bold h4">+{{round($result_weight,1)}}</p>
                                <p class="text-center font-weight-bold h4 mx-2">({{$last_record->weight}})</p>
                                </div>
                        @elseif($result_weight < 0)
                            <div class = 'd-flex align-items-center justify-content-center'>
                                <p class="text-center font-weight-bold h4">{{round($result_weight,1)}}</p>
                                <p class="text-center font-weight-bold h4 mx-2">({{$last_record->weight}})</p> 
                            </div>
                        @else
                            <div class = 'd-flex align-items-center justify-content-center'>
                                <p class="text-center font-weight-bold h4">{{round($result_weight,1)}}</p>
                                <p class="text-center font-weight-bold h4 mx-2">({{$last_record->weight}})</p>
                            </div>
                        @endif
                        
                        <!--  @if($result_weight > 0)
                            <p>画像①</p>
                        @elseif($result_weight < 0)
                            <p>画像②</p>
                        @else
                            <p>画像③</p>
                        @endif -->

                    @endif
                    </div>

                    <div class="text-center mx-sm-2 mb-1 mt-2 py-3">
                    @if(!empty($last_Month_record))
                        @if($last_Month_record->created_at->format('y-m') < $today->format('y-m'))
                            <div class = 'd-flex align-items-center justify-content-center'>
                                <p class="text-center font-weight-bold h6">今月の変動</p>
                                <p class="text-center font-weight-bold h6 mx-1">({{$last_Month_record->created_at->format('y-m')}})</p>
                            </div>

                            @if($Month_sub_weight > 0)
                                <div class = 'd-flex align-items-center justify-content-center'>
                                    <p class="text-center font-weight-bold h4">+{{round($Month_sub_weight,1)}}</p>
                                    <p class="text-center font-weight-bold h4 mx-2">({{$last_Month_record->weight}})</p>
                                </div>
                            @elseif($Month_sub_weight < 0)
                                <div class = 'd-flex align-items-center justify-content-center'>
                                    <p class="text-center font-weight-bold h4">{{round($Month_sub_weight,1)}}</p>
                                    <p class="text-center font-weight-bold h4 mx-2">({{$last_Month_record->weight}})</p> 
                                </div>
                            @else
                                <div class = 'd-flex align-items-center justify-content-center'>
                                    <p class="text-center font-weight-bold h4">{{round($Month_sub_weight,1)}}</p>
                                    <p class="text-center font-weight-bold h4 mx-2">({{$last_Month_record->weight}})</p>
                                </div>
                            @endif
                        
                        <!--  @if($result_weight > 0)
                            <p>画像①</p>
                        @elseif($result_weight < 0)
                            <p>画像②</p>
                        @else
                            <p>画像③</p>
                        @endif -->
                        @endif
                    @else
                        @if($start->format('y-m') == $today->format('y-m'))
                        <div class = 'd-flex align-items-center justify-content-center'>
                            <p class="text-center font-weight-bold h6">今月の変動</p>
                            <p class="text-center font-weight-bold h6 mx-1">({{ $start->format('y-m')}})</p>
                        </div>

                        <div class = 'd-flex align-items-center justify-content-center'>
                            @if($Month_sub_weight > 0)
                                <p class="text-center font-weight-bold h4">+{{round($Month_sub_weight,1)}}</p>
                            @else
                                <p class="text-center font-weight-bold h4">{{round($Month_sub_weight,1)}}</p>
                            @endif
                                <p class="text-center font-weight-bold h4 mx-2">({{ $oldest_weight}})</p>
                        </div>
                        @endif
                    @endif
                    </div>
        
                    <div class="today_comment">
                        <p class="text-center font-weight-bold h2 py-3">{{$msg}}</p>
                    </div>
                    
                    <div class = "icon-create-button">
                        <a href="/Diary/top">戻る</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection