<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理 | スタイリスト管理者一覧</title>
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
				font-size: 14px;
			}
			.card{
				font-size:13px;
			}
			.row1{
				width:10%;
			}
			.row2{
				width:45%;
			}
			.row3{
				width:45%;
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
                <a href="/admin/list_stylistadmin" class="nav-link active">
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
                <a href="/admin/view_info" class="nav-link">
                    ポイント・時間情報
                </a>
            </li>        
        </ul>
    </nav>

        <div class="card">
            <div class="card-header bold" style="font-size:25px;">スタイリスト管理者一覧</div>
            <div class="card-body">
             <p><a href="create_stylistadmin">新規スタイリスト管理者アカウントの作成</a></p>
              
               <p>「編集」をクリックすると、管理者情報を閲覧・編集できます。</p>
               <p style="font-size: 15px; color:#C92629;">{{ $msg }}</p>
               <form method="get" action="/admin/list_stylistadmin">
               {{ csrf_field() }}
               <input type="text" name="name" placeholder="名前" value="{{ $name }}">
               <input name="action" id="submit_button" type="submit" value="検索">
			   </form>             
                <table id="account_list" class="table table-striped">
                    <thead>
                    <tr>
                        <th class="row1"></th>
                        <th class="row2">名前</th>
                        <th class="row3">メールアドレス</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($stylistadmin_list as $stylistadmin)
                        <tr>
                            <td><a href="/admin/edit_stylistadmin?stylistadmin_id={{$stylistadmin->id}}">編集</a></td>
                            <td>{{$stylistadmin->name}}</td>
                            <td>{{$stylistadmin->email}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$stylistadmin_list->appends(Request::except('page'))->links()}}
            </div>
        </div>
        <p><a href="#" onclick="window.history.back(); return false;" style="font-size: 15px;">直前のページに戻る</a></p>
    </body>
</html>
