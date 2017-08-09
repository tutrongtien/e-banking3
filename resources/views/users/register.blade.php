@extends('layouts.main')

@section('user')
<div class="content_info">

	<div class="title-vertical-line">
		<h2><span>Register</span> Area</h2>
		<p class="lead">Register and our customer, we will be happy to help.</p>
	</div>


	<div class="paddings">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form action="#non" method="post" class="fcorn-register container">
						{{ csrf_field() }}
						<p class="register-info">Note: All fields are required.</p>

						<p><input type="email" placeholder="Email Address" required="">
						<span class="extern-type">We'll keep this private.</span>
						</p>
					</form>
				</div>

				<div class="col-md-6">
					<div class="title-subtitle">
						<h5>Company Value</h5>
						<h3>Who Are You</h3>
						<p class="lead">Coop Bank is a company of the envato Foundation through its banking activities to contribute in overcoming the structural causes of poverty.</p>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h5>Our Mission</h5>
							<p>Lorem iur adipiscing elit. Ut vehicula dapibus augue nec maximustiam eleifend magna erat, quis vestibulum lacus mattis sit ametec pellentesque lorem sapien.</p>
						</div>
						<div class="col-md-6">
							<h5>Responsibilty</h5>
							<p>Lorem iur adipiscing elit. Ut vehicula dapibus augue nec maximustiam eleifend magna erat, quis vestibulum lacus mattis sit ametec pellentesque lorem sapien.</p>
						</div>
					</div>
					<img src="img/gallery/1.jpg" alt="" class="img-responsive">
				</div>
			</div>	
		</div>		
	</div>

</div>
@stop