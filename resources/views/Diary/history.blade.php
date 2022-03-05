@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('日記一覧画面') }}</div>
                
                <div class="card-body">
                    <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
                    
                    
                        <tbody>
                            @foreach ($period as $carbon)
                            <tr>
                            
                                <!--日記の日付-->
                                <td>{{$carbon->format('m/d')}}</td>
                                
                                
                                
                                @foreach($records as $record)
                                    @if($record->created_at->format('y-m-d') == $carbon->format('y-m-d'))
                                        <td>{{$record->weight}}</td>

                                    
                                    
                                
                                @elseif(empty($record->weight))
                                <td>sss</td>
                                @endif
                                @endforeach
                            
                            
                            
                                <!--日記を見る-->
                                <td>
                                    <form action="#" method="get">
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
                                
                                
                                <td>
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