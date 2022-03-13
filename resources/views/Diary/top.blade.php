@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TOP画面') }}</div>
                
                <div class="card-body">
                    <!-- モーダルウィンドウを起動するボタン -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#MODAL1">アプリ説明</button><br>
                    <!-- ここからモーダル -->
                    <div class="modal fade" id="MODAL1">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <p>アプリ説明</p>
                                </div>
                                <div class="modal-body">
                                    <p>[ポートフォリオ名]</p>
                                    <p>『ダイエット日記』</p>
                                    <p>[説明]</p>
                                    <p>
                                        今回、学んだ知識を活かして簡単な日記アプリ『ダイエット日記』を作成致しました。
                                        『ダイエット日記』を作るに至った理由は、大阪を離れる私が移住先でも友人や家族と日常的に繋がる方法はないかと考えた時に、
                                        「共通の話題をお互いに記録し、確認する」事で、日常的に繋がる事が出来ると考えたからです。
                                        その中で、年代も違う家族や友人と共通で話題にするテーマを考えた時に浮かんできたのが「ダイエット」でした。
                                    </p>
                                    <p>主な機能として5つの機能があります。
                                    <p>・日記機能：日記を作成し記録できます。<br>
                                        ・体重記録機能：体重を記録できます。<br>
                                        ・食事記録機能：摂取カロリーを記録することで、登録情報から計算した基礎代謝との差分を記録できます。<br>
                                        ・友達機能：友達に登録したユーザーの日記を閲覧し、コメントを残す事ができます。<br>
                                        ・履歴機能：自身が記録した、体重及び食事のカロリーを閲覧できます。<br>
                                        さくらのレンタルサーバーを利用し、サーバーにもデプロイしております
                                    </p>

                                    <p>※友達機能について</p>
                                    <p>「新規登録」でご利用して頂いている場合</p>
                                    <p>[友達の日記]から下部にある[友達追加]に進んでいただき「test」と入力して頂き追加して頂くと、「test」アカウントの日記をご覧になれます。</p>

                                    <p>「ログイン」でご利用して頂いている場合</p>
                                    <p>「test」アカウントでログインして頂いている場合、既に「test2」アカウントの日記がご覧になれる状態です。<br>
                                        [友達の日記]から下部にある[友達追加]に進んでいただき「test3」と入力して頂き追加して頂くと、「test3」アカウントの日記をご覧になれます。</p>
                                </div>
                            
                            </div> <!-- modal-content -->
                        </div>  <!-- modal-dialog -->
                    </div>  <!-- modal fade -->  

                    <img class="d-block mx-auto" src="{{asset('image/diet_top.jpg')}}" alt=''>

                    <div class ="logins">
                        <div class ="login mx-3 my-3">
                            <form action="{{route('Diary.weight_record')}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-primary px-4 py-3">体重を記録</button>
                            </form>
                        </div>

                        <div class ="login mx-3 my-3">
                            <form action="{{route('Diary.food_record')}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-primary px-4 py-3">食事を記録</button>
                            </form>
                        </div>
                    </div>

                    <div class ="logins">
                        <div class ="login mx-3 my-3">
                            <form action="{{route('Diary.diary_history')}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-primary px-4 py-3">日記を書く</button>
                            </form>
                        </div>

                        <div class ="login mx-3 my-3">
                            <form action="{{route('Diary.friend_diary')}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-primary px-4 py-3">友達の日記</button>
                            </form>
                        </div>
                    </div>
                

                    <div class ="logins">
                        <div class ="login mx-3 my-3">
                            <form action="{{route('Diary.character_edit')}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-primary px-4 py-3">設定</button>
                            </form>
                        </div>

                        <div class ="login mx-3 my-3">
                            <form action="{{route('Diary.history')}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-primary px-4 py-3">履歴</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection