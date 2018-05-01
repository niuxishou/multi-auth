<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン | スタイリスト詳細</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="fullcalendar.css" />
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
			
			a:hover{
				opacity:0.7;
			}

            .full-height {
                height: 15vh;
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
				padding-top:40px;
            }

            .title {
                font-size: 30px;
            }
			.search{
				font-size:15px;
				text-align: center;
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
			
			.workers{
				margin:0 auto;
				width:95%;
				max-width:960px;
			}
			.workers h2{
				text-align:left;
			}
			.buttons{
				margin:0 auto;
				width:95%;
				max-width:840px;
			}
			.workers ul{
				font-size:0;
			}
			.workers ul li{
				font-size:15px;
				width:200px;
				margin:10px 10px 20px;
				display: inline-block;
			}
			.buttons ul{
				font-size:0;
			}
			.buttons ul li{
				font-size:14px;
				width:180px;
				margin:10px 10px 20px;
				display: inline-block;
			}
			
			#footer{
				background-color:#CCC;
			}
			.footer_contents{
				width: 960px;
				margin:0 auto;
			}
			.section1{
				padding-top:20px;
				padding-bottom:80px;
				font-size:13px;
				display:inline-block;
			}
			.section2{
				padding-top:20px;
				padding-bottom:80px;
				margin-left:40px;
				font-size:13px;
				display:inline-block;
				vertical-align: top;
			}
			.section3{
				padding-top:20px;
				padding-bottom: 80px;
				margin-left:40px;
				font-size:15px;
				display:inline-block;
				vertical-align: top;
			}
			.copy p{
				text-align: center;
				padding-bottom:15px;
			}
			.showstylists{
				width:960px;
				margin: 0 auto;
			}
			.showstylists:after{
				display:block;
				content:"";
				clear:both;
			}
			.showstylists ul{
				font-size:0;
				padding:0;
				margin: 0;
			}
			.showstylists ul li{
				padding:0;
				display:inline-block;
				width:440px;
				margin:5px 20px;
				font-size:16px;
			}
			.left{
				width:600px;
				float:left;
				margin-right:20px;
			}
			.right{
				width:320px;
				float:left;
			}
			.fc{
				text-align: center;
			}
			.fc td{
				width:14.3% !important;
			}
			.fc-day-header{
				width:14.3% !important;
			}
			.fc-day-header span{
				width:100% !important;
			}
			.fc-title{
				width:14.3% !important;
			}
			.fc-sun { color: red; }  /* 日曜日 */
            .fc-sat { color: blue; } /* 土曜日 */
			.calendar-today-gaia {
               background-color: #ff0000;
             }
			
			.review{
				border:1px solid #AAA;
				border-radius: 4px;
				margin-bottom:40px;
				margin-top:20px;
			}
			.re1{
				display: inline-block;
				width:15%;
				padding-left:2%;
				margin-right:4%;
				vertical-align: top;
			}
			.re1 img{
				width:80px;
				height:80px;
				border-radius: 50%;
				margin-top:20px;
			}
			.re2{
				display: inline-block;
				width:70%;
				vertical-align: top;
			}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('home') }}">マイページ</a>
                    @else
                        <a href="signup">利用登録</a>
                        <a href="apply">スタイリストになる</a>
                    @endauth
                </div>
            @endif
        </div>
        <div class="showstylists">
            <div class="left">
            	<img src="image/see1.jpeg" alt="プロフィール画像" width="600" height="400">
            	<h3>{{$worker->selfpr}}カットの経験20年以上。皆様の理想の髪型を実現いたします！</h3>
            	<hr>
            	<p>評価：5</p>
            	<p>40代{{$worker->gender}}</p>
            	<p>{{$worker->pref}} &gt; {{$worker->address_1}}</p>
            	<hr>
            	<p>{!! nl2br(e($worker->profile)) !!}20年間以上美容院で勤めていました。<br>何千人ものお客様のカットを担当し、腕と経験には自信があります。<br>皆様の理想の髪型を実現いたしますので、まずはお気軽にご相談ください。</p>
            	<hr>
            	<h4>サービスの内容</h4>
            	<p>{!! nl2br(e($worker->condition)) !!}カット・カラーリングを中心に行っております。<br>基本的に月曜を除いて対応可能ですので、まずはお気軽にご依頼ください。</p>
            	<hr>
            	<h4>サービスの特徴</h4>
            	<p style="display:inline-block;width:35%;vertical-align:top;">対応可能なメニュー</p>
            	<ul style="display:inline-block;width:60%;margin-top:10px;">
            	<li>カット</li>
            	<li>カラー</li>
            	@if ($worker->can_do_1 != "")<li>{{$worker->can_do_1}}</li>@endif
            	@if ($worker->can_do_2 != "")<li>{{$worker->can_do_2}}</li>@endif
            	@if ($worker->can_do_3 != "")<li>{{$worker->can_do_3}}</li>@endif
            	@if ($worker->can_do_4 != "")<li>{{$worker->can_do_4}}</li>@endif
            	@if ($worker->can_do_5 != "")<li>{{$worker->can_do_5}}</li>@endif
            	@if ($worker->can_do_6 != "")<li>{{$worker->can_do_6}}</li>@endif
            	@if ($worker->can_do_7 != "")<li>{{$worker->can_do_7}}</li>@endif
            	</ul>
            	<p style="display:inline-block;width:35%;vertical-align: top;">保有資格</p>
            	<ul style="display:inline-block;width:60%;margin-top:10px;"><li>理容師</li><li>美容師</li></ul>
            	
            	<div class="review">
            		<h4 style="padding-left:15px;">田中花子さんの新着レビュー</h4>
					<div class="re1"><img src="image/see1.jpeg"></div>
            		<div class="re2"><p>2018年3月4日</p><p>最初から最後まで、大変丁寧に対応いただきました。望んだ通りの髪型にカットしてもらえ、施術中の会話も弾みました...</p><p><a href="#">続きを見る</a></p></div>
            		<p style="padding-left:5px;"><a href="show_reviews?worker_id={{$worker->id}}">全てのレビューを見る</a></p>
            	</div>
            
            </div>
            <div class="right">
               <p style="font-size:12px;">各日付の時刻をクリックすると予約できます。</p>
            　　<div id='calendar'></div>
            	<div style="background-color:#E6E6E6;">
            		<h4>スタイリスト基本情報</h4>
            		<p>対応可能年代：20代〜40代</p>
            		<p>受注回数：1回</p>
            	</div>
            	@auth
            	<p><a href="order_stylist?worker_id={{$worker->id}}">このスタイリストに依頼</a></p>
            	@else
            	<p>依頼には会員登録が必要です。</p>
            	<p>既に会員の方は<a href="login">こちら</a>からログイン</p>
            	@endauth
            </div>
            <script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
			lang: "ja",
			height:600,
            events : [
                {
                    title : '10:30-18:30',
                    start : '2018-03-03',
                    url : 'http://google.co.jp',
					color : 'orange',
                },
				{
                    title : '10:30-15:30',
                    start : '2018-03-06',
                    url : 'http://google.co.jp',
					color : 'green',
                },
				@foreach ($schedule_list as $schedule)
				{
                    title : '{{ $schedule->start_time }}-{{ $schedule->end_time }}',
                    start : '{{ $schedule->date }}',
                    url : '/order_stylist?id={{ $schedule->id }}',
					color : '{{ $schedule->condition }}',
                },
				@endforeach
            ],
			eventRender: function(event, $element) {
                var titleStr = $element.find('span.fc-event-title').text(), // htmlタグを含むtitleの文字列を取得
                $eventElem = $element.find('span.fc-event-title');

                $eventElem.html(titleStr); // htmlとして出力
            },
			dayNamesShort: ['日','月','火','水','木','金','土'],
			monthNames: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
			monthNamesShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        })
    });
</script>
        </div>
        <div id="footer">
        	<div class="footer_contents">
				<div class="section1"><h3>サービス一覧</h3><ul><li>カット</li><li>カラー</li><li>パーマ</li><li>縮毛矯正</li><li>エクステ</li><li>ヘアセット</li></ul></div>
       	        <div class="section2"><h3>ルーム・サロンについて</h3><ul><li>ルーム・サロンとは</li><li>使い方</li><li>料金について</li><li>会員登録について</li><li>利用規約</li></ul></div>
       	        <div class="section3">右側に何か追加したい（FBなど）</div>
        	</div>
        	<div class="copy">
        		<p>©️Copyright ルーム・サロン All Rights Reserved.</p>
        	</div>
        </div>
    </body>
</html>
