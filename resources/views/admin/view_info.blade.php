<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理 | ポイント・時間情報</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- JavaScripts -->
        

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
			
			.sidebar{
				border:1px solid #DDD;
				margin-right:1%;
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
                <a href="/admin/view_info" class="nav-link active">
                    ポイント・時間情報
                </a>
            </li>       
        </ul>
    </nav>           
<div class="card">
                <div class="card-header bold" style="font-size:25px;">ポイント・時間に関する情報</div>
                <div class="card-body">
                <p style="font-size: 15px; color:#C92629;">{{ $msg }}</p>
    @if($msg=="")
				<p><a href="/admin/edit_info">情報を編集</a></p>
                   <h4>各メニューでの消費ポイント</h4>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">カット</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $info->points_cut }}ポイント
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">カラー</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $info->points_color }}ポイント
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">パーマ</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $info->points_pama }}ポイント
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">縮毛矯正</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $info->points_correction }}ポイント
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">エクステ</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $info->points_extension }}ポイント
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">ヘアセット</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $info->points_haircut }}ポイント
                        </div>
                    </div>
                    
                    <h4>各メニューに要する時間</h4>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">カット</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $info->times_cut }}時間
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">カラー</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $info->times_color }}時間
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">パーマ</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $info->times_pama }}時間
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">縮毛矯正</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $info->times_correction }}時間
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">エクステ</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $info->times_extension }}時間
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">ヘアセット</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $info->times_haircut }}時間
                        </div>
					</div>
                    
            </div>
    @endif
            <p><a href="#" onclick="window.history.back(); return false;" style="font-size: 15px;">直前のページに戻る</a></p>
    </body>
</html>
