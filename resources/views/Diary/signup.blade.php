@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">
                    <!-- モーダルウィンドウを起動するボタン -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#MODAL1">アプリ説明</button><br>

                    <!-- ここからモーダル -->
                    <div class="modal fade" id="MODAL1">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                <p>ポートフォリオ説明欄</p>
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
                                    <p>[ソースコード]</p>
                                    <p>https://github.com/taketoshi-s/diary-app.git</p>

                                    <p>[利用方法]</p>
                                    <p>・新規登録で利用していただく場合</p>
                                    <p>「新規登録」を押してください。</p>

                                    <p>・ログインで利用していただく場合</p>
                                    <p>「ログイン」を押して頂き、</p>
                                    <p>メールアドレス: test@test.com<br>
                                        パスワード:1111<br>
                                    </p>
                                    <p>上記のアカウント情報を入力していただければ「test」アカウントですぐにご利用いただけます。</p>
            
                                
                                </div>

                            </div> <!-- modal-content -->
                        </div>  <!-- modal-dialog -->
                    </div>  <!-- modal fade -->


                    <img class="d-block mx-auto"　src="{{asset('image/diet_top.jpg')}}" alt=''>
                    
                    <div class ="logins">
                        <div class ="login mx-5 my-5">
                        <a href="/login"><button class="btn btn-primary btn-lg " type="button">ログイン</button></a>
                        </div>

                        <div class ="login mx-5 my-5">
                        <a href="/register"><button class="btn btn-primary btn-lg " type="button">新規登録</button></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection