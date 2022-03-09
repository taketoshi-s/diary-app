<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('日記内容の確認') }}</div>

                <div class="card-body">
                    <form method = "post" action = "{{route('Diary.diary_save')}}">                        
                    @csrf                  
					<div class="today_weight">
                            <p class="text-center font-weight-bold h6">今日の運動</p>
                    </div>
                        
                        <tbody>
                            <tr>
                        
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('今日の運動') }}</label>
                            
                            <div class="col-md-6">
                            @if(count($exercises) <=1)
								<td class="text-center">
                                @if($exercises[0] == '')
                                    <img src="{{asset('image/sleep_man.png')}}" alt="休む" width ='65' height = '50'>
                                @else
                                    <img src="{{asset($exercises[0]))}}" alt="走る" width ='65' height = '65'>
                                @endif
                                </td>
                            @elseif(count($exercises) <=2)
								<td class="text-center">
									<img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                </td>
                                <td class="text-center">
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                </td>

                            @elseif(count($exercises) <=3)
								<td class="text-center">
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                </td>
                                <td class="text-center">
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                </td>
                                <td class="text-center">
                                    <img src="{{asset($exercises[2])}}" alt="走る" width ='65' height = '65'>
                                </td>
                            @elseif(count($exercises) <=4)
                                
								<td class="text-center">
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                </td>
                                <td class="text-center">
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                </td>
                                <td class="text-center">
                                    <img src="{{asset($exercises[2])}}" alt="走る" width ='65' height = '65'>
                                </td>
                                <td class="text-center">
                                    <img src="{{asset($exercises[3])}}" alt="走る" width ='65' height = '65'>
								</td>
                            @endif
                            </tr>
                        </tbody>
                    </table>
                    
                        <!--調子-->
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('調子') }}</label>
                                @if($input['condition'] ==1)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                                    </div>
                                @elseif($input['condition'] == 2)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                                    </div>
                                @elseif($input['condition'] == 3)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                                    </div>
                                @elseif($input['condition'] == 4)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                                    </div>
                                @elseif($input['condition'] == 5)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                                    </div>
                                @endif
                        </div>
                        
                        <!--充実-->
                        <div class="form-group row">
                            <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('充実') }}</label>
                                @if($input['fullness'] == 1)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                                    </div>
                                @elseif($input['fullness'] == 2)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                                    </div>
                                @elseif($input['fullness'] == 3)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                                    </div>
                                @elseif($input['fullness'] == 4)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                                    </div>
                                @elseif($input['fullness'] == 5)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                                    </div>
                                @endif
                        </div>
                        
                        <!--努力-->
                        <div class="form-group row">
                            <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('努力') }}</label>
                                @if($input['effort'] == 1)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                                    </div>
                                @elseif($input['effort'] == 2)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                                    </div>
                                @elseif($input['effort'] == 3)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                                    </div>
                                @elseif($input['effort'] == 4)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                                    </div>
                                @elseif($input['effort'] == 5)
                                    <div class="col-md-6">
                                        <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                                    </div>
                                @endif
                        </div>
                        
                        <!--日記内容-->
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('日記') }}</label>
                            
                            <div class="col-md-6">
                            {{ $input["body"] }}
                            </div>
                        </div>
                                                
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input name="back" type="submit" value="戻る" class="btn btn-primary"/>
                                <input type="submit" value="送信"　class="btn btn-primary" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="today_weight">
                            <p class="text-center font-weight-bold h6">運動</p>
                    </div>

                    <table class="table table-borderless"　style= "max-width:350px; margin-top:20px;">
                        
                        <tbody>
                            <tr>
                                @if(count($exercises) <=1)
                                    <td class="text-center">
                                    @if($exercises[0] == '')
                                        <img src="{{asset('image/sleep_man.png')}}" alt="休む" width ='65' height = '65'>
                                    @else
                                        <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    @endif
                                    </td>
                                
                                @elseif(count($exercises) <=2)
                                    
                                    <td class="text-center">
                                        <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                    </td>

                                @elseif(count($exercises) <=3)

                                    <td class="text-center">
                                        <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset($exercises[2])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                
                                @elseif(count($exercises) <=4)

                                    <td class="text-center">
                                        <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset($exercises[2])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset($exercises[3])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                    
                    <table class="table table-bordered "　style= "max-width:400px; margin-top:20px;">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">調子</th>
                                <th scope="col" class="text-center">充実度</th>
                                <th scope="col" class="text-center">努力</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    @if($diary->condition ==1)
                                        <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                                    @elseif($diary->condition == 2)
                                        <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                                    @elseif($diary->condition == 3)
                                        <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                                    @elseif($diary->condition == 4)
                                        <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                                    @elseif($diary->condition == 5)
                                        <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($diary->fullness == 1)
                                        <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                                    @elseif($diary->fullness == 2)
                                        <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                                    @elseif($diary->fullness == 3)
                                        <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                                    @elseif($diary->fullness == 4)
                                        <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                                    @elseif($diary->fullness == 5)
                                        <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($diary->effort == 1)
                                        <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                                    @elseif($diary->effort == 2)
                                        <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                                    @elseif($diary->effort == 3)
                                        <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                                    @elseif($diary->effort == 4)
                                        <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                                    @elseif($diary->effort == 5)
                                        <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="today_weight">
                            <p class="text-center font-weight-bold h6">今日の出来事</p>
                                <!--日記の日付の体重 (同じ日付の体重があれば　true　なければ　else)-->
                            <p class="text-center font-weight-bold">{{$diary->body}}</p>
                    </div>