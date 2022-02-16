@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アイコン画像登録</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
    
                    <!--選択しているアイコン-->
                    <div class ='select-icon'>
                        @if(empty($input['icon']))
                            <img id= "image_file" src="{{asset('image/null-image.png')}}" alt="icon" width="100" height="100">
                        @else
                            <img src="{{asset($input['icon'])}}" id= "image_file" alt="user_icon" alt="icon" width="100" height="100">
                        @endif
                    </div>

                    <div class = 'icons'>
                        <!--犬-->
                        <input type="image" src="{{ asset('image/pet_dog_pink2.png') }}" width="100" height="100" onclick="icon_img1()" >
                                
                        <!--猫-->
                        <input type="image" src="{{ asset('image/nakayoshi_cats_couple2.png') }}" width="100" height="100" onclick="icon_img2()">
                                
                        <!--馬-->
                        <input type="image" src="{{ asset('image/animal_horse_green2.png') }}" width="100" height="100" onclick="icon_img3()">
                                
                        <!--ライオン-->
                        <input type="image" src="{{ asset('image/animal_lion-blown2.png') }}" width="100" height="100" onclick="icon_img4();">
                                
                        <!--虎-->
                        <input type="image" src="{{ asset('image/animal_tora-darkgreen2.png') }}" width="100" height="100" onclick="icon_img5()">
                            
                        <!--オコジョ-->
                        <input type="image" src="{{ asset('image/animal_okojo_blue2.png') }}" width="100" height="100" onclick="icon_img6()">
                        
                    </div>     

                    <!--登録ボタン-->
                    <div class ='icon-create'>
                        <form action =  "{{route('Diary.icon_store')}}"method="post">
                        @csrf
                            @if(empty($input['icon']))
                                <button type="submit" id= "image_id" value ="" name ="icon" class="btn btn-primary">登録</button>
                            @else
                                <button type="submit" id= "image_id" value ="{{$input['icon']}}" name ="icon" class="btn btn-primary">登録</button>
                            @endif
                        </form>
                    </div>
                    
                    <!--アイコン登録画面終了-->
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

<script>
//画像をクリックしたら画像srcを<img>タグに送る
//画像をクリックしたら画像パスを<button>タグに送る
var img;
var button;
    
    function icon_img1(){
        img = document.getElementById("image_file");
        img.src = "{{ asset('image/pet_dog_pink2.png') }}";
        button = document.getElementById("image_id");
        button.value ="image/pet_dog_pink2.png"
    }
    function icon_img2(){
        img = document.getElementById("image_file");
        img.src = "{{ asset('image/nakayoshi_cats_couple2.png') }}";
        button = document.getElementById("image_id");
        button.value = "image/nakayoshi_cats_couple2.png";
    }
    function icon_img3(){
        img = document.getElementById("image_file");
        img.src = "{{ asset('image/animal_horse_green2.png') }}";
        button = document.getElementById("image_id");
        button.value = "image/animal_horse_green2.png";
    }
    function icon_img4(){
        img = document.getElementById("image_file");
        img.src = "{{ asset('image/animal_lion-blown2.png') }}";
        button = document.getElementById("image_id");
        button.value = "image/animal_lion-blown2.png";
    }
    function icon_img5(){
        img = document.getElementById("image_file");
        img.src = "{{ asset('image/animal_tora-darkgreen2.png') }}";
        button = document.getElementById("image_id");
        button.value = "image/animal_tora-darkgreen2.png";
    }

    function icon_img6(){
        img = document.getElementById("image_file");
        img.src = "{{ asset('image/animal_okojo_blue2.png') }}";
        button = document.getElementById("image_id");
        button.value = "image/animal_okojo_blue2.png";
    }
</script>