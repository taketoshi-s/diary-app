@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('日記一覧画面') }}</div>
                
                <div class="card-body">
                    <form action="{{route('Diary.diary_record')}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary">日記を書く</button>
                    </form>

                    <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
                        <tbody>
                            @foreach ($diaries as $diary)
                            <tr>
                                <!--日記の日付-->
                                <?php $exercises = explode(",", $diary->exercise);?>
                                <td>{{$diary->created_at->format('m/d')}}</td>
                                
                                <!--調子-->
                                @if(count($exercises) <=1)
                                <td><img src="{{asset($exercises[0])}}" alt="走る" width ='45' height = '45'></td>
                                @elseif(count($exercises) <=2)
                                <td><img src="{{asset($exercises[0])}}" alt="走る" width ='45' height = '45'>
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='45' height = '45'>
                                </td>
                                @elseif(count($exercises) <=3)
                                <td>
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='45' height = '45'>
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='45' height = '45'>
                                    <br>
                                    <img src="{{asset($exercises[2])}}" alt="走る" width ='45' height = '45'>
                                </td>
                                @elseif(count($exercises) <=4)
                                <td>
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='45' height = '45'>
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='45' height = '45'>
                                    <br>
                                    <img src="{{asset($exercises[2])}}" alt="走る" width ='45' height = '45'>
                                    <img src="{{asset($exercises[3])}}" alt="走る" width ='45' height = '45'>
                                </td>
                                @endif


                                @if($diary->condition == 1)
                                <td><p>調子</p><img src="{{asset('image/zetuhutyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->condition == 2)
                                <td><p>調子</p><img src="{{asset('image/futyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->condition == 3)
                                <td><p>調子</p><img src="{{asset('image/hutu.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->condition == 4)
                                <td><p>調子</p><img src="{{asset('image/koutyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->condition == 5)
                                <td><p>調子</p><img src="{{asset('image/zekkoutyo.png')}}" alt="走る" width ='30' height = '30'></td>
                                @else
                                <td>{{$diary->condition}}</td>
                                @endif

                                <!--充実-->
                                @if($diary->fullness == 1)
                                <td><p>充実度</p><img src="{{asset('image/zetuhutyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->fullness == 2)
                                <td><p>充実度</p><img src="{{asset('image/futyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->fullness == 3)
                                <td><p>充実度</p><img src="{{asset('image/hutu.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->fullness == 4)
                                <td><p>充実度</p><img src="{{asset('image/koutyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->fullness == 5)
                                <td><p>充実度</p><img src="{{asset('image/zekkoutyo.png')}}" alt="走る" width ='30' height = '30'></td>
                                @else
                                <td>{{$diary->fullness}}</td>
                                @endif
                                
                                <!--努力-->
                                @if($diary->effort == 1)
                                <td><p>努力</p><img src="{{asset('image/zetuhutyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->effort == 2)
                                <td><p>努力</p><img src="{{asset('image/futyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->effort == 3)
                                <td><p>努力</p><img src="{{asset('image/hutu.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->effort == 4)
                                <td><p>努力</p><img src="{{asset('image/koutyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->effort == 5)
                                <td><p>努力</p><img src="{{asset('image/zekkoutyo.png')}}" alt="走る" width ='30' height = '30'></td>
                                @else
                                <td>{{$diary->effort}}</td>
                                @endif
                                
                                <!--日記を見る-->
                                <td>
                                    <form action="{{ action('DiaryRecordController@diary_show', $diary->id) }}" method="get">
                                    @csrf
                                        <button type="submit" class="btn btn-primary">見る</button>
                                    </form>
                                </td>
                                
                                <!-- 削除機能　(未実装)-->
                                <td>
                                    <form action="#" method="">
                                    @csrf
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                </td>
                                
                                <!--編集する-->
                                <td><!--当日の日記のみ編集ボタンが出る-->
                                        <form action="{{ action('DiaryRecordController@diary_edit', $diary->id) }}" method="get">
                                        @csrf
                                            <button type="submit" class="btn btn-primary">編集</button>
                                        </form> 
                                </td>
                                        
                            </tr>
                            @endforeach
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