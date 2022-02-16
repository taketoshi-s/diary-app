@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('友達を検索') }}</div>

                <div class="card-body">
                    <form method = "post" action = "{{route('Diary.friend_search')}}">                        
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
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('友達の名前を入力') }}</label>

                            <div class="col-md-6">
                                <input type="text" name = "input" value = {{$input}}>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('探す') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    @if(isset($search_user))
                        @if(empty($friend) && $search_user->id !== $user->id)
                            <form method = "post" action="{{route('Diary.friend_add')}}">
                            @csrf
                                <p>{{$search_user->nickname}}</p>
                                <img src="{{asset($search_user->icon)}}" width ='65' height = '65'>
                                <input type="hidden" name = "input" value ="{{$search_user->name}}">
                                <button type="submit" class="btn btn-primary" >  
                                            {{ __('追加する') }}
                                </button>
                            </form>
                        @else
                            @if($search_user->id == $user->id)
                                <p>{{$search_user->nickname}}</p>
                                <img src="{{asset($search_user->icon)}}" width ='65' height = '65'>
                                <input type="hidden" name = "input" value ="{{$search_user->name}}">
                                <p>自分自身です</p>
                            @elseif($search_user->id == $friend->friend_id)
                                <p>{{$search_user->nickname}}</p>
                                <img src="{{asset($search_user->icon)}}" width ='65' height = '65'>
                                <input type="hidden" name = "input" value ="{{$search_user->name}}">
                                <p>既に友達に追加されています</p>
                            @endif
                        @endif
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
