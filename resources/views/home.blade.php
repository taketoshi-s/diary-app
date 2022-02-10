@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <form method = "post" action = "iconstore">
                    @csrf
                    <input type="image" src="{{ asset('image/udetate_man.png') }}" width="100" height="100" alt="送信する" value = "image/udetate_man.png" name ="icon">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
