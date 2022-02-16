@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TOP画面') }}</div>
                
                <div class="card-body">              

                    <img class="d-block mx-auto"　src="{{asset('image/diet_top.jpg')}}" alt=''>
                        
                    <div class="btn-toolbar">
                        <div class="btn-group top"　role="group">
                            <div class="btn btn-primary mr-3">
                                <form action="{{route('Diary.weight_record')}}" method="get">
                                @csrf
                                    <button type="submit" class="btn btn-primary">体重を記録</button>
                                </form>
                            </div>
                            
                            <div class="btn btn-primary mr-3">
                                <form action="{{route('Diary.food_record')}}" method="get">
                                @csrf
                                    <button type="submit" class="btn btn-primary">食事を記録</button>
                                </form>
                            </div>
                        </div>
                    </div>
                        
                    <div class="btn-toolbar">
                        <div class="btn-group top"　role="group">
                            <div class="btn btn-primary mr-3">
                                <form action="{{route('Diary.diary_history')}}" method="get">
                                @csrf
                                    <button type="submit" class="btn btn-primary">日記を書く</button>
                                </form>
                            </div>
                            
                            <div class="btn btn-primary mr-3">
                                <form action="{{route('Diary.friend_diary')}}" method="get">
                                @csrf
                                    <button type="submit" class="btn btn-primary">友達の日記</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection