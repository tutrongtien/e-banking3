@extends('layouts.user')

@section('content')
	<ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" class="active">
	        <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Personal Info</a>
	    </li>
	    <li role="presentation">
	        <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Change Password</a>
	    </li>
	</ul>


	<div class="tab-content">

	    <div role="tabpanel" class="tab-pane fade in active" id="tab1">
	        <form action="#" class="form-theme">
	            <label>First Name</label>
	            <input type="number" placeholder="Federick" class="input">
	            <label>Last Name</label>
	            <input type="number" placeholder="Gordon" class="input">
	            <label>Mobile Number</label>
	            <input type="number" placeholder="+1 6358734" class="input">
	            <label>Interests</label>
	            <input type="number" placeholder="Credits, accounts, etc.." class="input">
	            <label>Ocupation</label>
	            <input type="number" placeholder="Web Developer" class="input">
	            <label>About</label>
	            <textarea placeholder="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas"></textarea>
	            <label>Web Site Url</label>
	            <input type="number" placeholder="http://www.iwthemes.com" class="input">
	            <input type="submit" class="btn" value="Save Changes">
	        </form>
	    </div>


	    <div role="tabpanel" class="tab-pane fade in" id="tab3">
	        <form action="#" class="form-theme">
	            <label>Current Password</label>
	            <input type="number" placeholder="Federick" class="input">
	            <label>New Password</label>
	            <input type="number" placeholder="Gordon" class="input">
	            <label>Re-type New Password</label>
	            <input type="number" placeholder="+1 6358734" class="input">
	            <input type="submit" class="btn" value="Save Changes">
	        </form>
	    </div>

	</div>
@stop