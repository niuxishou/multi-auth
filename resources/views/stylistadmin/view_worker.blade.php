<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理 | スタイリスト情報変更</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- JavaScripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="../jquery.raty.js"></script>
        <script type="text/javascript" src="../jquery.raty.css"></script>

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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
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
			
			.card-body{
				font-size:13px;
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
			.sidebar{
				border:1px solid #DDD;
				margin-right:1%;
			}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href="/stylistadmin/logout">ログアウト</a>
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
                    <a href="/stylistadmin/list_applicant" class="nav-link">
                        応募一覧
                    </a>
                </li>
            </ul>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item nav-title">
                <a href="/stylistadmin/home" class="nav-link">
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
                <a href="/stylistadmin/list_worker" class="nav-link active">
                    スタイリスト一覧・編集
                </a>
            </li>
            <li class="nav-item">
                <a href="/stylistadmin/list_order" class="nav-link">
                    依頼一覧
                </a>
            </li>
        </ul>
    </nav>           
 <div class="card">
                <div class="card-header bold" style="font-size:25px;">{{ $worker->name }}さんの登録情報を閲覧</div>
                <div class="card-body">
                
	 <p><a href="/stylistadmin/edit_worker?worker_id={{$worker->id}}" style="font-size: 15px;">こちらの情報を編集する</a></p>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">お名前</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->name }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">フリガナ</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->name_kana }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（郵便番号）</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            {{ $worker->post }}
                        </div>
                    </div>
                    <br><hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（都道府県）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->pref }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（市区町村）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->address_1 }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（番地）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->address_2 }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（建物・ビル名）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->address_3 }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">性別</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            {{ $worker->gender }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title">生年月日</div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            {{ $worker->birthday }}
			            </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">メールアドレス</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->email }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">電話番号</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->tel }}
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
                        	{{ $worker->job }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">一番長く勤めたお店</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                        	{{ $worker->job_2 }}
                        </div>
                        <div class="col-sm-4 col-md-4">
                        	{{ $worker->job_3 }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">保有ポイント</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->points }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">職歴</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->job }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">自己PR</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->selfpr }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">プロフィール</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->profile }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">条件</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->condition }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">カットの評価</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <div id="rate1"></div>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
								$('#rate1').raty({ readOnly: true, score: {{ $worker->score_1 }} });
							</script>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">カラーの評価</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <div id="rate2"></div>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
								$('#rate2').raty({ readOnly: true, score: {{ $worker->score_2 }} });
							</script>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">パーマの評価</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <div id="rate3"></div>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
								$('#rate3').raty({ readOnly: true, score: {{ $worker->score_3 }} });
							</script>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">縮毛矯正の評価</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <div id="rate4"></div>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
								$('#rate4').raty({ readOnly: true, score: {{ $worker->score_4 }} });
							</script>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">エクステの評価</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <div id="rate5"></div>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
								$('#rate5').raty({ readOnly: true, score: {{ $worker->score_5 }} });
							</script>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">ヘアセットの評価</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <div id="rate6"></div>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
								$('#rate6').raty({ readOnly: true, score: {{ $worker->score_6 }} });
							</script>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">会話の評価</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <div id="rate7"></div>
                            <script type="text/javascript">
								$.fn.raty.defaults.path = "../images";
								$('#rate7').raty({ readOnly: true, score: {{ $worker->score_7 }} });
							</script>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">自己PR</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $worker->selfpr }}
                        </div>
                    </div>
                    <hr>
            </div>
            <p><a href="#" onclick="window.history.back(); return false;" style="font-size: 15px;">直前のページに戻る</a></p>
        </div>
        
    </body>
</html>