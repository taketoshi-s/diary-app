@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('体重記録画面') }}</div>
                <div class="card-body">
                    <form action="{{route('Diary.weight_record_save')}}" method = "post">   
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
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('体重') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="weight" id = "extension" > 
                                </div>
                           
                        </div>
                            
                        
                        <input type="submit" value = "登録">
                        <button type="button" onClick="history.back()">戻る</button>
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