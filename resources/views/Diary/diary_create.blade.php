@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('日記記入画面') }}</div>
                
                <div class="card-body">              
                    <form action ="{{route('Diary.diary_create')}}"method="post">
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
                        
                        <!--運動-->
                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('今日の運動') }}</label>
                            
                            <div class="col-md-6">
                                <input type="checkbox" name="exercise[]" value="image/running_man.png">走る
                                <input type="checkbox" name="exercise[]" value="image/walking_man.png">歩く
                                <input type="checkbox" name="exercise[]" value="image/udetate_man.png">筋トレ
                                <input type="checkbox" name="exercise[]" value="image/weight_man.png">ウエイト
                            </div>
                        </div>
                            
                        <!--調子-->
                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('調子') }}</label>

                            <div class="col-md-6">
                                <input type="radio" name = "condition" value = 1>
                                <label for="contactChoice1"><img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '40' height = '40'></label>

                                <input type="radio" name = "condition" value = 2>
                                <label for="contactChoice1"><img src="{{ asset('image/futyou.png') }}" alt="不調" width = '40' height = '40'></label>

                                <input type="radio" name = "condition" value = 3>
                                <label for="contactChoice1"><img src="{{ asset('image/hutu.png') }}" alt="普通" width = '40' height = '40'></label>

                                <input type="radio" name = "condition" value = 4>
                                <label for="contactChoice1"><img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '40' height = '40'></label>

                                <input type="radio" name = "condition" value = 5>
                                <label for="contactChoice1"><img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '40' height = '40'></label>
                            </div>
                        </div>

                        <!--充実-->
                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('充実') }}</label>

                            <div class="col-md-6">
                                <input type="radio" name = "fullness" value = 1>
                                <label for="contactChoice1"><img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '40' height = '40'></label>

                                <input type="radio" name = "fullness" value = 2>
                                <label for="contactChoice1"><img src="{{ asset('image/futyou.png') }}" alt="不調" width = '40' height = '40'></label>

                                <input type="radio" name = "fullness" value = 3>
                                <label for="contactChoice1"><img src="{{ asset('image/hutu.png') }}" alt="普通" width = '40' height = '40'></label>

                                <input type="radio" name = "fullness" value = 4>
                                <label for="contactChoice1"><img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '40' height = '40'></label>

                                <input type="radio" name = "fullness" value = 5>
                                <label for="contactChoice1"> <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '40' height = '40'></label>
                            </div>
                        </div>

                        <!--努力-->
                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('努力') }}</label>

                            <div class="col-md-6">
                                <input type="radio" name = "effort" value = 1>
                                <label for="contactChoice1"><img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '40' height = '40'></label>

                                <input type="radio" name = "effort" value = 2>
                                <label for="contactChoice1"><img src="{{ asset('image/futyou.png') }}" alt="不調" width = '40' height = '40'></label>

                                <input type="radio" name = "effort" value = 3>
                                <label for="contactChoice1"><img src="{{ asset('image/hutu.png') }}" alt="普通" width = '40' height = '40'></label>

                                <input type="radio" name = "effort" value = 4>
                                <label for="contactChoice1"><img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '40' height = '40'></label>

                                <input type="radio" name = "effort" value = 5>
                                <label for="contactChoice1"> <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '40' height = '40'></label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('日記') }}</label>

                            <div class="col-md-6">
                                <textarea name="body" maxlength="255" cols="30" rows="10" ></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('確認') }}
                                </button>
                            </div> 
                        </div>
                        
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
