@extends('layouts.app')

@section('content')
<style>
.errorstar{color:#dd4b39;}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
          Services Management 
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="{{ route('services.index') }}">Services Management  </a></li>
        <li class="active">Edit Service</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Services</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ route('services.index').'/'. $service->id }}" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />

                    
					<div class="box-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-sm-2 control-label"> Title: <span class="errorstar">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder=" Title" id="title" name="title" value="{{ old('title',$service->title) }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					
					<div class="box-body">
                        <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
                            <label for="short_description" class="col-sm-2 control-label">Short Description <span class="errorstar">*</span></label>

                            <div class="col-sm-10">
                                <textarea id="short_description" name="short_description" rows="10" cols="80">{{ old('short_description',$service->short_description) }}</textarea>
                                @if ($errors->has('short_description'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('short_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					<div class="box-body">
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-sm-2 control-label">Description <span class="errorstar">*</span></label>

                            <div class="col-sm-10">
                                <textarea id="description" name="description" rows="10" cols="80">{{ old('description',$service->description) }}</textarea>
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
                            <label for="image" class="col-sm-2 control-label">Service Image</label>
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
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Status</label>

                            <div class="col-sm-10">
								<div class="form-group">
								  <div class="checkbox">
									<label>
									  <input type="radio" name="status" value="Active" @if($service->status == 'Active') checked="checked" @endif >
									  Active
									</label>
								  </div>

								  <div class="checkbox">
									<label>
									  <input type="radio" name="status" value="In Active" @if($service->status == 'In Active') checked="checked" @endif>
									  In Active
									</label>
								  </div>

								
								</div> 
                                
                            </div>
                        </div>
                    </div> 
					
				
					<div class="box-body">
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Show On Home Page</label>

                            <div class="col-sm-10">
								<div class="form-group">
								  <div class="checkbox">
									<label>
									  <input type="radio" name="showonhomepage" value="Yes" @if($service->showonhomepage == 'Yes') checked="checked" @endif >
									  Yes
									</label>
								  </div>

								  <div class="checkbox">
									<label>
									  <input type="radio" name="showonhomepage" value="No" @if($service->showonhomepage == 'No') checked="checked" @endif>
									  No
									</label>
								  </div>

								
								</div> 
                                
                            </div>
                        </div>
                    </div> 
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
													<input type="text" class="form-control" placeholder=" Meta Title" id="meta_title" name="meta_title" value="{{ old('meta_title',$service->meta_title) }}">
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
														<textarea id="meta_description" name="meta_description" rows="10" cols="113">{{ old('meta_description',$service->meta_description) }}</textarea>
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
														<textarea id="focus_keywords" name="focus_keywords" rows="10" cols="113">{{ old('focus_keywords',$service->focus_keywords) }}</textarea>
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
    CKEDITOR.replace('description');
    //bootstrap WYSIHTML5 - text editor
    //$(".textarea").wysihtml5();
  });

</script>
<!-- /.content -->
@endsection
