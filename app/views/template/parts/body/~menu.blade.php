<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
	<li class="sidebar-toggler-wrapper"><div class="sidebar-toggler"></div></li>
	<li class="sidebar-search-wrapper">@include('template.parts.body.~search-form')</li>



	<li class="start">
		<a href="javascript:;"><i class="icon-user"></i>
			<span class="title">Utilizatori</span>
			<span class="arrow"></span>
		</a>
		<ul class="sub-menu">
			<li>
				<a href="{{ URL::route('grid-utilizatori') }}"><i class="icon-users"></i>Listă utilizatori</a>
			</li>
		</ul>
		<a href="javascript:;">
		<i class="icon-folder"></i>
		<span class="title">Persoane Fizice</span>
		<span class="arrow "></span>
		</a>
		<ul class="sub-menu">
			<li>
				<a href="javascript:;">
				<i class="icon-home"></i> Credite imobiliare <span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li>
						<a href="#">
						Prima Casă</a>
					</li>
					<li>
						<a href="#">
						Credit de achiziție</a>
					</li>
					<li>
						<a href="#"> 
						Credit nevoi personale cu ipotecă</a>
					</li>
					<li>
						<a href="#"> 
						Credit construcție</a>
					</li>
					<li>
						<a href="#">
						Credit de renovări/amenajări</a>
					</li>
					<li>
						<a href="#">
						Refinanțări</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;">
				<i class="icon-wallet"></i> Credite de consum <span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li>
						<a href="#">
						Nevoi personale</a>
					</li>
					<li>
						<a href="#">
						Credite medicale/studii/vacanțe</a>
					</li>
					<li>
						<a href="#">
						Leasing</a>
					</li>
					<li>
						<a href="#">
						Refinanțări</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">
				<i class="icon-bar-chart"></i>
				Imobile </a>
			</li>
			<li>
				<a href="{{URL::route('clienti-index')}}">
				<i class="icon-users"></i>
				Clienți </a>
			</li>
		</ul>
		<a href="javascript:;">
		<i class="icon-briefcase"></i>
		<span class="title">Persoane Juridice</span>
		<span class="arrow "></span>
		</a>
	</li>	
</ul>