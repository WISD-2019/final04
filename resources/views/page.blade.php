@extends('layouts.template')

@section('title', 'Page Title')

@section('content')
<H1>企業員工出差線上申請</H1>

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <a href="/"><img src="https://images2.alphacoders.com/499/thumb-1920-499590.jpg" alt="Los Angeles" width="100%" height="400"></a>
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>We had such a great time in LA!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://cdn.hipwallpaper.com/i/35/48/NQPLiF.jpg" alt="Chicago" width="100%" height="400" >
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://areajugones.sport.es/wp-content/uploads/2019/11/Studio-Ghibli-780x440.jpg" alt="New York" width="100%" height="400">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>
    </div>

  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<div class="row">
  <div class="col-lg mt-3">
    <div class="thumbnail">
        <div class="caption">
          <H2>最新消息</H2>
          至今刪除將來時間奇蹟並且儘量最佳台北，一樣高中最快上了一年積，房地產大家都本來確保原來評分完善對話隊，鈴聲醫藥之中活力人生收購意思授權方式，室內導致系統快樂不怕內容簡介收藏本頁，下面統計大部分學會有時候必須食品白色實在支撐那時充分一看歌。
        </div>
      </div>
    </div>
  </div>
<section class="box-content container box-1">
			<div class="row">
				<div class="col-sm-4 ">
					<div class="service">
						<a href="#"><img src="images/icon1.png" title="icon-name"></a>
						<h3>The largest network of laboratory centers</h3>
						<p>We have contracts with laboratories all over the world to provide lab services at the best prices. We also contract with the free-standing independent laboratories for... </p>
						<a class="btn btn-danger btn-sm" href="#">Read More</a>
					</div>
				</div>
				<div class="col-sm-4 ">
					<div class="service">
						<a href="#"><img src="images/icon3.png" title="icon-name"></a>
						<h3>The modern laboratory facilities</h3>
						<p>We’ve done our research to ensure that the medical laboratory equipment we use has been industry approved and has surpassed statistical benchmarks for risk assessment. Our team members are highly trained...</p>
						<a class="btn btn-danger btn-sm" href="#">Read More</a>
					</div>
				</div>
				<div class="col-sm-4 ">
					<div class="service">
						<a href="#"><img src="images/icon2.png" title="icon-name"></a>
						<h3>Helpful test tips</h3>
						<p>If you are nervous or have a tendency to feel woozy or faint, tell the phlebotomist before you begin. Your blood can be drawn while you are lying down, which will help you avoid fainting and injuring yourself. If, at any time, you feel faint or lightheaded... </p>
						<a class="btn btn-danger btn-sm" href="#">Read More</a>
					</div>
				</div>		
			</div>
		</section>

@stop
