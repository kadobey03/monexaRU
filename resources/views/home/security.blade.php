
@extends('layouts.base')

@section('title', 'Условия и Положения')


@section('content')
<section class="hero-section">
	<div class="container">
		<h1>Услуги</h1>
	</div>
</section>

<section class="bg-light-blue py-5">
	<div class="container">
		<div class="text-center">
			<div class="text-primary text-uppercase small font-weight-bold">НАШИ УСЛУГИ</div>
			<h1 class="my-4">Принесите к столу стратегии выживания<br/>win-win, чтобы обеспечить проактивное<br/>доминирование. </h1>
			<div class="divider"></div>
		</div>
		<div class="sliderteam mt-4">
			<div class="feature-10 m-3">
				<div>
					<img src="temp/custom/images/investment-consultancy-sm.jpg" alt="">
					<div class="feature-10-desc">
						<h5>Инвестиционные Консультации</h5>
						<!-- featured-desc-->
						<p>Мы проводим глубокую работу по формулированию инвестиционных стратегий клиентов, помогая им осуществить свои инвестиционные мечты.</p>
						                  <p>Bullishforx Limited предоставляет инвесторам инвестиционные продукты, консультации и/или планирование, проводит глубокую работу по формулированию инвестиционных стратегий, помогая вам удовлетворить ваши потребности и достичь ваших финансовых целей. Мы также предоставляем стратегические консультации по распределению активов, управлению рисками, разработке инвестиционной политики, структурированию классов активов, оценке и мониторингу инвестиционных менеджеров.</p>
                                    
					</div>
				</div>
			</div>
			<div class="feature-10 m-3">
				<div>
					<img src="temp/custom/images/crypto-investment-sm.jpg" alt="">
					<div class="feature-10-desc">
						<h5>Инвестиции в Криптовалюту</h5>
						<!-- featured-desc-->
						<p>Виртуальные или криптовалюты, такие как Bitcoin и Ethereum, определенно являются самыми горячими инвестициями на сегодняшний день.</p>
						                  <p>Криптовалюта - это форма цифровых денег, которая предназначена для безопасности и, во многих случаях, анонимности. Это валюта, связанная с интернетом, которая использует криптографию, процесс преобразования понятной информации в практически невзламываемый код, для отслеживания покупок и переводов.</p>
					</div>
				</div>
			</div>
			<div class="feature-10 m-3">
				<div>
					<img src="temp/custom/images/forex-investment-sm.jpg" alt="">
					<div class="feature-10-desc">
						<h5>Торговля на Форекс</h5>
						<!-- featured-desc-->
						<p>Валютный рынок Форекс, также называемый "валютным рынком", является крупнейшим и наиболее ликвидным рынком в мире.</p>
						                  <p>Валютный рынок (Forex) - это "место", где торгуются валюты. Валюты важны для большинства людей по всему миру, осознают они это или нет, потому что валюты нужно обменивать для проведения внешней торговли и бизнеса. Если вы живете в США и хотите купить сыр из Франции, либо вы, либо компания, у которой вы покупаете сыр, должны заплатить французам за сыр в евро (EUR).</p>
                                    
					</div>
				</div>
			</div>
			<div class="feature-10 m-3">
				<div>
					<img src="temp/custom/images/stock-investment-sm.jpg" alt="">
					<div class="feature-10-desc">
						<h5>Stock & Commodities</h5>
						<p>Stock &amp; Commodities can actually reduce overall risk as a part of a diversified portfolio.</p>
						<p>Investing in stocks can be very costly if you trade constantly, especially with a minimum amount of money available to invest. Stock investing &amp; Commodity investing do not always deliver the same return, there are times when one investment outperforms the other; maintaining an allocation to each group may help contribute to a portfolio's overall long-term performance.</p>
					</div>
				</div>
			</div>
			<div class="feature-10 m-3">
				<div>
					<img src="temp/custom/images/real-estate-investment-sm.jpg" alt="">
					<div class="feature-10-desc">
						<h5>Real Estate Investment</h5>
						<p>Buying real estate is about more than just finding a place to call home. Investing in real estate has become increasingly popular over the last 50 years and has become a common investment vehicle.</p>
						<p>Although the real estate market has plenty of opportunities for making big gains, buying and owning real estate is a lot more complicated than investing in stocks and bonds.</p>
					</div>
				</div>
			</div>
			<div class="feature-10 m-3">
				<div>
					<img src="temp/custom/images/cannabis-legalised.jpg" alt="">
					<div class="feature-10-desc">
						<h5>Cannabis Investment</h5>
						
						<p>Cannabis, also known as marijuana among other names, is a psychoactive drug from the Cannabis plant used for medical or recreational purposes.</p>
						<p>Global spending on legal cannabis is expected to grow 230%, to $31.3% billion in 2022, compared to $9.5 billion in 2017, according to Arcview Market Research and BDS Analytics.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="text-center my-4">
			<a href="register" class="btn btn-primary">GET STARTED</a>
		</div>
	</div>
</section>
<section class="ttm-row ttm-bgcolor-darkgrey ttm-bg ttm-bgimage-yes bg-img1 services-section clearfix text-light" style="background-image: url(images/row-bgimage-2.jpg);">
	<div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
	<div class="container">
		<div class="text-center">
			<div class="row">
				<div class="col-md-12">
					<div class="text-primary text-uppercase small font-weight-bold">{{$settings->site_name}}</div>
					<h1 class="my-4">How Does it Work?</h1>
					<div class="divider"></div>
				</div>
			</div>
			<div style="max-width: 700px;margin-left: auto;margin-right: auto;">
			<div class="mt-4 videoWrapper">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/x7msE3tx8QI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			</div></div>
		</div>
		<div class="text-center my-4" style="position: relative;">
			<a href="services" class="btn btn-primary">READ MORE</a>
		</div>
	</div>
</section>
<div class="bg-white">
	<div class="container py-5">

	
	</div>
</div>
<script src="temp/custom/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">

$('.sliderteam').slick({
	slidesToShow: 3,
	lazyLoad: 'ondemand',
	slidesToScroll: 3,
	autoplay: false,
	autoplaySpeed: 3000,
	infinite: true,
	arrows: false,
	dots: false,
	responsive: [
    {
      breakpoint: 645,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },]
});
</script>


@endsection