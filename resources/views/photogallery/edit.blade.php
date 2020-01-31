@extends('layouts.app')

@section('content')
<style>
.errorstar{color:#dd4b39;}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
          Photo Gallery 
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="{{ route('photogallery.index') }}">Photo Gallery  </a></li>
        <li class="active">Edit Photo </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Photo</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ route('photogallery.index').'/'. $photogallery->id }}" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />

                    	<div class="box-body">
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-sm-2 control-label"> Image Type <span class="errorstar">*</span></label>

                            <div class="col-sm-10">
                                <select name="type" id="type" class="form-control">
									<option value="">Select Image Type</option>
									<option value="About Page" @if($photogallery->type == 'About Page' )selected @endif >About Page</option>
									<option value="Team Page" @if($photogallery->type == 'Team Page' )selected @endif >Team Page</option>
								</select>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					<div class="box-body">
                        <div class="form-group{{ $errors->has('story') ? ' has-error' : '' }}">
                            <label for="story" class="col-sm-2 control-label"> Story <span class="errorstar">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder=" Story" id="story" name="story" value="{{ old('story',$photogallery->story) }}">
                                @if ($errors->has('story'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('story') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
					
				
					<div class="box-body">
                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label for="photo" class="col-sm-2 control-label"> Photo </label>
							<div class="col-sm-10">
                                <input type="file" name="photo" class="form-control">
							
								<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Only Image File</span>
                                 @if ($errors->has('photo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
					<div class="box-body">
                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label for="photo" class="col-sm-2 control-label"> Old Photo </label>
							<div class="col-sm-10">
                               <img src="/assets/uploads/images/{{$photogallery->photo}}" style="width:600px;"/>
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
									  <input type="radio" name="display" value="Y" @if($photogallery->display == 'Y') checked="checked" @endif >
									  Active
									</label>
								  </div>

								  <div class="checkbox">
									<label>
									  <input type="radio" name="display" value="N" @if($photogallery->display == 'N') checked="checked" @endif>
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

<!-- /.content -->
@endsection
