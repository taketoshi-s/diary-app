<a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>


アプリtop画面


<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
{{ Auth::user()->name }} <span class="caret"></span></a>

@if(Auth::User()->icon == NULL)
<img src="{{asset('image/noimage.png')}}" alt="noimage" width="100" height="100">
@else
<img src="{{asset(Auth::User()->icon)}}" alt="icon" width="100" height="100">
@endif

<form action="{{route('Diary.weight_record')}}" method="get">
@csrf
<button type="submit" class="btn btn-primary">体重を記録</button>
</form>

<form action="{{route('Diary.food_record')}}" method="get">
@csrf
<button type="submit" class="btn btn-primary">食事を記録</button>
</form>


<form action="{{route('Diary.diary_history')}}" method="get">
@csrf
<button type="submit" class="btn btn-primary">日記を書く</button>
</form>

<form action="{{route('Diary.frend_diary')}}" method="get">
@csrf
<button type="submit" class="btn btn-primary">友達の日記</button>
</form>


