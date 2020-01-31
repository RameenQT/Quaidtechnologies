@extends('layouts.app')

@section('content')
<style>
.errorstar{color:#dd4b39;}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
          Clients Management 
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="{{ route('clients.index') }}">Clients Management  </a></li>
        <li class="active">Edit Client</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Client</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ route('clients.index').'/'. $clients->id }}" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />

                   
					<div class="box-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-sm-2 control-label"> Title: <span class="errorstar">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder=" Title" id="title" name="title" value="{{ old('title',$clients->title) }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
				<div class="box-body">
                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-sm-2 control-label"> URL: <span class="errorstar">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder=" URL" id="url" name="url" value="{{ old('url',$clients->url) }}">
                                @if ($errors->has('url'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('url') }}</strong>
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
                                <img src="/assets/uploads/images/{{$clients->image}}" />
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
									  <input type="radio" name="status" value="Active" @if($clients->status == 'Active') checked="checked" @endif >
									  Active
									</label>
								  </div>

								  <div class="checkbox">
									<label>
									  <input type="radio" name="status" value="In Active" @if($clients->status == 'In Active') checked="checked" @endif>
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
