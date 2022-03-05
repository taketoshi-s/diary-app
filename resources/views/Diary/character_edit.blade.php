@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('会員登録') }}</div>

                <div class="card-body">
                <form method = "post" action = "{{route('Diary.character_update')}}">    
                    @csrf
                        <div class="form-group text-right row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ニックネーム') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{$character->nickname}}" required autocomplete="name" autofocus>

                                @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('性別') }}</label>
                            
                            <div class="col-md-6">
                                <select class="form-select @error('gender') is-invalid @enderror" aria-label="Default select example" name="gender" value="{{$character->gender}}">
                                    @if($character->gender == 1)
                                        <option value="1" selected>女性</option>
                                        <option value="2">男性</option>
                                    @elseif($character->gender == 2)
                                        <option value="1">女性</option>
                                        <option value="2"  selected>男性</option>
                                    @endif
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('年齢') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{$character->age}}" required autocomplete="age">

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('最初の体重') }}</label>

                            <div class="col-md-6">
                            <input type="text" class="form-control @error('height') is-invalid @enderror" name="weight" value="{{ $character->weight}}" required autocomplete="height">
                            @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('身長') }}</label>

                            <div class="col-md-6">
                            <input type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ $character->height}}" required autocomplete="height">
                            @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    
                        </div>

                        <div class="form-group row justify-content-center mt-5">
                            
                                <button type="submit" class="btn btn-primary">
                                    {{ __('変更') }}
                                </button>
                                
                        </div>
                    </form>

                    <div class="form-group row justify-content-center mt-5">
                            
                        <a href="/Diary/top"><button class="btn btn-primary">TOPへ</button></a>
                                
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection