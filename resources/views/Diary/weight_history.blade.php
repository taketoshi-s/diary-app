@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('履歴') }}</div>
                
                <div class="card-body">

                    <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">日付</th>
                                <th scope="col" class="text-center">体重</th>
                                <th scope="col" class="text-center">前回比</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <!-- ログインユーザーの体重記録があれば表示 -->
                        @if(!empty($weights))
                            @foreach ($weights as $key => $value)
                                        <tr>
                                            <td class="text-center">{{$value->created_at->format('m月d日')}}</td>
                                            <td class="text-center">
                                                <P>{{$value->weight}}</P>
                                            </td>
                                            <td class="text-center">
                                            <!-- 当日の体重記録と前日の体重記録を比較-->
                                            @if(!empty($weights[$key+1]))
                                                @if($weights[$key]->weight - $weights[$key+1]->weight > 0)
                                                    <P style = "color:#005FFF">+{{number_format($weights[$key]->weight - $weights[$key+1]->weight,1)}}</P>
                                                @elseif($weights[$key]->weight - $weights[$key+1]->weight < 0)
                                                <P style = "color:#FF0066">{{number_format($weights[$key]->weight - $weights[$key+1]->weight,1)}}</P>
                                                @else
                                                <P style =>{{number_format($weights[$key]->weight - $weights[$key+1]->weight,1)}}</P>
                                                @endif
                                            @else
                                                <P>--.-</P>
                                            @endif
                                            </td>
                                        </tr>
                            @endforeach
                        @endif                        
                        </tbody>
                    </table>
                    
                        <button type="button" class="btn btn-primary" onClick="history.back()">戻る</button>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection