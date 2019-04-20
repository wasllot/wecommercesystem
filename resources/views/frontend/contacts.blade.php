@extends('frontend.master')
@section('content')
<!-- BREADCRUMBS -->
<section class="breadcrumb parallax margbot30"></section>
<!-- //BREADCRUMBS -->


<!-- PAGE HEADER -->
<section class="page_header py-4">

	<!-- CONTAINER -->
	<div class="container">
		<h3 class="pull-left py-2">
			<b>@lang('site.contacts')</b>
		</h3>

		<div class="pull-right py-2">
			<a href="/">@lang('site.back')<i class="fa fa-angle-right"></i></a>
		</div>
	</div>
	<!-- //CONTAINER -->
</section>
<!-- //PAGE HEADER -->


<!-- CONTACTS BLOCK -->
<section class="contacts_block">

	<!-- CONTAINER -->
	<div class="container">

		<!-- ROW -->
		<div class="row padbot30">
			<div class="col-lg-8 col-md-8 padbot30">
				<div id="map">
					<iframe height="490"
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15707.475692867787!2d-64.6932407242923!3d10.19129853773612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2d736754808be5%3A0x2fe867b57d7d6659!2zTGVjaGVyw61hLCBBbnpvw6F0ZWd1aQ!5e0!3m2!1ses-419!2sve!4v1555256335231!5m2!1ses-419!2sve" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 padbot30">
				<ul class="contact_info_block">
					<li>
						<h3>
							<i class="fa fa-map-marker"></i><b>@lang('site.contact address')</b>
						</h3>
						<p>Full repuesto,</p> <span> Av. Daniel Camejo Octavio </span>
					</li>
					<li>
						<h3>
							<i class="fa fa-phone"></i><b>@lang('site.phone')s</b>
						</h3>
						<p class="phone">(+58) 400 00 00</p>
						<p class="phone">(+58) 500 00 00</p>
					</li>
					<li>
						<h3>
							<i class="fa fa-envelope"></i><b>@lang('site.email')s</b>
						</h3>
						<p>@lang('site.shippings')</p> <a href="mailto:adv@glammyshop.com">consultas@fullrepuesto.com</a>

						<p>@lang('site.claims')</p> <a href="mailto:partner@glammyshop.com">reclamos@fullrepuesto.com</a>

					</li>
				</ul>
			</div>
		</div>
		<!-- //ROW -->
	</div>
	<!-- //CONTAINER -->
</section>
<!-- //CONTACTS BLOCK -->
@endsection