<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理 | 応募情報変更</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
			
			nav{
				font-size:14px;
			}
			.nav-title a{
				font-weight:800;
				padding-left:4px !important;
			}
			.nav-item a{
				padding-left:12px;
			}
			
			a:hover{
				opacity:0.7;
			}

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			
			.apply h3{
				color:#F4A643;
				padding:15px 0 15px 15px;
				border:2px solid #F4A643;
				margin-bottom:20px;
				font-size:18px;
			}
			.apply p{
				font-size:13px;
				padding:10px 0 10px 15px;
			}
			.hissu{
				color:#EC070B;
			}
			.form-field{
				width:100%;
			}
			.form-group{
				padding:15px 0 40px;
				font-size:15px;
			}
			
			.sidebar{
				border:1px solid #DDD;
				margin-right:1%;
			}
			
			.apply p{
				text-align: center;
				margin-bottom: 50px;
			}
			.apply p a{
				text-align: center;
				padding:12.5px 30px;
				border-radius: 20px;
				font-size:15px;
				color:#FFF;
				background-color: #153ED1;
			}
			.apply p a:hover{
				text-decoration: none;
			}
			
			.btn-success{
				width:60px;
				height:30px;
				font-size: 15px;
			}
			
			.flex-center{
				height:60px;
			}
			.top-right{
				float: right;
				margin:20px 5% 0 0;
			}
			.top-right a{
				vertical-align: middle;
				color: #888;
				font-size:14px;
			}
			.alert{
				font-size: 13px;
			}
			.error{
				border-color: #EE1114;
			}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                        <a href="/admin/logout">ログアウト</a>
                </div>
		</div>
  <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item nav-title">
                    <a class="nav-link">
                        採用関連
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/list_applicant" class="nav-link active">
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
                <a href="/admin/edit_admin" class="nav-link">
                    管理者一覧・編集
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/list_stylistadmin" class="nav-link">
                    スタイリスト管理者一覧・編集
                </a>
            </li>            
            <li class="nav-item">
                <a href="/admin/list_worker" class="nav-link">
                    スタイリスト一覧・編集
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/list_user" class="nav-link">
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
                <a href="/admin/list_pointpay" class="nav-link">
                    ポイント購入履歴
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/view_info" class="nav-link">
                    ポイント・時間情報
                </a>
            </li>                   
        </ul>
    </nav>
            <div class="card">
                <div class="card-header bold" style="font-size:25px;">{{ $applicant->name }}さんの登録情報を閲覧・編集</div>
                <div class="card-body">
@if($applicant->status != 'ワーカー登録済')
	<p style="font-size:16px;"><a href="/admin/interview_applicant?applicant_id={{ $applicant->id }}">面接結果を登録する</a></p>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form method="POST" action="/admin/edit_applicant?applicant_id={{ $applicant->id }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">お名前</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-field{{ $errors->has('name_1') ? ' error' : '' }}" placeholder="姓" type="text" value="{{ $applicant->name_1 }}" name="name_1" id="name_1" />
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('name_2') ? ' error' : '' }}" placeholder="名" type="text" value="{{ $applicant->name_2 }}" name="name_2" id="name_2" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">フリガナ</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-field{{ $errors->has('name_kana_1') ? ' error' : '' }}" placeholder="セイ" type="text" value="{{ $applicant->name_kana_1 }}" name="name_kana_1" id="name_kana_1" />
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('name_kana_2') ? ' error' : '' }}" placeholder="メイ" type="text" value="{{ $applicant->name_kana_2 }}" name="name_kana_2" id="name_kana_2" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required" style="vertical-align:middle;">住所（郵便番号）<span class="hissu">※</span><br>※ハイフンなし7桁</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-field{{ $errors->has('post') ? ' error' : '' }}" type="text" value="{{ $applicant->post }}" name="post" id="post" maxlength="7" onKeyUp="AjaxZip3.zip2addr(this,'','pref','address_1');" />
                        </div>
                    </div>
                    <br><hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（都道府県）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field{{ $errors->has('pref') ? ' error' : '' }}" type="text" value="{{ $applicant->pref }}" name="pref" id="pref" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（市区町村）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field{{ $errors->has('address_1') ? ' error' : '' }}" type="text" value="{{ $applicant->address_1 }}" name="address_1" id="address_1" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（番地）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field{{ $errors->has('address_2') ? ' error' : '' }}" type="text" value="{{ $applicant->address_2 }}" name="address_2" id="address_2" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（建物・ビル名）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field{{ $errors->has('address_3') ? ' error' : '' }}" type="text" value="{{ $applicant->address_3 }}" name="address_3" id="address_3" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">性別</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            {{ $applicant->gender }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title">生年月日</div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            {{ $applicant->birthday_1 }} 年 {{ $applicant->birthday_2 }} 月 {{ $applicant->birthday_3 }}日
			            </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">メールアドレス</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field{{ $errors->has('email') ? ' error' : '' }}" type="text" value="{{ $applicant->email }}" name="email" id="email" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">電話番号</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field{{ $errors->has('tel') ? ' error' : '' }}" type="text" value="{{ $applicant->tel }}" name="tel" id="tel" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">本人確認書類（表）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <a href="../{{ $applicant->kakuninfile_1_path }}">画像を見る</a>
                        </div>
                    </div>
                    <hr>
                    @if ($applicant->kakuninfile_2_path != "")
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">本人確認書類（裏）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <a href="../{{ $applicant->kakuninfile_2_path }}">画像を見る</a>
                        </div>
                    </div>
                    <hr>
                    @endif
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">理容師資格書類1</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                           <a href="../{{ $applicant->shikakufile_1_path }}">画像を見る</a>
                        </div>
                    </div>
                    <hr>
                    @if ($applicant->shikakufile_2_path != "")
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">理容師資格書類2</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <a href="../{{ $applicant->shikakufile_2_path }}">画像を見る</a>
                        </div>
                    </div>
                    <hr>
                    @endif
                    @if ($applicant->shikakufile_3_path != "")
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">理容師資格書類3</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <a href="../{{ $applicant->shikakufile_3_path }}">画像を見る</a>
                        </div>
                    </div>
                    <hr>
                    @endif
                    @if ($applicant->shikakufile_4_path != "")
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">理容師資格書類4</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <a href="../{{ $applicant->shikakufile_4_path }}">画像を見る</a>
                        </div>
                    </div>
                    <hr>
                    @endif
                    @if ($applicant->shikakufile_5_path != "")
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">理容師資格書類5</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <a href="../{{ $applicant->shikakufile_5_path }}">画像を見る</a>
                        </div>
                    </div>
                    <hr>
                    @endif
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">技術者デビュー</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $applicant->job }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">一番長く勤めたお店</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            店名：{{ $applicant->job_2 }} &nbsp; 期間：{{ $applicant->job_3 }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">自己PR</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $applicant->pr }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group center">
                    @if($applicant->status=='ワーカー登録済')
                    	<center><button type="button" class="btn btn-secondary">ワーカー登録済</button></center>
                    @else
                        <center><input name="action" id="submit_button" class="btn btn-success" type="submit" value="更新"></center>
                    @endif
                    </div>
                </form>
				</div>
           
            <p><a href="#" onclick="window.history.back(); return false;" style="font-size: 15px;">直前のページに戻る</a></p>
            </div>
           
    </body>
</html>
