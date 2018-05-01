<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理 | スタイリストになる</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- JavaScripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

        <!-- Styles -->
        <style>
			
			@font-face {
               font-family: "Yu Gothic";
               src: local("Yu Gothic Medium");
               font-weight: 400;
            }
			
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: "Yu Gothic", "游ゴシック", YuGothic, "游ゴシック体", "ヒラギノ角ゴ Pro W3", "メイリオ", sans-serif;
                font-weight: 100;
                margin: 0;
            }
			
			a:hover{
				opacity:0.7;
			}

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			
			nav{
				font-size:14px;
			}
			.apply h3{
				color:#F4A643;
				padding:15px 0 15px 15px;
				border:2px solid #F4A643;
				margin-bottom:20px;
			}
			.apply p{
				font-size:14px;
				padding:10px 0 10px 15px;
			}
			.hissu{
				color:#EC070B;
			}
			.form-field{
				width:100%;
			}
			.form-group{
				padding:15px 0 30px;
			}
        </style>
    </head>
    <body>
<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item nav-title">
                    <a class="nav-link">
                        採用関連
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/list_applicant" class="nav-link">
                        応募一覧
                    </a>
                </li>
            </ul>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item nav-title">
                <a href="/admin/home" class="nav-link">
                    ダッシュボード
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item nav-title">
                <a class="nav-link">
                    各種情報
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/list_worker" class="nav-link active">
                    スタイリスト一覧・編集
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/list_order" class="nav-link">
                    ユーザー一覧・編集
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/list_order" class="nav-link">
                    依頼一覧
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item nav-title">
                <a class="nav-link">
                    ポイント関連
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/point_history" class="nav-link">
                    ポイント購入履歴
                </a>
            </li>       
        </ul>
    </nav>

            <div class="apply col-ms-8 col-md-8">
                <h3>{{ $applicant->name }}さんをスタイリストとして登録</h3>
                <form method="POST" action="/admin/register_worker?applicant_id={{ $applicant->id }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <input type="hidden" name="name" id="name" value="{{ $applicant->name }}">
                <input type="hidden" name="name_kana" id="name_kana" value="{{ $applicant->name_kana }}">
                <input type="hidden" name="email" id="email" value="{{ $applicant->email }}">
                <input type="hidden" name="tel" id="tel" value="{{ $applicant->tel }}">
                <input type="hidden" name="birthday" id="birthday" value="{{ $applicant->birthday }}">
                <input type="hidden" name="post" value="{{ $applicant->post }}">
                <input type="hidden" name="pref" value="{{ $applicant->pref }}">
                <input type="hidden" name="address_1" value="{{ $applicant->address_1 }}">
                <input type="hidden" name="address_2" value="{{ $applicant->address_2 }}">
                <input type="hidden" name="address_3" value="{{ $applicant->address_3 }}">
                <input type="hidden" name="gender" value="{{ $applicant->gender }}">
                <input type="hidden" name="job" value="{{ $applicant->job }}">
                <input type="hidden" name="score_1" value="{{ $applicant->score_1 }}">
                <input type="hidden" name="score_2" value="{{ $applicant->score_2 }}">
                <input type="hidden" name="score_3" value="{{ $applicant->score_3 }}">
                <input type="hidden" name="score_4" value="{{ $applicant->score_4 }}">
                <input type="hidden" name="score_5" value="{{ $applicant->score_5 }}">
                <input type="hidden" name="score_6" value="{{ $applicant->score_6 }}">
                <input type="hidden" name="score_7" value="{{ $applicant->score_7 }}">
                <input type="hidden" name="score_age" value="{{ $applicant->score_age }}">
                <input type="hidden" name="score_biko" value="{{ $applicant->score_biko }}">    
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">ワーカー氏名</div>
                        </div>
                        <div class="col-sm-7 col-md-7">
                            {{ $applicant->name }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">メールアドレス</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $applicant->email }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">登録用パスワード</div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <input class="form-field" type="password" name="password" id="password" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">パスワード（確認用）</div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <input class="form-field" type="password" name="password_confirmation" id="password-confirm" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group center">
                        <input name="action" id="submit_button" class="btn btn-success" type="submit" value="登録">
                    </div>
                </form>  
            </div>
    </body>
</html>
