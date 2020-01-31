@extends('layouts.app')

@section('content')
<style>
.errorstar{color:#dd4b39;}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        General Settings 
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="{{ route('generalsettings.index') }}">General Settings </a></li>
        <li class="active">Edit General Settings</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit General Settings</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ route('generalsettings.index').'/'. $generalsettings->id }}" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />

                    
					<div class="box-body">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-2 control-label"> Email </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email',$generalsettings->email) }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					<div class="box-body">
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-sm-2 control-label"> Phone </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone" value="{{ old('phone',$generalsettings->phone) }}">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					
					
					
				
					<div class="box-body">
                        <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                            <label for="facebook" class="col-sm-2 control-label"> Facebook </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Facebook" id="facebook" name="facebook" value="{{ old('facebook',$generalsettings->facebook) }}">
                                @if ($errors->has('facebook'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					<div class="box-body">
                        <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                            <label for="twitter" class="col-sm-2 control-label"> Twitter </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Twitter" id="twitter" name="twitter" value="{{ old('twitter',$generalsettings->twitter) }}">
                                @if ($errors->has('twitter'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					<div class="box-body">
                        <div class="form-group{{ $errors->has('linkdin') ? ' has-error' : '' }}">
                            <label for="linkdin" class="col-sm-2 control-label">Instagram </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Instagram" id="linkdin" name="linkdin" value="{{ old('linkdin',$generalsettings->linkdin) }}">
                                @if ($errors->has('linkdin'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('linkdin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					
					<div class="box-body">
                        <div class="form-group{{ $errors->has('google') ? ' has-error' : '' }}">
                            <label for="google" class="col-sm-2 control-label">Google Plus </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Google Plus " id="google" name="google" value="{{ old('google',$generalsettings->google) }}">
                                @if ($errors->has('google'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('google') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					<div class="box-body">
                        <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
                            <label for="linkedin" class="col-sm-2 control-label">Linkedin </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Linkedin" id="linkedin" name="linkedin" value="{{ old('linkedin',$generalsettings->linkedin) }}">
                                @if ($errors->has('linkedin'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('linkedin') }}</strong>
                                    </span>
                                @endif
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
													<input type="text" class="form-control" placeholder=" Meta Title" id="meta_title" name="meta_title" value="{{ old('meta_title',$generalsettings->meta_title) }}">
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
														<textarea id="meta_description" name="meta_description" rows="10" cols="113">{{ old('meta_description',$generalsettings->meta_description) }}</textarea>
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
														<textarea id="focus_keywords" name="focus_keywords" rows="10" cols="113">{{ old('focus_keywords',$generalsettings->focus_keywords) }}</textarea>
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
    CKEDITOR.replace('address');
	
    //bootstrap WYSIHTML5 - text editor
    //$(".textarea").wysihtml5();
  });

</script>

<!-- /.content -->
@endsection
