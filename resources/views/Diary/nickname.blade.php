@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('会員登録') }}</div>

                <div class="card-body">
                    <!-- モーダルウィンドウを起動するボタン -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#MODAL1">登録方法②</button><br>
                    <!-- ここからモーダル -->
                    <div class="modal fade" id="MODAL1">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <p>登録方法</p>
                                </div>
                                
                                
                                <div class="modal-body">
                                    <p>[ニックネーム]</p>
                                    <p>・10文字以内で入力してください。<br>
                                        ・全角もしくは半角文字で入力してください。
                                    </p>
                                    <p>[年齢]</p>
                                    <p>・半角数字で入力してください。<br>
                                        ・整数で入力してください。<br>
                                        ・10歳〜100歳で入力してください<br>
                                    </p>
                                    
                                    <p>[性別]</p>
                                    <p>・該当する項目を選択してください。</p>
                                    
                                    <p>[体重]</p>
                                    <p>・半角数字で入力してください。<br>
                                        ・小数点第一位の数まで入力可能です。<br>
                                        ・30〜150の間で入力してください。<br>
                                    </p>

                                    <p>[身長]</p>
                                    <p>・半角数字で入力してください。<br>
                                        ・整数で入力してください。<br>
                                        ・110〜220の間で入力してください。<br>
                                    </p>
                                </div>

                            </div> <!-- modal-content -->
                        </div>  <!-- modal-dialog -->
                    </div>  <!-- modal fade -->

                <form method = "post" action = "{{route('Diary.character_store')}}">    
                    @csrf
                        <div class="form-group text-right row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ニックネーム') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="name" autofocus>

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
                                <select class="form-select @error('gender') is-invalid @enderror" aria-label="Default select example" name="gender" value="{{ old('gender') }}">
                                    <option selected>性別を選択してくだい</option>
                                    <option value="1">女性</option>
                                    <option value="2">男性</option>
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
                                <input id="name" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age">

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('体重') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required autocomplete="weight">

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
                            <input type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" required autocomplete="height">
                            @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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