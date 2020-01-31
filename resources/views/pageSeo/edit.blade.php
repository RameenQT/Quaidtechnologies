@extends('layouts.app')

@section('content')
<style>
.errorstar{color:#dd4b39;}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
            Page SEO Content
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="{{ route('blog.index') }}">  Page SEO Content  </a></li>
        <li class="active">Edit Content</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Content</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ route('pageSeo.index').'/'. $pageSeo->id }}" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />
					<div class="box-body">
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
						<div class="col-sm-2" > </div>
                           <div class="col-sm-10">
                                <div class="box box-info box-solid">
									<div class="box-header with-border">
									  <h3 class="box-title">SEO Related</h3>

									  <div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
										</button>
									  </div>
									  <!-- /.box-tools -->
									</div>
									<!-- /.box-header -->
									<div class="box-body">
									 
											<div class="form-group{{ $errors->has('meta_title') ? ' has-error' : '' }}">
												<label for="meta_title" class="col-sm-2 control-label"> Meta Title: <span class="errorstar">*</span></label>

												<div class="col-sm-10">
													<input type="text" class="form-control" placeholder=" Meta Title" id="meta_title" name="meta_title" value="{{ old('meta_title',$pageSeo->meta_title) }}">
													@if ($errors->has('meta_title'))
														<span class="help-block">
														<strong>{{ $errors->first('meta_title') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="box-body">
												<div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
													<label for="meta_description" class="col-sm-2 control-label">Meta Description <span class="errorstar">*</span></label>

													<div class="col-sm-10">
														<textarea id="meta_description" name="meta_description" rows="10" cols="113">{{ old('meta_description',$pageSeo->meta_description) }}</textarea>
														@if ($errors->has('meta_description'))
															<span class="help-block">
															<strong>{{ $errors->first('meta_description') }}</strong>
															</span>
														@endif
													</div>
												</div>
											</div>
											<div class="box-body">
												<div class="form-group{{ $errors->has('focus_keywords') ? ' has-error' : '' }}">
													<label for="focus_keywords" class="col-sm-2 control-label">Focus Keywords <span class="errorstar">*</span></label>

													<div class="col-sm-10">
														<textarea id="focus_keywords" name="focus_keywords" rows="10" cols="113">{{ old('focus_keywords',$pageSeo->focus_keywords) }}</textarea>
														@if ($errors->has('focus_keywords'))
															<span class="help-block">
															<strong>{{ $errors->first('focus_keywords') }}</strong>
															</span>
														@endif
													</div>
												</div>
											</div>
									</div>
									<!-- /.box-body -->
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
