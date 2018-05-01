<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理サイト | ポイント購入者情報</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- JavaScripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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

			.card{
				font-size: 13px;
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
				font-size: 14px;
			}
			.nav-title a{
				font-weight:800;
				padding-left:4px !important;
			}
			.nav-item a{
				padding-left:12px;
			}
			
			table{
				margin-top:15px;
			}
			.row1{
				width:20%;
			}
			.row2{
				width:10%;
			}
			.row3{
				width:20%;
			}
			.row4{
				width:20%;
			}
			.row5{
				width:15%;
			}
			.row6{
				width:15%;
			}
			
			.sidebar{
				border:1px solid #DDD;
				margin-right:1%;
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
                <a href="/admin/list_pointpay" class="nav-link active">
                    ポイント購入者情報
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
            <div class="card-header bold" style="font-size:25px;">ポイント購入者情報</div>
            <div class="card-body">
              
              <p style="font-size: 15px; color:#C92629;">{{ $msg }}</p>
               <form method="post" action="/admin/list_pointpay">
               {{ csrf_field() }}
               <input type="text" name="name" value="{{ $name }}" placeholder="名前">
               <input name="action" id="submit_button" type="submit" value="検索">
			   </form>
                <table id="account_list" class="table table-striped">
                    <thead>
                    <tr>
                        <th class="row1">名前</th>
                        <th class="row2">購入ポイント</th>
                        <th class="row3">決済方法</th>
                        <th class="row4">申請日</th>
                        <th class="row5">ステータス</th>
                        <th class="row6"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($point_list as $point)
                        <tr>
                            <td>{{$point->name}}</a></td>
                            <td>{{$point->buy_points}}</td>
                            <td>{{$point->pay_way}}</td>
                            <td>{{$point->request_date}}</td>
                            <td>{{$point->status}}</td>
                            <td>
                            	<form method="POST" action="/admin/list_pointpay" accept-charset="UTF-8">
                                 {{ csrf_field() }}
                                 <input type="hidden" name="user_id" value="{{$point->user_id}}">
                                 @if($point->status != "付与完了")
                                 <input name="action" id="submit_button" class="btn btn-success" type="submit" value="決済">
                            	@endif
                            	</form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$point_list->appends(Request::except('page'))->links()}}
            </div>
        </div>
        <p><a href="#" onclick="window.history.back(); return false;" style="font-size: 15px;">直前のページに戻る</a></p>
    </body>
</html>
