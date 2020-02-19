@extends('layouts.frontend')

@section('content')
	<section class="banner-area relative about-banner" id="home">	
		<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						Pendaftaran				
					</h1>	
					<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> Pendaftaran</a></p>
				</div>	
			</div>
		</div>
	</section>
	<!-- Start search-course Area -->
	<section class="search-course-area relative" style="background-image: unset">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-6 col-md-6 search-course-left">
					<h1>
						Pendaftaran Kursus Online <br>
						bergabunglah dengan kami!
					</h1>
					<p>
						Dengan metode pembelajaran yang bisa kamu akses kapan saja selamanya, dan bisa menjadi pembelajaran yang singkat tanpa harus buang buang waktu anda. Dan bisa kamu kembangkan kembali nanti didunia pekerjaan. 
					</p>
				</div>
				<div class="col-lg-4 col-md-6 search-course-right section-gap">
					{!! Form::open(['url' => '/postregister','class' => 'form-wrap']) !!}
						<h4 class="pb-20 text-center mb-30">Formulir Pendaftaran</h4>		
						{!!Form::text('fnama','', ['class' => 'form-control','placeholder'=>'Nama Depan','required']) !!}
						{!!Form::text('lnama','', ['class' => 'form-control','placeholder'=>'Nama Belakang','required']) !!}
						{!!Form::text('agama','', ['class' => 'form-control','placeholder'=>'Agama','required']) !!}
						{!!Form::textarea('alamat','', ['class' => 'form-control','placeholder'=>'Alamat','required']) !!}
						<div class="form-select" id="service-select">
							{!! Form::select('jkelamin', ['' => 'Pilih Jenis Kelamin', 'L' => 'Laki-Laki', 'P' => 'Perempuan'], 'L'); !!}
						</div>									
						{!!Form::email('email', '' ,['class' => 'form-control','placeholder'=>'Email','required']) !!}
						{!!Form::password('password', ['class' => 'form-control','placeholder'=>'Password','required']) !!}
						<input type="submit" class="primary-btn text-uppercase" value="Kirim" style="text-align: center;">
					{!! Form::close() !!}
				</div>
			</div>
		</div>	
	</section>
	<!-- End search-course Area -->
@stop

