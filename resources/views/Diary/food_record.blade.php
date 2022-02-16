@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ニックネーム登録') }}</div>
                <div class="card-body">
                    <form action="{{route('Diary.food_record_save')}}" method = "post">   
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="form-group row food">
                            <label for="nickname" class="col-md-5 col-form-label text-md-right">{{ __('朝ごはん') }}</label>

                            <div class="col-md-5">
                                @if(empty($today_eat->morning))
                                    <input type="text" name="morning" class="extenshion" id="extension" value ='0'>
                                @else
                                    <input type="text" name="morning" class="extenshion" id="extension" value ="{{$today_eat->morning}}">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row food">
                            <label for="age" class="col-md-5 col-form-label text-md-right">{{ __('昼ごはん') }}</label>

                            <div class="col-md-5">
                                @if(empty($today_eat->lunch))
                                    <input type="text" name="lunch" class="extenshion" id="extension" value ='0'>
                                @else
                                    <input type="text" name="lunch" class="extenshion" id="extension" value ="{{$today_eat->lunch}}">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row food">
                            <label for="weight" class="col-md-5 col-form-label  text-right">{{ __('夜ごはん') }}</label>

                            <div class="col-md-5">
                            @if(empty($today_eat->dinner))
                                <input type="text" name="dinner" class="extenshion" id="extension" value ="0">
                            @else
                                <input type="text" name="dinner" class="extenshion" id="extension" value ="{{$today_eat->dinner}}">
                            @endif
                            </div>
                        </div>

                        <div class="form-group row food">
                            <label for="height" class="col-md-5 col-form-label text-md-right">{{ __('間食') }}</label>

                            <div class="col-md-5">
                                @if(empty($today_eat->otherfood))
                                    <input type="text" name="otherfood" class="extenshion" id="extension" value ="0">
                                @else
                                    <input type="text" name="otherfood" class="extenshion" id="extension" value ="{{$today_eat->otherfood}}">
                                @endif
                            </div>
                        </div>

                        <div class="btn btn-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('記録') }}
                                </button>
                        </div>

                        <div class="today-consumed-cal mx-sm-2 mb-1 mt-2 py-3">
                            <p class="text-center font-weight-bold h6">総カロリー</p>
                            <p class="text-center font-weight-bold h6">{{$today_consumed_cal}}</p>
                        </div>

                        <div class="today-consumed-cal mx-sm-2 mb-1 mt-2 py-3">
                            <p class="text-center font-weight-bold h6">基礎代謝</p>
                            <p class="text-center font-weight-bold h6">{{round($bmr)}}</p>
                        </div>

                        <div class="today-consumed-cal mx-sm-2 mb-1 mt-2 py-3">
                            <p class="text-center font-weight-bold h6">総カロリー</p>
                            <p class="text-center font-weight-bold h6">{{round($day_all_cal)}}</p>
                        </div>
                    <div class = "icon-create-button">
                        <input class = "icon_back" name="back" type="submit" value="戻る" />
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection