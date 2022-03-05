@extends('layouts.app')
<style>
.selected_icon {  
    display: flex;
    justify-content: center;
}
.user{
    text-align: center;
    margin-top: 20 ;
    margin-bottom: 40;
    
}
.icon-create-button {  
    display: flex;
    justify-content: center;
}

.icon_back {  
    margin-right: 5;
}

.icon_save {  
    margin-left: 5;
}
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('アイコン登録') }}</div>

                <div class="card-body">
                    <form method = "post" action = "icon_send">                        
                    @csrf                        
                        <div class = "selected_icon">
                            <img src="{{asset($input['icon'])}}" alt="" width = '150' height = '150'> 
                        </div>

                        <div class = "user">
                            <p>{{ Auth::user()->nickname }}</p>
                            <p>こちらのアイコンでよろしいですか？</p>
                        </div>

                        <div class = "icon-create-button">
                            <input class = "icon_back" name="back" type="submit" value="戻る" />
                            <input class = "icon_save" type="submit" value="送信" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
