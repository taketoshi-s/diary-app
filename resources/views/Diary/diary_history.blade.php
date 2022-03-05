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
                    
                    <thead>
                            <tr>
                                <th scope="col" class="text-center align-middle">日付</th>
                                <th scope="col" class="text-center align-middle">運動</th>
                                <th scope="col" class="text-center align-middle">調子</th>
                                <th scope="col" class="text-center align-middle">充実度</th>
                                <th scope="col" class="text-center align-middle">努力</th>
                                <th scope="col" class="text-center align-middle">内容</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                            @foreach ($diaries as $diary)
                            <tr>
                                <!--日記の日付-->
                                <?php $exercises = explode(",", $diary->exercise);?>
                                <td class="text-center align-middle
                                ">{{$diary->created_at->format('m/d')}}</td>
                                
                                <!--調子-->
                                @if(count($exercises) <=1)
                                <td class="text-center align-middle"><img src="{{asset($exercises[0])}}" alt="走る" width ='45' height = '45'></td>
                                @elseif(count($exercises) <=2)
                                <td class="text-center align-middle"><img src="{{asset($exercises[0])}}" alt="走る" width ='45' height = '45'>
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='45' height = '45'>
                                </td>
                                @elseif(count($exercises) <=3)
                                <td class="text-center align-middle">
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='45' height = '45'>
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='45' height = '45'>
                                    <br>
                                    <img src="{{asset($exercises[2])}}" alt="走る" width ='45' height = '45'>
                                </td>
                                @elseif(count($exercises) <=4)
                                <td class="text-center align-middle">
                                    <img src="{{asset($exercises[0])}}" alt="走る" width ='45' height = '45'>
                                    <img src="{{asset($exercises[1])}}" alt="走る" width ='45' height = '45'>
                                    <br>
                                    <img src="{{asset($exercises[2])}}" alt="走る" width ='45' height = '45'>
                                    <img src="{{asset($exercises[3])}}" alt="走る" width ='45' height = '45'>
                                </td>
                                @endif


                                @if($diary->condition == 1)
                                <td class="text-center align-middle"><img src="{{asset('image/zetuhutyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->condition == 2)
                                <td class="text-center align-middle"><img src="{{asset('image/futyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->condition == 3)
                                <td class="text-center align-middle"><img src="{{asset('image/hutu.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->condition == 4)
                                <td class="text-center align-middle"><img src="{{asset('image/koutyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->condition == 5)
                                <td class="text-center align-middle"><img src="{{asset('image/zekkoutyo.png')}}" alt="走る" width ='30' height = '30'></td>
                                @else
                                <td class="text-center align-middle">{{$diary->condition}}</td>
                                @endif

                                <!--充実-->
                                @if($diary->fullness == 1)
                                <td class="text-center align-middle"><img src="{{asset('image/zetuhutyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->fullness == 2)
                                <td class="text-center align-middle"><img src="{{asset('image/futyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->fullness == 3)
                                <td class="text-center align-middle"><img src="{{asset('image/hutu.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->fullness == 4)
                                <td class="text-center align-middle"><img src="{{asset('image/koutyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->fullness == 5)
                                <td class="text-center align-middle"><img src="{{asset('image/zekkoutyo.png')}}" alt="走る" width ='30' height = '30'></td>
                                @else
                                <td> class="text-center align-middle"{{$diary->fullness}}</td>
                                @endif
                                
                                <!--努力-->
                                @if($diary->effort == 1)
                                <td class="text-center align-middle"><img src="{{asset('image/zetuhutyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->effort == 2)
                                <td class="text-center align-middle"><img src="{{asset('image/futyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->effort == 3)
                                <td class="text-center align-middle"><img src="{{asset('image/hutu.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->effort == 4)
                                <td class="text-center align-middle"><img src="{{asset('image/koutyou.png')}}" alt="走る" width ='30' height = '30'></td>
                                @elseif($diary->effort == 5)
                                <td class="text-center align-middle"><img src="{{asset('image/zekkoutyo.png')}}" alt="走る" width ='30' height = '30'></td>
                                @else
                                <td class="text-center align-middle">{{$diary->effort}}</td>
                                @endif
                                
                                <!--日記を見る-->
                                <td class="text-center align-middle">
                                    <form action="{{ action('DiaryRecordController@diary_show', $diary->id) }}" method="get">
                                    @csrf
                                        <button type="submit" class="btn btn-primary">見る</button>
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