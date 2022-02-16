@extends('layouts.app')
<style>
.character-item {
   
}

.character-items {
    text-align: center;
    margin-top: 20 ;
    margin-bottom: 40;
    
}


</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ニックネーム登録') }}</div>

                <div class="card-body">
                    <form method = "post" action = "character_send">                        
                    @csrf                    
                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('ニックネーム') }}</label>
                            
                            <div class="col-md-6">
                            {{ $input["nickname"] }} さん
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('年齢') }}</label>
                            
                            <div class="col-md-6">
                            {{ $input["age"] }} 歳
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('体重') }}</label>
                            
                            <div class="col-md-6">
                            {{ $input["weight"] }} kg
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('身長') }}</label>
                            
                            <div class="col-md-6">
                            {{ $input["height"] }} cm
                            </div>
                        </div>
                                                
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input name="back" type="submit" value="戻る" class="btn btn-primary"/>
                                <input type="submit" value="送信" class="btn btn-primary" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
