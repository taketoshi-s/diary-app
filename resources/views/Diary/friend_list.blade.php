@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('友達日記一覧画面') }}</div>
                
                <div class="card-body">
                    <form action="{{route('Diary.diary_record')}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary">自分の日記を書く</button>
                    </form>
                    
                     <!--友達の日記）-->
                    <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
                        <tbody>
                            @if(!empty($friends))
                                    @foreach ($friends as $friend)
                                            @foreach ($users as $user)
                                                @if($user->id == $friend->friend_id)
                                                    <tr>
                                                        <!--日記の日付-->
                                                        <td>{{$user->nickname}}</td>
                                                        <!--日記の作者-->
                                                        <td>
                                                            <img src="{{asset($user->icon)}}" width="50" height="50">
                                                        </td>
                                                        <!--日記を見る-->
                                                        <td>
                                                            <form action="#" method="get">
                                                            @csrf
                                                                <button type="submit" class="btn btn-primary">詳細</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="{{ action('DiaryRecordController@friend_destroy', $friend->id)}}" method="post">
                                                            @csrf
                                                                <button type="submit" class="btn btn-primary">はずす</button>
                                                            </form>
                                                        </td>   
                                                    </tr>
                                                @endif
                                            @endforeach
                                    @endforeach
                            @endif
                    </table>
                    
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