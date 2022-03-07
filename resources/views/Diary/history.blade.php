@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('日記一覧画面') }}</div>
                
                <div class="card-body">

                    <div class ="logins">
                        <div class ="login mx-5 my-5">
                            <form action="{{route('Diary.weight_history')}}" method="get">
                            @csrf
                                <button class="btn btn-primary btn-lg" type="submit">体重履歴</button>
                            </form>
                        </div>

                        <div class ="login mx-5 my-5">
                            <form action="{{route('Diary.food_history')}}" method="get">
                            @csrf
                                <button class="btn btn-primary btn-lg" class="btn btn-primary">食事記録</button>
                            </form>
                        </div>
                    </div>
                    
                    <form action="{{route('Diary.top')}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary">TOPへ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection