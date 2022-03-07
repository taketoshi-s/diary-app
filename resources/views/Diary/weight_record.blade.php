@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('体重記録画面') }}</div>

                <div class="card-body">
                    <form class="form-inline"action="{{route('Diary.weight_record_save')}}" method = "post">   
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

                        <div class="form-group mb-1 weight">
                            <div class="form-group mx-sm-2 mb-1 mt-2">
                                <label for="inputPassword2" class="sr-only">体重</label>
                                <input type="text" name="weight" class="form-control" id="inputPassword2" placeholder="体重を入力">
                            
                                <button type="submit" class="btn btn-primary mx-2">登録</button>
                                <button type="button" class="btn btn-primary" onClick="history.back()">戻る</button>
                            </div>
                        </div>
                            
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

<script>

function setval(val) {
    var elm = document.getElementById('extension').value += val;
}

function allClear(val) {
    var elm = document.getElementById('extension').value = '';
}   
</script>