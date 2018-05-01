<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理 | 依頼内容閲覧</title>
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
			
			nav{
				font-size: 14px;
			}
			.nav-title a{
				font-weight:800;
				padding-left:4px !important;
			}
			.nav-item a{
				padding-left:12px;
			}

            .content {
                text-align: center;
            }
			.sidebar{
				border:1px solid #DDD;
				margin-right:1%;
			}

            .title {
                font-size: 84px;
            }


            .m-b-md {
                margin-bottom: 30px;
            }
			
			.apply{
				font-size: 14px;
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
				padding:15px 0 40px;
			}
			.conversation{
				width:90%;
				margin:0 auto;
				padding:10px;
				margin-bottom:10px;
				border:1px solid #111;
			}
			.conversation h6{
				font-size:14px;
			}
			.conversation h6 strong{
				font-size:12px;
				margin-left:10px !important;
			}
			.conversation p{
				font-size:14px;
				padding:0;
			}
			textarea{
				margin: 20px auto 40px;
				width:100%;
				height:200px;
				font-size:14px;
				resize:none;
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
                <a href="/worker/logout">ログアウト</a>
            </div>
        </div>
<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item nav-title">
                    <a class="nav-link">
                        登録関連
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/worker/edit_worker" class="nav-link">
                        登録情報の閲覧・編集
                    </a>
                </li>
            </ul>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item nav-title">
                <a href="/worker/home" class="nav-link">
                    ダッシュボード
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item nav-title">
                <a class="nav-link">
                    業務関連
                </a>
            </li>
            <li class="nav-item">
                <a href="/worker/schedule" class="nav-link">
                    スケジュール管理
                </a>
	    </li>          
            <li class="nav-item">
                <a href="/worker/list_order" class="nav-link active">
                    依頼一覧
                </a>
			</li>
            <li class="nav-item">
                <a href="/worker/list_review" class="nav-link">
                    レビュー一覧
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
                <a href="/worker/point_history" class="nav-link">
                    ポイント履歴
                </a>
			</li>
            <li class="nav-item">
                <a href="/worker/point_purchase" class="nav-link">
                    ポイント購入
                </a>
            </li>
        </ul>
    </nav>

        <div class="card">
            <div class="card-header bold" style="font-size:25px;">依頼詳細</div>
            <div class="card-body">
                 <p><a href="view_karte?user_id={{ $order->user_id }}">これまでのカルテの閲覧</a></p>
                 <p><a href="create_report?order_id={{ $order->id }}">施術後のカルテ作成</a></p>
                 <h3>依頼の詳細</h3>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">依頼者名</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $order->user_name }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">担当スタイリスト名</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $order->worker_name }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">依頼内容</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            @if ($order->content_1 != "") {{$order->content_1}} / @endif
                            @if ($order->content_2 != "") {{$order->content_2}} / @endif
                            @if ($order->content_3 != "") {{$order->content_3}} / @endif
                            @if ($order->content_4 != "") {{$order->content_4}} / @endif
                            @if ($order->content_5 != "") {{$order->content_5}} / @endif
                            @if ($order->content_6 != "") {{$order->content_6}}   @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">依頼の状況</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            {{ $order->status }}
                        </div>
                    </div>
                    <hr>
                <form method="post" action="/worker/view_order?order_id={{ $order->id }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="status" value="完了">
                    <div class="form-group center">
                    	<div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">依頼が完了後このボタンを押してください。</div>
                        </div>
                		<div class="col-sm-9 col-md-9">
                        	<input name="action" id="submit_button" class="btn btn-success" type="submit" value="完了">
                    	</div>
                    </div>
                </form>
                    <hr>
                    <h3 style="font-weight:800;">メッセージ</h3>
                    <div style="width:100%;">
                    @foreach ($conv_list as $conv)
                     <div class="conversation">
                      <h6>{{$conv->name}} <srtrong>{{$conv->date}}</srtrong></h6>
                      <p>{{$conv->content}}</p>
                     </div>
                    @endforeach
                    <hr>
                    <h4 style="font-weight:800;">新しいメッセージを送信</h4>
                    <form method="post" action="/worker/view_order?order_id={{ $order->id }}">
                     {{ csrf_field() }}
					<textarea name="content" id="content"></textarea>
					<div class="form-group center">
                    	<center><input name="action" id="submit_button" class="btn btn-success" type="submit" value="送信"></center>
			        </div>			        
			        </form>
			        </div>
            </div>
        </div>
	<p><a href="#" onclick="window.history.back(); return false;" style="font-size: 15px;">直前のページに戻る</a></p>
    </body>
</html>