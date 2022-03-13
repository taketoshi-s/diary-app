@extends('layouts.app')
<style>

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
                    <div class="text-center">
                    
                            <p class="text-center h6 mx-5">ニックネーム</p>
                            <p class="text-center font-weight-bold h4 mx-5 my-3">{{ $input["nickname"] }}<span p class="text-center h6 mx-1">さん</span></p>
                            
                    </div>
                
                    <div class="text-center"> 
                            <p class="text-center h6 mx-5">性別</p>
                            
                            @if($input["gender"] == 1)
                                <p class="text-center font-weight-bold h4 mx-5 my-3"> 女性</p>
                            @else
                                <p class="text-center font-weight-bold h4 mx-5 my-3"> 男性</p>
                            @endif
                    </div>

                    <div class="text-center"> 
                            <p class="text-center h6 mx-5">年齢</p>
                            <p class="text-center font-weight-bold h4 mx-5 my-3">{{ $input["age"] }}<span p class="text-center h6 mx-1">歳</span></p>
                    </div>

                    <div class="text-center"> 
                            <p class="text-center h6 mx-5">体重</p>
                            <p class="text-center font-weight-bold h4 mx-5 my-3">{{ $input["weight"] }}<span p class="text-center h6 mx-1">kg</span></p>
                    </div>

                    <div class="text-center"> 
                            <p class="text-center h6 mx-5">身長</p>
                            <p class="text-center font-weight-bold h4 mx-5 my-3">{{ $input["height"] }}<span p class="text-center h6 mx-1">cm</span></p>
                    </div>

                        <div class="form-group row justify-content-center mt-5">
                            <div class="mx-2">
                                <input name="back" type="submit" value="戻る" class="btn btn-primary"/>
                            </div>

                            <div  class="mx-2">
                            <input type="submit" value="登録" class="btn btn-primary" />
                            </div>
                                
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
