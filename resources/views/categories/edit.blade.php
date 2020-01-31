@extends('layouts.app')

@section('content')
<style>
.errorstar{color:#dd4b39;}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
           Categories Management  
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="{{ route('categories.index') }}"> Categories Management   </a></li>
        <li class="active">Edit Category</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Category</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ route('categories.index').'/'. $categories->id }}" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />

                    
					<div class="box-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-sm-2 control-label"> Title: <span class="errorstar">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder=" Title" id="title" name="title" value="{{ old('title',$categories->title) }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
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
