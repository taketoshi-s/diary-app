@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('日記内容の確認') }}</div>

                <div class="card-body">
                    <form method = "post" action = "{{route('Diary.diary_save')}}">                        
                    @csrf                  
                    <!--運動-->
					<div class="today_weight">
                        <p class="text-center font-weight-bold h6">今日の運動</p>
                    </div>
                    
                    <table class="table table-borderless"　style= "max-width:350px; margin-top:20px;">
                        <tbody>
                            <tr>
                                <!-- 選択された運動の数に応じて表示を変える -->
                                @if(count($exercises) <=1)
                                <td class="text-center">
                                    @if($exercises[0] == '')
                                        <img src="{{asset('image/sleep_man.png')}}" alt="休む" width ='65' height = '50'>
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
                        
                    <table class="table table-bordered " style= "max-width:400px; margin-top:20px;">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">調子</th>
                                <th scope="col" class="text-center">充実度</th>
                                <th scope="col" class="text-center">努力</th>
                            </tr>
                        </thead>

						<tbody>
                            <!-- 選択されたそれぞれの項目に応じて表示を変える -->
                            <tr>
                                <td class="text-center">
                                    @if($input['condition'] ==1)
                                        <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                                    @elseif($input['condition'] == 2)
                                        <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                                    @elseif($input['condition'] == 3)
                                        <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                                    @elseif($input['condition'] == 4)
                                        <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                                    @elseif($input['condition'] == 5)
                                        <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                                    @endif
                                </td>
								<td class="text-center">
                                    @if($input['fullness'] == 1)
                                        <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                                    @elseif($input['fullness'] == 2)
                                        <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                                    @elseif($input['fullness'] == 3)
                                        <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                                    @elseif($input['fullness'] == 4)
                                        <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                                    @elseif($input['fullness'] == 5)
                                        <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                                    @endif
                                </td>
								<td class="text-center">
                                    @if($input['effort'] == 1)
                                        <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                                    @elseif($input['effort'] == 2)
                                        <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                                    @elseif($input['effort'] == 3)
                                        <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                                    @elseif($input['effort'] == 4)
                                        <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                                    @elseif($input['effort'] == 5)
                                        <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>

					<div class="today_weight">
                            <p class="text-center font-weight-bold h6">今日の出来事</p>
                            <p class="text-center font-weight-bold">{{$input["body"]}}</p>
                    </div>
                    
                    <div class="form-group row justify-content-center mt-5">
                        <input name="back" type="submit" value="戻る" class="btn btn-primary mx-2"/>
                        <input type="submit" value="送信" class="btn btn-primary mx-2" />
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
