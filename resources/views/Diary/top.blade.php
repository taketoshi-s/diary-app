@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TOP画面') }}</div>
                
                <div class="card-body">              

                    <img class="d-block mx-auto"　src="{{asset('image/diet_top.jpg')}}" alt=''>

                    <div class ="logins">
                        <div class ="login mx-3 my-3">
                            <form action="{{route('Diary.weight_record')}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-primary px-4 py-3">体重を記録</button>
                            </form>
                        </div>

                        <div class ="login mx-3 my-3">
                            <form action="{{route('Diary.food_record')}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-primary px-4 py-3">食事を記録</button>
                            </form>
                        </div>
                    </div>

                    <div class ="logins">
                        <div class ="login mx-3 my-3">
                            <form action="{{route('Diary.diary_history')}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-primary px-4 py-3">日記を書く</button>
                            </form>
                        </div>

                        <div class ="login mx-3 my-3">
                            <form action="{{route('Diary.friend_diary')}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-primary px-4 py-3">友達の日記</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection