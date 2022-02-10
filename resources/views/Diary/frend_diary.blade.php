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
                    
                    <!--友達一覧　（仮）-->
                    @if(!empty($friends))
                        @foreach ($friends as $friend)
                            @foreach ($authors as $author)
                                @if($author->id == $friend->friend_id)
                                    <p>{{$author->nickname}}</p>
                                @endif
                            @endforeach
                        @endforeach
                    @endif

                     <!--友達の日記）-->
                    <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
                        <tbody>
                            @if(!empty($friends))
                                @foreach ($diaries as $diary)
                                    @foreach ($friends as $friend)
                                        @if($diary->user_id == $friend->friend_id)
                                            @foreach ($authors as $author)
                                            @if($diary->user_id == $author->id)
                                                <tr>
                                                    <!--日記の日付-->
                                                    <td>{{$diary->created_at->format('m/d')}}</td>
                                                    <!--日記の作者-->
                                                    <td>
                                                        {{$author->nickname}}
                                                        <br>
                                                        <img src="{{asset($author->icon)}}" width="50" height="50">
                                                    </td>
                                                    <!--日記を見る-->
                                                    <td>
                                                        <form action="{{ action('DiaryRecordController@frend_diary_show', $diary->id) }}" method="get">
                                                        @csrf
                                                            <button type="submit" class="btn btn-primary">見る</button>
                                                        </form>
                                                    </td>   
                                                </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                    </table>
                    
                    <form action="{{route('Diary.top')}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary">TOPへ</button>
                    </form>

                    <form action="{{route('Diary.friend_find')}}" method="get">
                    @csrf
                        <button type="submit" class="btn btn-primary">友達追加</button>
                    </form>  

                    <form action="{{route('Diary.friend_list')}}" method="get">
                    @csrf
                        <button type="submit" class="btn btn-primary">友達一覧</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection