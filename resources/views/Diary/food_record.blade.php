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
                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('朝ごはん') }}</label>

                            <div class="col-md-6">
                                @if(empty($today_eat->morning))
                                    <input type="text" name="morning" class="extenshion" id="extension" value ='0'>
                                @else
                                    <input type="text" name="morning" class="extenshion" id="extension" value ="{{$today_eat->morning}}">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('昼ごはん') }}</label>

                            <div class="col-md-6">
                                @if(empty($today_eat->lunch))
                                    <input type="text" name="lunch" class="extenshion" id="extension" value ='0'>
                                @else
                                    <input type="text" name="lunch" class="extenshion" id="extension" value ="{{$today_eat->lunch}}">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('夜ごはん') }}</label>

                            <div class="col-md-6">
                            @if(empty($today_eat->dinner))
                                <input type="text" name="dinner" class="extenshion" id="extension" value ="0">
                            @else
                                <input type="text" name="dinner" class="extenshion" id="extension" value ="{{$today_eat->dinner}}">
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('間食') }}</label>

                            <div class="col-md-6">
                                @if(empty($today_eat->otherfood))
                                    <input type="text" name="otherfood" class="extenshion" id="extension" value ="0">
                                @else
                                    <input type="text" name="otherfood" class="extenshion" id="extension" value ="{{$today_eat->otherfood}}">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('記録') }}
                                </button>
                            </div>
                        </div>
               
                    <p>総カロリー</p>
                    <p>{{$today_consumed_cal}}</p>

                    <br>
                    <p>基礎代謝</p>
                    <p>{{round($bmr)}}</p>
                    
                    <p>総カロリー</p>
                    <p>{{round($day_all_cal)}}</p>
                    
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