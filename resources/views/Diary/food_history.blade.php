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
                        @if(!empty($foods))
                            @foreach ($foods as $food)
                                        <tr>
                                            <!--日記の日付-->
                                            <td class="text-center">{{ $food->created_at->format('m月d日')}}</td>
                                            <!--日記の作者-->
                                            <td class="text-center">
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