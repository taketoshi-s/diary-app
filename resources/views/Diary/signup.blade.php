@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">

                    <img class="d-block mx-auto"　src="{{asset('image/diet_top.jpg')}}" alt=''>
                    
                    <div class ="logins">
                        <div class ="login mx-5 my-5">
                        <a href="/login"><button class="btn btn-primary btn-lg " type="button">ログイン</button></a>
                        </div>

                        <div class ="login mx-5 my-5">
                        <a href="/register"><button class="btn btn-primary btn-lg " type="button">新規登録</button></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection