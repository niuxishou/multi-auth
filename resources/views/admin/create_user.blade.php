<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム・サロン管理 | 新規ユーザー登録</title>
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
                    業務関連
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
                <div class="card-header bold" style="font-size:25px;">新規ユーザー登録</div>
                <div class="card-body">
                <p><span class="hissu">※</span>は必須項目です。</p>
                @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
               <p>{{ $msg }}</p>
                <form method="POST" action="create_user" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">お名前<span class="hissu">※</span></div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-field{{ $errors->has('name_1') ? ' error' : '' }}" placeholder="姓" type="text" name="name_1" id="name_1" value="{{ old('name_1') }}" />
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('name_2') ? ' error' : '' }}" placeholder="名" type="text" name="name_2" id="name_2" value="{{ old('name_2') }}" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">フリガナ<span class="hissu">※</span></div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-field{{ $errors->has('name_kana_1') ? ' error' : '' }}" placeholder="セイ" type="text" name="name_kana_1" id="name_kana_1" value="{{ old('name_kana_1') }}" />
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <input class="form-field{{ $errors->has('name_kana_2') ? ' error' : '' }}" placeholder="メイ" type="text" name="name_kana_2" id="name_kana_2" value="{{ old('name_kana_2') }}" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">メールアドレス<span class="hissu">※</span></div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field{{ $errors->has('email') ? ' error' : '' }}" type="text" name="email" id="email" value="{{ old('email') }}" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">電話番号<span class="hissu">※</span></div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field{{ $errors->has('tel') ? ' error' : '' }}" type="text" name="tel" id="tel" value="{{ old('tel') }}" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required" style="vertical-align:middle;">住所（郵便番号）<span class="hissu">※</span><br>※ハイフンなし7桁</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-field{{ $errors->has('post') ? ' error' : '' }}" type="text" name="post" id="post" value="{{ old('post') }}"  maxlength="7" onKeyUp="AjaxZip3.zip2addr(this,'','pref','address_1');" />
                        </div>
                    </div>
                    <br><hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（都道府県）<span class="hissu">※</span></div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field{{ $errors->has('pref') ? ' error' : '' }}" type="text" name="pref" id="pref" value="{{ old('pref') }}" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（市区町村）<span class="hissu">※</span></div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field{{ $errors->has('address_1') ? ' error' : '' }}" type="text" name="address_1" id="address_1" value="{{ old('address_1') }}" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（番地）<span class="hissu">※</span></div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field{{ $errors->has('address_2') ? ' error' : '' }}" type="text" name="address_2" id="address_2" value="{{ old('address_2') }}" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">住所（建物・ビル名）</div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <input class="form-field" type="text" name="address_3" id="address_3" value="{{ old('address_3') }}" />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title form-style-required">性別<span class="hissu">※</span></div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                           <input type="radio" name="gender" value="男性" @if(old('gender')=='男性') checked @endif>男性
                           <input type="radio" name="gender" value="女性" @if(old('gender')=='女性') checked @endif>女性
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-layout-title">生年月日</div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <select class="form-field" type="text" name="birthday_1" id="birthday_1" />
                                <option value="1930" @if(old('birthday_1')=='1930') selected @endif>1930</option>
                                <option value="1931" @if(old('birthday_1')=='1931') selected @endif>1931</option>
                                <option value="1932" @if(old('birthday_1')=='1932') selected @endif>1932</option>
                                <option value="1933" @if(old('birthday_1')=='1933') selected @endif>1933</option>
                                <option value="1934" @if(old('birthday_1')=='1934') selected @endif>1934</option>
                                <option value="1935" @if(old('birthday_1')=='1935') selected @endif>1935</option>
                                <option value="1936" @if(old('birthday_1')=='1936') selected @endif>1936</option>
                                <option value="1937" @if(old('birthday_1')=='1937') selected @endif>1937</option>
                                <option value="1938" @if(old('birthday_1')=='1938') selected @endif>1938</option>
                                <option value="1939" @if(old('birthday_1')=='1939') selected @endif>1939</option>
                                <option value="1940" @if(old('birthday_1')=='1940') selected @endif>1940</option>
                                <option value="1941" @if(old('birthday_1')=='1941') selected @endif>1941</option>
                                <option value="1942" @if(old('birthday_1')=='1942') selected @endif>1942</option>
                                <option value="1943" @if(old('birthday_1')=='1943') selected @endif>1943</option>
                                <option value="1944" @if(old('birthday_1')=='1944') selected @endif>1944</option>
                                <option value="1945" @if(old('birthday_1')=='1945') selected @endif>1945</option>
                                <option value="1946" @if(old('birthday_1')=='1946') selected @endif>1946</option>
                                <option value="1947" @if(old('birthday_1')=='1947') selected @endif>1947</option>
                                <option value="1948" @if(old('birthday_1')=='1948') selected @endif>1948</option>
                                <option value="1949" @if(old('birthday_1')=='1949') selected @endif>1949</option>
                                <option value="1950" @if(old('birthday_1')=='1950') selected @endif>1950</option>
                                <option value="1951" @if(old('birthday_1')=='1951') selected @endif>1951</option>
                                <option value="1952" @if(old('birthday_1')=='1952') selected @endif>1952</option>
                                <option value="1953" @if(old('birthday_1')=='1953') selected @endif>1953</option>
                                <option value="1954" @if(old('birthday_1')=='1954') selected @endif>1954</option>
                                <option value="1955" @if(old('birthday_1')=='1955') selected @endif>1955</option>
                                <option value="1956" @if(old('birthday_1')=='1956') selected @endif>1956</option>
                                <option value="1957" @if(old('birthday_1')=='1957') selected @endif>1957</option>
                                <option value="1958" @if(old('birthday_1')=='1958') selected @endif>1958</option>
                                <option value="1959" @if(old('birthday_1')=='1959') selected @endif>1959</option>
                                <option value="1960" @if(old('birthday_1')=='1960') selected @endif>1960</option>
                                <option value="1961" @if(old('birthday_1')=='1961') selected @endif>1961</option>
                                <option value="1962" @if(old('birthday_1')=='1962') selected @endif>1962</option>
                                <option value="1963" @if(old('birthday_1')=='1963') selected @endif>1963</option>
                                <option value="1964" @if(old('birthday_1')=='1964') selected @endif>1964</option>
                                <option value="1965" @if(old('birthday_1')=='1965') selected @endif>1965</option>
                                <option value="1966" @if(old('birthday_1')=='1966') selected @endif>1966</option>
                                <option value="1967" @if(old('birthday_1')=='1967') selected @endif>1967</option>
                                <option value="1968" @if(old('birthday_1')=='1968') selected @endif>1968</option>
                                <option value="1969" @if(old('birthday_1')=='1969') selected @endif>1969</option>
                                <option value="1970" @if(old('birthday_1')=='1970') selected @endif>1970</option>
                                <option value="1971" @if(old('birthday_1')=='1971') selected @endif>1971</option>
                                <option value="1972" @if(old('birthday_1')=='1972') selected @endif>1972</option>
                                <option value="1973" @if(old('birthday_1')=='1973') selected @endif>1973</option>
                                <option value="1974" @if(old('birthday_1')=='1974') selected @endif>1974</option>
                                <option value="1975" @if(old('birthday_1')=='1975') selected @endif>1975</option>
                                <option value="1976" @if(old('birthday_1')=='1976') selected @endif>1976</option>
                                <option value="1977" @if(old('birthday_1')=='1977') selected @endif>1977</option>
                                <option value="1978" @if(old('birthday_1')=='1978') selected @endif>1978</option>
                                <option value="1979" @if(old('birthday_1')=='1979') selected @endif>1979</option>
                                <option value="1980" @if(old('birthday_1')=='1980') selected @endif>1980</option>
                                <option value="1981" @if(old('birthday_1')=='1981') selected @endif>1981</option>
                                <option value="1982" @if(old('birthday_1')=='1982') selected @endif>1982</option>
                                <option value="1983" @if(old('birthday_1')=='1983') selected @endif>1983</option>
                                <option value="1984" @if(old('birthday_1')=='1984') selected @endif>1984</option>
                                <option value="1985" @if(old('birthday_1')=='1985') selected @endif>1985</option>
                                <option value="1986" @if(old('birthday_1')=='1986') selected @endif>1986</option>
                                <option value="1987" @if(old('birthday_1')=='1987') selected @endif>1987</option>
                                <option value="1988" @if(old('birthday_1')=='1988') selected @endif>1988</option>
                                <option value="1989" @if(old('birthday_1')=='1989') selected @endif>1989</option>
                                <option value="1990" @if(old('birthday_1')=='1990') selected @endif>1990</option>
                                <option value="1991" @if(old('birthday_1')=='1991') selected @endif>1991</option>
                                <option value="1992" @if(old('birthday_1')=='1992') selected @endif>1992</option>
                                <option value="1993" @if(old('birthday_1')=='1993') selected @endif>1993</option>
                                <option value="1994" @if(old('birthday_1')=='1994') selected @endif>1994</option>
                                <option value="1995" @if(old('birthday_1')=='1995') selected @endif>1995</option>
                                <option value="1996" @if(old('birthday_1')=='1996') selected @endif>1996</option>
                                <option value="1997" @if(old('birthday_1')=='1997') selected @endif>1997</option>
                                <option value="1998" @if(old('birthday_1')=='1998') selected @endif>1998</option>
                                <option value="1999" @if(old('birthday_1')=='1999') selected @endif>1999</option>
                                <option value="2000" @if(old('birthday_1')=='2000') selected @endif @if(old('birthday_1')=='') selected @endif>2000</option>
                                <option value="2001" @if(old('birthday_1')=='2001') selected @endif>2001</option>
                                <option value="2002" @if(old('birthday_1')=='2002') selected @endif>2002</option>
                                <option value="2003" @if(old('birthday_1')=='2003') selected @endif>2003</option>
                                <option value="2004" @if(old('birthday_1')=='2004') selected @endif>2004</option>
                                <option value="2005" @if(old('birthday_1')=='2005') selected @endif>2005</option>
                                <option value="2006" @if(old('birthday_1')=='2006') selected @endif>2006</option>
                                <option value="2007" @if(old('birthday_1')=='2007') selected @endif>2007</option>
                                <option value="2008" @if(old('birthday_1')=='2008') selected @endif>2008</option>
                                <option value="2009" @if(old('birthday_1')=='2009') selected @endif>2009</option>
                                <option value="2010" @if(old('birthday_1')=='2010') selected @endif>2010</option>
							</select>
                        </div>
                        <div class="col-sm-1 col-md-1">
                            <select class="form-field" type="text" name="birthday_2" id="birthday_2" />
                            <option value="1" selected="selected" @if(old('birthday_2')=='1') selected @endif>1</option>
                            <option value="2" @if(old('birthday_2')=='2') selected @endif>2</option>
                            <option value="3" @if(old('birthday_2')=='3') selected @endif>3</option>
                            <option value="4" @if(old('birthday_2')=='4') selected @endif>4</option>
                            <option value="5" @if(old('birthday_2')=='5') selected @endif>5</option>
                            <option value="6" @if(old('birthday_2')=='6') selected @endif>6</option>
                            <option value="7" @if(old('birthday_2')=='7') selected @endif>7</option>
                            <option value="8" @if(old('birthday_2')=='8') selected @endif>8</option>
                            <option value="9" @if(old('birthday_2')=='9') selected @endif>9</option>
                            <option value="10" @if(old('birthday_2')=='10') selected @endif>10</option>
                            <option value="11" @if(old('birthday_2')=='11') selected @endif>11</option>
                            <option value="12" @if(old('birthday_2')=='12') selected @endif>12</option>
							</select>
					    </div>
                        <div class="col-sm-1 col-md-1">
                          <select class="form-field" type="text" name="birthday_3" id="birthday_3" />
                            <option value="1" selected="selected" @if(old('birthday_3')=='1') selected @endif>1</option>
                            <option value="2" @if(old('birthday_3')=='2') selected @endif>2</option>
                            <option value="3" @if(old('birthday_3')=='3') selected @endif>3</option>
                            <option value="4" @if(old('birthday_3')=='4') selected @endif>4</option>
                            <option value="5" @if(old('birthday_3')=='5') selected @endif>5</option>
                            <option value="6" @if(old('birthday_3')=='6') selected @endif>6</option>
                            <option value="7" @if(old('birthday_3')=='7') selected @endif>7</option>
                            <option value="8" @if(old('birthday_3')=='8') selected @endif>8</option>
                            <option value="9" @if(old('birthday_3')=='9') selected @endif>9</option>
                            <option value="10" @if(old('birthday_3')=='10') selected @endif>10</option>
                            <option value="11" @if(old('birthday_3')=='11') selected @endif>11</option>
                            <option value="12" @if(old('birthday_3')=='12') selected @endif>12</option>
                            <option value="13" @if(old('birthday_3')=='13') selected @endif>13</option>
                            <option value="14" @if(old('birthday_3')=='14') selected @endif>14</option>
                            <option value="15" @if(old('birthday_3')=='15') selected @endif>15</option>
                            <option value="16" @if(old('birthday_3')=='16') selected @endif>16</option>
                            <option value="17" @if(old('birthday_3')=='17') selected @endif>17</option>
                            <option value="18" @if(old('birthday_3')=='18') selected @endif>18</option>
                            <option value="19" @if(old('birthday_3')=='19') selected @endif>19</option>
                            <option value="20" @if(old('birthday_3')=='20') selected @endif>20</option>
                            <option value="21" @if(old('birthday_3')=='21') selected @endif>21</option>
                            <option value="22" @if(old('birthday_3')=='22') selected @endif>22</option>
                            <option value="23" @if(old('birthday_3')=='23') selected @endif>23</option>
                            <option value="24" @if(old('birthday_3')=='24') selected @endif>24</option>
                            <option value="25" @if(old('birthday_3')=='25') selected @endif>25</option>
                            <option value="26" @if(old('birthday_3')=='26') selected @endif>26</option>
                            <option value="27" @if(old('birthday_3')=='27') selected @endif>27</option>
                            <option value="28" @if(old('birthday_3')=='28') selected @endif>28</option>
                            <option value="29" @if(old('birthday_3')=='29') selected @endif>29</option>
                            <option value="30" @if(old('birthday_3')=='30') selected @endif>30</option>
                            <option value="31" @if(old('birthday_3')=='31') selected @endif>31</option>
							</select>
			            </div>
                    </div>
                    <hr>
                    <div class="form-group center">
                        <center><input name="action" id="submit_button" class="btn btn-success" type="submit" value="登録"></center>
                    </div>
                </form>  
				</div>
           <p><a href="#" onclick="window.history.back(); return false;" style="font-size: 15px;">直前のページに戻る</a></p>
            </div>
            
    </body>
</html>
