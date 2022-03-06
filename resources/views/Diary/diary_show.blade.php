@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('日記') }}</div>

                <div class="card-body">
                    <div class="today_weight">
                            <p class="text-center font-weight-bold h4">この日の体重</p>
                            
                            @if(!empty($that_day_weight))
                                <!--日記の日付の体重 (同じ日付の体重があれば　true　なければ　else)-->
                                    <p class="text-center font-weight-bold h2">{{ $that_day_weight->weight }}</p>
                            @else
                                <!--日記の日付の体重 (同じ日付の体重があれば　true　なければ　else)-->
                                <p class="text-center font-weight-bold h2">記録なし</p>
                            @endif
                    </div>

                    <div class="today_weight">
                            <p class="text-center font-weight-bold h6">前回との差</p>
                            @if($result_weight !== '＜ー.ーー＞' )
                            <!--前回よりも体重が増えていれば + をつける)-->
                            @if($result_weight > 0.01)
                                <p class="text-center font-weight-bold h4">+ {{ $result_weight }}</p>
                            @else
                                <p class="text-center font-weight-bold h4">{{ $result_weight }}</p>
                            @endif
                            @else
                            <p class="text-center font-weight-bold h4">{{ $result_weight }}</p>
                            @endif       
                    </div>

                    <div class="today_weight">
                            <p class="text-center font-weight-bold h6">運動</p>
                    </div>

                    <table class="table table-borderless"　style= "max-width:350px; margin-top:20px;">
                        
                        <tbody>
                            <tr>
                                @if(count($exercises) <=1)
                                    <td class="text-center">
                                        <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                
                                @elseif(count($exercises) <=2)
                                    
                                    <td class="text-center">
                                        <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                    </td>

                                @elseif(count($exercises) <=3)

                                    <td class="text-center">
                                        <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset($exercises[2])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                
                                @elseif(count($exercises) <=4)

                                    <td class="text-center">
                                        <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset($exercises[2])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{asset($exercises[3])}}" alt="走る" width ='65' height = '65'>
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                    
                    <table class="table table-bordered "　style= "max-width:400px; margin-top:20px;">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">調子</th>
                                <th scope="col" class="text-center">充実度</th>
                                <th scope="col" class="text-center">努力</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    @if($diary->condition ==1)
                                        <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                                    @elseif($diary->condition == 2)
                                        <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                                    @elseif($diary->condition == 3)
                                        <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                                    @elseif($diary->condition == 4)
                                        <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                                    @elseif($diary->condition == 5)
                                        <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($diary->fullness == 1)
                                        <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                                    @elseif($diary->fullness == 2)
                                        <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                                    @elseif($diary->fullness == 3)
                                        <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                                    @elseif($diary->fullness == 4)
                                        <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                                    @elseif($diary->fullness == 5)
                                        <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($diary->effort == 1)
                                        <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                                    @elseif($diary->effort == 2)
                                        <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                                    @elseif($diary->effort == 3)
                                        <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                                    @elseif($diary->effort == 4)
                                        <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                                    @elseif($diary->effort == 5)
                                        <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="today_weight">
                            <p class="text-center font-weight-bold h6">今日の出来事</p>
                                <!--日記の日付の体重 (同じ日付の体重があれば　true　なければ　else)-->
                            <p class="text-center font-weight-bold">{{$diary->body}}</p>
                    </div>
                    <!--日記のコメント-->

                    @if($comments != [])
                        @foreach($comments as $comment)
                        <div class="comment-group row text-center">
                            @foreach($comment_users as $comment_user)
                                @if($comment_user->id == $comment->user_id)
                                    <div class="comment-user text-center  mx-2">
                                        <img src="{{asset($comment_user->icon)}}" alt="icon" width="50" height="50">
                                        <p class = "mb-1" style = "font-size: 20%">{{$comment_user->nickname}}</p>
                                    </div>
                                @endif
                            @endforeach

                            <div class="comment-body  mx-2">
                                <p class = "font-weight-bold h6 text-left">{{$comment->body}}</p>
                            </div>
                            
                            <div class="comment-date  mx-2">
                                <p class = "font-weight-bold h6 text-center mx-2" style = "font-size: 20%">{{$comment->created_at->format('n/j g:i')}}</p>
                            </div>
                                
                            @if($comment->user_id == $user->id)
                                <form action="{{ action('DiaryRecordController@diary_comment_edit', $comment->id) }}" method="get">
                                @csrf
                                    <button type="submit" class="btn btn-outline-secondary mx-2 ml-4">編集</button>
                                </form>
                            
                                <form action="{{ action('DiaryRecordController@diary_comment_destroy', $comment->id) }}" method="post">
                                @csrf
                                    <button type="submit" class="btn btn-outline-danger mx-2">削除</button>
                                </form>
                            @endif
                        </div>  
                        @endforeach
                    @else
                        <div class="form-group row">
                            <label for="comments" class="col-md-4 col-form-label text-md-right">{{ __('コメント') }}</label>
                                <p>コメントはありません</p>
                        </div>
                    @endif

                    <div class="form-group row justify-content-center mt-5">
                        <form action="{{route('Diary.diary_edit',$diary->id)}}" method="get">
                        @csrf
                            <button type="submit" class="btn btn-outline-secondary mx-2 ml-4">編集</button>
                        </form>     
                    
                        <form action="{{route('Diary.diary_destroy',$diary->id)}}" method="post">
                        @csrf                            
                            <button type="submit" class="btn btn-outline-danger mx-2">削除</button>
                        </form>
                    </div>
                        
                    <div class="justify-content-center">

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