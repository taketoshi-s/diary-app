@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('日記') }}</div>

                <div class="card-body">
                        
                    <div class="form-group row">
                        <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('今日の体重') }}</label>
                            
                        <div class="col-md-6">
                            <!--日記の日付の体重 (同じ日付の体重があれば　true　なければ　else)-->
                            @if(!empty($that_day_weight))
                                {{ $that_day_weight->weight }}
                            @else
                                <p>記録なし</p>
                            @endif
                        </div>
                     </div>

                    <div class="form-group row">
                        <!--前回との体重差-->
                        <!--①同じ日付の体重があり && 前回の体重があれば　true　なければ　else)-->
                        @if($result_weight !== '＜ー.ーー＞' )
                            <!--②前回の体重が日記の日付の前日なら　true　でなければ　else)-->
                            @if($last_day_weight->created_at->format('y-m-d') == $that_day_weight->created_at->subDay()->format('y-m-d'))
                                <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('前日との差') }}</label>
                                
                                <div class="col-md-6">
                                    <!--前回よりも体重が増えていれば + をつける)-->
                                    @if($result_weight > 0.01)
                                        + {{ $result_weight }}
                                    @else
                                        {{ $result_weight }}
                                    @endif
                                </div>
                            <!--②　else)-->
                            @else
                                <label for="nickname" class="col-md-4 col-form-label text-md-right">{{$last_day_weight->created_at->format('m/d')}}との差</label>
                                <div class="col-md-6">
                                    <!--前回よりも体重が増えていれば + をつける)-->
                                    @if($result_weight > 0.01)
                                        + {{ $result_weight }}
                                    @else
                                        {{ $result_weight }}
                                    @endif
                                </div>
                            @endif
                        
                        <!--① else-->
                        @else
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('前回との差') }}</label>
                            <div class="col-md-6">
                                {{ $result_weight }}
                            </div>
                        @endif       
                    </div>

                    <!--前回との体重差-->
                    <div class="form-group row">
                        <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('運動') }}</label>

                        <div class="col-md-6">
                            @if(count($exercises) <=1)
                               
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                               
                            @elseif(count($exercises) <=2)
                                
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                
                            @elseif(count($exercises) <=3)
                                
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                    <img src="{{asset($exercises[2])}}" alt="走る" width ='65' height = '65'>
                                
                            @elseif(count($exercises) <=4)
                                
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='65' height = '65'>
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='65' height = '65'>
                                    <img src="{{asset($exercises[2])}}" alt="走る" width ='65' height = '65'>
                                    <img src="{{asset($exercises[3])}}" alt="走る" width ='65' height = '65'>
                                
                            @endif

                        </div>
                    </div>
                    
                    <!--調子-->
                    <div class="form-group row">
                        <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('調子') }}</label>
                            
                        @if($diary->condition ==1)
                        <div class="col-md-6">
                            <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                        </div>
                        @elseif($diary->condition == 2)
                        <div class="col-md-6">
                            <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                        </div>
                        @elseif($diary->condition == 3)
                        <div class="col-md-6">
                            <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                        </div>
                        @elseif($diary->condition == 4)
                        <div class="col-md-6">
                            <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                        </div>
                        @elseif($diary->condition == 5)
                        <div class="col-md-6">
                            <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                        </div>
                        @endif
                    </div>

                    <!--充実-->
                    <div class="form-group row">
                        <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('充実') }}</label>
                                
                        @if($diary->fullness == 1)
                        <div class="col-md-6">
                            <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                        </div>
                        @elseif($diary->fullness == 2)
                        <div class="col-md-6">
                            <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                        </div>
                        @elseif($diary->fullness == 3)
                        <div class="col-md-6">
                            <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                        </div>
                        @elseif($diary->fullness == 4)
                        <div class="col-md-6">
                            <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                        </div>
                        @elseif($diary->fullness == 5)
                        <div class="col-md-6">
                            <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                        </div>
                        @endif
                    </div>

                     <!--努力-->
                    <div class="form-group row">
                        <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('努力') }}</label>
                                
                        @if($diary->effort == 1)
                        <div class="col-md-6">
                            <img src="{{ asset('image/zetuhutyou.png') }}" alt="絶不調" width = '50' height = '50'>
                        </div>
                        @elseif($diary->effort == 2)
                        <div class="col-md-6">
                            <img src="{{ asset('image/futyou.png') }}" alt="不調" width = '50' height = '50'>
                        </div>
                        @elseif($diary->effort == 3)
                        <div class="col-md-6">
                            <img src="{{ asset('image/hutu.png') }}" alt="普通" width = '50' height = '50'>
                        </div>
                        @elseif($diary->effort == 4)
                        <div class="col-md-6">
                            <img src="{{ asset('image/koutyou.png') }}" alt="好調" width = '50' height = '50'>
                        </div>
                        @elseif($diary->effort == 5)
                        <div class="col-md-6">
                            <img src="{{ asset('image/zekkoutyo.png') }}" alt="絶好調" width = '50' height = '50'>
                        </div>
                        @endif
                    </div>

                     <!--日記の内容-->
                    <div class="form-group row">
                        <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('日記') }}</label>
                            
                        <div class="col-md-6">
                            {{$diary->body}}
                        </div>
                    </div>          
                    @if($comments != [])
                        @foreach($comments as $comment)
                        <div class="form-group row">
                            @foreach($comment_users as $comment_user)
                                @if($comment_user->id == $comment->user_id)
                                    <p>{{$comment_user->nickname}}</p>
                                    <img src="{{asset($comment_user->icon)}}" alt="icon" width="50" height="50">   
                                @endif
                            @endforeach
                            <p>{{$comment->body}}</p>
                            <p>{{$comment->created_at->format('n/j g:i')}}</p>
                            @if($comment->user_id == $user->id)
                            <form action="{{ action('DiaryRecordController@diary_comment_edit', $comment->id) }}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-primary">編集</button>
                            </form>
                            <span>・</span>
                            <form action="{{ action('DiaryRecordController@diary_comment_destroy', $comment->id) }}" method="post">
                            @csrf
                                <button type="submit" class="btn btn-primary">削除</button>
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
                   
                    <form action="{{route('Diary.diary_comment_save',$diary->id)}}" method = "post">   
                        @csrf
                        @if ($errors->any())
                             <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                        </ul>
                            </div>
                        @endif

                        
                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('コメント') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="body" > 
                                </div>
                                <input type="submit" value= '送る'>
                        </div>
                    </form>
                   

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
