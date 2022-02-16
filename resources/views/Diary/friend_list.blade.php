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

                    <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">名前</th>
                                <th scope="col" class="text-center">アイコン</th>
                                <th scope="col" class="text-center">情報</th>
                                <th scope="col" class="text-center">削除</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        @if(!empty($friends))
                            @foreach ($friends as $friend)
                                @foreach ($users as $user)
                                    @if($user->id == $friend->friend_id)
                                        <tr>
                                            <!--日記の日付-->
                                            <td class="text-center">{{$user->nickname}}</td>
                                            <!--日記の作者-->
                                            <td class="text-center">
                                                <img src="{{asset($user->icon)}}" width="50" height="50">
                                            </td>
                                            <!--日記を見る-->
                                            <td class="text-center">
                                                <form action="#" method="get">
                                                @csrf
                                                    <button type="submit" class="btn btn-primary">詳細</button>
                                                </form>
                                            </td>
                                            <td class="text-center">
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
                        </tbody>
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