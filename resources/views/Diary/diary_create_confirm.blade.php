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
                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('今日の運動') }}</label>
                            
                            <div class="col-md-6">
                            @if(count($exercises) <=1)
                               
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                               
                            @elseif(count($exercises) <=2)
                                
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                
                            @elseif(count($exercises) <=3)
                                
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                    <img src="{{asset($exercises[2])}}" alt="走る" width ='65' height = '65'>
                                
                            @elseif(count($exercises) <=4)
                                
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                    <img src="{{asset($exercises[2])}}" alt="走る" width ='65' height = '65'>
                                    <img src="{{asset($exercises[3])}}" alt="走る" width ='65' height = '65'>
                                
                            @endif
                            </div>
                        </div>
                        
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
@endsection
