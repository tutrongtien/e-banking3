@extends('layouts.admin')


@section('content')
	@if (Session::has('success'))
		<div class="alert alert-success">
		{{ Session::get('success') }}
		</div>
	@endif
	<p style="color: #15a4d3; font-weight: bold;">Thông tin chi tiết</p>
	<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                    	<tr>
                    		<td>Tên</td>
                    		<td>{{ (isset($user->userInfo->name) ? $user->userInfo->name : '') }}</td>
                    	</tr>
                      <tr>
                        <td>ID đăng nhập</td>
                        <td>{{ $user->user_name}}</td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td>{{ $user->email}}</td>
                      </tr>
                      <tr>
                        <td>Admin</td>
                        <td>
	                        @if(($user->is_admin == 1)) <span class="glyphicon glyphicon-ok"></span>
	                     	@else <span class="glyphicon glyphicon-remove"></span>	 
	                        @endif	
                      </tr>
                     
                    </tbody>

                  </table>

                </div>

              </div>
            </div>
                 <div class="panel-footer">
						
                    <span class="">
                        <a href="{{ url('admin/edit') . '/' . $user->id }}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{{ url('admin/delete') . '/' . $user->id }}" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                    </span>
                </div>
            
          </div>


@stop