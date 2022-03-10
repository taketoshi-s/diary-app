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
                        <button type="submit" class="btn btn-outline-primary">自分の日記を書く</button>
                    </form>
                    
                    <!--友達の日記）-->
                    <table class="table table-bordered table-striped" style= "max-width:800px; margin-top:20px;">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">日付</th>
                                <th scope="col" class="text-center">ユーザー</th>
                                <th scope="col" class="text-center">閲覧</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <!-- ログインユーザーのフレンドがいれば、そのフレンドの日記とユーザー名を表示 -->
                            @if(!empty($friends))
                                @foreach ($diaries as $diary)
                                    @foreach ($friends as $friend)
                                        @if($diary->user_id == $friend->friend_id)
                                            @foreach ($authors as $author)
                                                @if($diary->user_id == $author->id)
                                                <tr>
                                                    <!--日記の日付-->
                                                    <td class="text-center align-middle">{{$diary->created_at->format('m/d')}}</td>
                                                    <!--日記の作者-->
                                                    <td class="text-center align-middle">
                                                        {{$author->nickname}}
                                                        <br>
                                                        <img src="{{asset($author->icon)}}" width="50" height="50">
                                                    </td>
                                                    <!--日記を見る-->
                                                    <td class="text-center align-middle">
                                                        <form action="{{ action('DiaryRecordController@friend_diary_show', $diary->id) }}" method="get">
                                                        @csrf
                                                            <button type="submit" class="btn btn-outline-primary">見る</button>
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

                    <div class="btn-toolbar">
                        <form action="{{route('Diary.friend_find')}}" method="get">
                        @csrf
                            <button type="submit" class="btn btn-outline-primary my-2">友達追加</button>
                        </form>
                    </div>
                    
                        <form action="{{route('Diary.friend_list')}}" method="get">
                        @csrf
                            <button type="submit" class="btn btn-outline-primary my-2">友達一覧</button>
                        </form>
                            
                        <form action="{{route('Diary.top')}}" method="get">
                        @csrf
                            <button type="submit" class="btn btn-light my-2">TOP</button>
                        </form>
                
                </div>

            </div>
        </div>
    </div>
</div>
@endsection