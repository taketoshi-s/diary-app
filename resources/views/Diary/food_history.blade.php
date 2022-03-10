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
                                <th scope="col" class="text-center">摂取カロリー</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <!-- ログインユーザーの食事記録があれば表示 -->
                        @if(!empty($foods))
                            @foreach ($foods as $food)
                                        <tr>
                                            <td class="text-center">{{ $food->created_at->format('m月d日')}}</td>
                                            <td class="text-center">
                                                <!-- その日の記録が0以上なら一日の合計を表示し、０なら--.-を表示 -->
                                                @if($food->morning + $food->lunch + $food->dinner + $food->otherfood > 0)
                                                    <P>{{$food->morning + $food->lunch + $food->dinner + $food->otherfood}}</P>
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