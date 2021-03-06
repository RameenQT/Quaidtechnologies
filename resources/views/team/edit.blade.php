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
         <li><a href="{{ route('team.index') }}">Team Management  </a></li>
        <li class="active">Edit Member</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Member</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ route('team.index').'/'. $team->id }}" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />

                   <div class="box-body">
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-sm-2 control-label"> Category: <span class="errorstar">*</span></label>

                            <div class="col-sm-10">
                                <select name="category" class="form-control" >
									<option value="">Select Category</option>
									<option value="founders" @if($team->category == 'founders')selected @endif >Founders</option>
									<option value="core_management" @if($team->category == 'core_management')selected @endif >Core Management</option>
									<option value="solution_architects" @if($team->category == 'solution_architects')selected @endif >Solution Architects</option>
									<option value="apps_architects" @if($team->category == 'apps_architects')selected @endif >Apps Architects</option>
									<option value="graphics_ux_experts" @if($team->category == 'graphics_ux_experts')selected @endif >Graphics UX Experts</option>
									<option value="marketing" @if($team->category == 'marketing')selected @endif >Marketing</option>
									<option value="Security" @if($team->category == 'Security')selected @endif >Security</option>
									<option value="finance_legal"  @if($team->category == 'finance_legal')selected @endif >Finance & Legal</option>
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
                                <input type="text" class="form-control" placeholder=" Title" id="title" name="title" value="{{ old('title',$team->title) }}">
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
                                <input type="text" class="form-control" placeholder=" Designation" id="designation" name="designation" value="{{ old('designation',$team->designation) }}">
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
                                <textarea name="description" id="description" class="form-control" rows="10">{{ old('description',$team->description) }}</textarea>
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
                            <label for="image" class="col-sm-2 control-label">Image</label>
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
					<div class="box-body">
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-sm-2 control-label">Current Image</label>
							<div class="col-sm-10">
                                <img src="/assets/uploads/images/{{$team->image}}" />
                            </div>
                        </div>
                    </div>
					<div class="box-body">
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Status</label>

                            <div class="col-sm-10">
								<div class="form-group">
								  <div class="checkbox">
									<label>
									  <input type="radio" name="status" value="Active" @if($team->status == 'Active') checked="checked" @endif >
									  Active
									</label>
								  </div>

								  <div class="checkbox">
									<label>
									  <input type="radio" name="status" value="In Active" @if($team->status == 'In Active') checked="checked" @endif>
									  In Active
									</label>
								  </div>

								
								</div> 
                                
                            </div>
                        </div>
                    </div> 
					
					
					
					
                    
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Update</button>
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
<script src="/admin_theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="/admin_theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>

  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('short_description');
	
    //bootstrap WYSIHTML5 - text editor
    //$(".textarea").wysihtml5();
  });

</script>
<script>

  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('description');
    //bootstrap WYSIHTML5 - text editor
    //$(".textarea").wysihtml5();
  });

</script>
<!-- /.content -->
@endsection
