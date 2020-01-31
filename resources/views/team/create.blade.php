@extends('layouts.app')

@section('content')
<style>
.errorstar{color:#dd4b39;}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Team Management 
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('team.index') }}">Team Management </a></li>
        <li class="active">Add Member </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Member</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
         
				<form class="form-horizontal" role="form" method="POST" action="{{ route('team.index') }}" enctype='multipart/form-data'>
                    {{ csrf_field() }}
					<div class="box-body">
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-sm-2 control-label"> Category: <span class="errorstar">*</span></label>

                            <div class="col-sm-10">
                                <select name="category" class="form-control" >
									<option value="">Select Category</option>
									<option value="founders" @if(old('category') == 'founders')selected="selected"@endif >Founders</option>
									<option value="core_management" @if(old('category') == 'core_management')selected="selected"@endif >Core Management</option>
									<option value="solution_architects" @if(old('category') == 'solution_architects')selected="selected"@endif >Solution Architects</option>
									<option value="apps_architects" @if(old('category') == 'apps_architects')selected="selected"@endif >Apps Architects</option>
									<option value="graphics_ux_experts" @if(old('category') == 'graphics_ux_experts')selected="selected"@endif >Graphics UX Experts</option>
									<option value="marketing" @if(old('category') == 'marketing')selected="selected"@endif >Marketing</option>
									<option value="Security" @if(old('category') == 'Security')selected="selected"@endif >Security</option>
									<option value="finance_legal"  @if(old('category') == 'finance_legal')selected="selected"@endif>Finance & Legal</option>
								</select>
                                @if ($errors->has('category'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					<div class="box-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-sm-2 control-label"> Title: <span class="errorstar">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder=" Title" id="title" name="title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					<div class="box-body">
                        <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label for="designation" class="col-sm-2 control-label"> Designation: <span class="errorstar">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder=" Designation" id="designation" name="designation" value="{{ old('designation') }}">
                                @if ($errors->has('designation'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					<div class="box-body">
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-sm-2 control-label"> Short Description: <span class="errorstar">*</span></label>

                            <div class="col-sm-10">
                                <textarea name="description" id="description" class="form-control" rows="10">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					<div class="box-body">
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-sm-2 control-label">Image <span class="errorstar">*</span></label>
							<div class="col-sm-10">
                                <input type="file" name="image" class="form-control">
							
								<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Only Image File</span>
                                 @if ($errors->has('image'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
					
					
					<!-- /.box-body -->
                    <div class="box-footer">
                        
                        <button type="submit" class="btn btn-info pull-right">Create</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<!-- /.content -->
@endsection
