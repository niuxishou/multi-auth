<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理 | ユーザー情報変更</title>
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


            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
			.sidebar{
				border:1px solid #DDD;
				margin-right:1%;
			}


            .m-b-md {
                margin-bottom: 30px;
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
				font-size: 13px;
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
                    ポイント購入者情報
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
                <div class="card-header bold" style="font-size:25px;">ポイント・時間情報を編集</div>
                <div class="card-body">
                <p style="font-size: 15px; color:#C92629;">{{ $msg }}</p>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="/admin/edit_info" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <h4>各メニューでの消費ポイント</h4>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">カット</div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('points_cut') ? ' error' : '' }}" type="text" value="@if(old('points_cut')=="") {{ $info->points_cut }} @else {{old('points_cut')}} @endif" name="points_cut" id="points_cut" />
                        </div>
                        <div class="col-sm-4 col-md-4">
                        	<div class="form-layout-title form-style-required">ポイント</div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">カラー</div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('points_color') ? ' error' : '' }}" type="text" value="@if(old('points_color')=="") {{ $info->points_color }} @else {{old('points_color')}} @endif" name="points_color" id="points_color" />
                        </div>
                        <div class="col-sm-4 col-md-4">
                        	<div class="form-layout-title form-style-required">ポイント</div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">パーマ</div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('points_pama') ? ' error' : '' }}" type="text" value="@if(old('points_pama')=="") {{ $info->points_pama }} @else {{old('points_pama')}} @endif" name="points_pama" id="points_pama" />
                        </div>
                        <div class="col-sm-4 col-md-4">
                        	<div class="form-layout-title form-style-required">ポイント</div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">縮毛矯正</div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('points_correction') ? ' error' : '' }}" type="text" value="@if(old('points_correction')=="") {{ $info->points_correction }} @else {{old('points_correction')}} @endif" name="points_correction" id="points_correction" />
                        </div>
                        <div class="col-sm-4 col-md-4">
                        	<div class="form-layout-title form-style-required">ポイント</div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">エクステ</div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('points_extension') ? ' error' : '' }}" type="text" value="@if(old('points_extension')=="") {{ $info->points_extension }} @else {{old('points_extension')}} @endif" name="points_extension" id="points_extension" />
                        </div>
                        <div class="col-sm-4 col-md-4">
                        	<div class="form-layout-title form-style-required">ポイント</div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">ヘアセット</div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('points_haircut') ? ' error' : '' }}" type="text" value="@if(old('points_haircut')=="") {{ $info->points_haircut }} @else {{old('points_haircut')}} @endif" name="points_haircut" id="points_haircut" />
                        </div>
                        <div class="col-sm-4 col-md-4">
                        	<div class="form-layout-title form-style-required">ポイント</div>
                        </div>
                    </div>
                    <hr>
                    <h4>各メニューに要する時間</h4>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">カット</div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('times_cut') ? ' error' : '' }}" type="text" value="@if(old('times_cut')=="") {{ $info->times_cut }} @else {{old('times_cut')}} @endif" name="times_cut" id="times_cut" />
                        </div>
                        <div class="col-sm-4 col-md-4">
                        	<div class="form-layout-title form-style-required">時間</div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">カラー</div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('times_color') ? ' error' : '' }}" type="text" value="@if(old('times_color')=="") {{ $info->times_color }} @else {{old('times_color')}} @endif" name="times_color" id="times_color" />
                        </div>
                        <div class="col-sm-4 col-md-4">
                        	<div class="form-layout-title form-style-required">時間</div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">パーマ</div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('times_pama') ? ' error' : '' }}" type="text" value="@if(old('times_pama')=="") {{ $info->times_pama }} @else {{old('times_pama')}} @endif" name="times_pama" id="times_pama" />
                        </div>
            			<div class="col-sm-4 col-md-4">
                        	<div class="form-layout-title form-style-required">時間</div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">縮毛矯正</div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('times_correction') ? ' error' : '' }}" type="text" value="@if(old('times_correction')=="") {{ $info->times_correction }} @else {{old('times_correction')}} @endif" name="times_correction" id="times_correction" />
                        </div>
            			<div class="col-sm-4 col-md-4">
                        	<div class="form-layout-title form-style-required">時間</div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">エクステ</div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('times_extension') ? ' error' : '' }}" type="text" value="@if(old('times_extension')=="") {{ $info->times_extension }} @else {{old('times_extension')}} @endif" name="times_extension" id="times_extension" />
                        </div>
            			<div class="col-sm-4 col-md-4">
                        	<div class="form-layout-title form-style-required">時間</div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">ヘアセット</div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('times_haircut') ? ' error' : '' }}" type="text" value="@if(old('times_haircut')=="") {{ $info->times_haircut }} @else {{old('times_haircut')}} @endif" name="times_haircut" id="times_haircut" />
                        </div>
            			<div class="col-sm-4 col-md-4">
                        	<div class="form-layout-title form-style-required">時間</div>
                        </div>
                    <hr>
                    </div>
                    <div class="form-group center">
                        <center><input name="action" id="submit_button" class="btn btn-success" type="submit" value="更新"></center>
                    </div>
                </form>
				</div>
            </div>
            <p><a href="#" onclick="window.history.back(); return false;" style="font-size: 15px;">直前のページに戻る</a></p>
    </body>
</html>
