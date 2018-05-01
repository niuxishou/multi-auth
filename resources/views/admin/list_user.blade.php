<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理 | ユーザー一覧</title>
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
			
			.card{
				font-size:13px;
			}
			.row1{
				width:20%;
			}
			.row2{
				width:20%;
			}
			.row3{
				width:10%;
			}
			.row5{
				width:10%;
			}
			.row5{
				width:10%;
			}
			.row6{
				width:15%;
			}
			.row7{
				width:15%;
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
                <a href="/admin/list_user" class="nav-link active">
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
            <div class="card-header bold" style="font-size:25px;">ユーザー一覧</div>
            <div class="card-body">
              <p><a href="create_user">新規ユーザーの作成</a></p>
              
               <p>名前をクリックすると、スタイリスト情報を閲覧・編集できます。</p>
               
               <p style="font-size: 15px; color:#C92629;">{{ $msg }}</p>
                <form method="post" action="/admin/list_user">
               {{ csrf_field() }}
               <input type="text" name="name" placeholder="名前" value="{{ $name }}">
               <input type="text" name="pref" placeholder="都道府県" value="{{ $pref }}">
               <input name="action" id="submit_button" type="submit" value="検索">
			   </form>              
                <table id="account_list" class="table table-striped">
                    <thead>
                    <tr>
                        <th class="row1">名前</th>
                        <th class="row2">フリガナ</th>
                        <th class="row3">性別</th>
                        <th class="row4">年齢</th>
                        <th class="row5">都道府県</th>
                        <th class="row6">保有ポイント</th>
                        <th class="row7">登録日付</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user_list as $user)
                        <tr>
                            <td><a href="/admin/view_user?user_id={{$user->id}}">{{$user->name}}</a></td>
                            <td>{{$user->name_kana}}</td>
                            <td>{{$user->gender}}</td>
                            <td>{{$user->age}}</td>
                            <td>{{$user->pref}}</td>
                            <td>{{$user->points}}</td>
                            <td>{{$user->created_time}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$user_list->appends(Request::except('page'))->links()}}
            </div>
            <p><a href="#" onclick="window.history.back(); return false;" style="font-size: 15px;">直前のページに戻る</a></p>
        </div>
        
    </body>
</html>
