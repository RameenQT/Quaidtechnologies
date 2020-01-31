@extends('layouts.app')

@section('content')
<style>
.errorstar{color:#dd4b39;}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Portfolio Management 
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('portfolio.index') }}">Portfolio Management </a></li>
        <li class="active">Add Portfolio </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Portfolio</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
				
				<form class="form-horizontal" role="form" method="POST" action="{{ route('portfolio.index') }}" enctype='multipart/form-data'>
                    {{ csrf_field() }}
						
					<div class="row">
							
						<div class="col-md-6">
						<div class="box-body">
								<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
									<label for="type" class="col-sm-4 control-label"> Type: <span class="errorstar">*</span></label>

									<div class="col-sm-8">
										<select name="type" class="form-control" >
											<option value="">Select Type</option>
											<option value="Web" @if(old('type') == 'Web')selected="selected"@endif >Web</option>
											<option value="Mobile" @if(old('type') == 'Mobile')selected="selected"@endif >Mobile</option>
										</select>
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
									<label for="title" class="col-sm-4 control-label"> Title: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder=" Title" id="title" name="title" value="{{ old('title') }}">
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
									<label for="category" class="col-sm-4 control-label">Category: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Category" id="category" name="category" value="{{ old('category') }}">
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('seller') ? ' has-error' : '' }}">
									<label for="seller" class="col-sm-4 control-label">Seller: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Size" id="seller" name="seller" value="{{ old('seller') }}">
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('languages') ? ' has-error' : '' }}">
									<label for="languages" class="col-sm-4 control-label">Languages: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Languages" id="languages" name="languages" value="{{ old('languages') }}">
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('copyright') ? ' has-error' : '' }}">
									<label for="copyright" class="col-sm-4 control-label">Copyright: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Copyright" id="copyright" name="copyright" value="{{ old('copyright') }}">
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('appStoreLine') ? ' has-error' : '' }}">
									<label for="appStoreLine" class="col-sm-4 control-label">App Store Link: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="lay Store Link" id="appStoreLine" name="appStoreLine" value="{{ old('appStoreLine') }}">
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('shortDescription') ? ' has-error' : '' }}">
									<label for="shortDescription" class="col-sm-4 control-label">Short Description: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<textarea name="shortDescription" class="form-control" rows="10" cols="80">{{ old('shortDescription') }}</textarea>
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('clientWords') ? ' has-error' : '' }}">
									<label for="clientWords" class="col-sm-4 control-label">Client Words: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<textarea name="clientWords" class="form-control" rows="10" cols="80">{{ old('clientWords') }}</textarea>
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('desImage1') ? ' has-error' : '' }}">
									<label for="desImage1" class="col-sm-4 control-label">Case Study Image 1 <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="file" name="desImage1" class="form-control">
									
										<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Image File</span>
										
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('PortfolioGallery') ? ' has-error' : '' }}">
									<label for="PortfolioGallery" class="col-sm-4 control-label">portfolio Gallery </label>
									<div class="col-sm-8">
										<input type="file" name="PortfolioGallery[]" class="form-control"  multiple>
									
										<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Multiple Image Files</span>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="box-body">
								<div class="form-group{{ $errors->has('clientName') ? ' has-error' : '' }}">
									<label for="clientName" class="col-sm-4 control-label"> Client Name: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder=" Client Name" id="clientName" name="clientName" value="{{ old('clientName') }}">
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('tagLine') ? ' has-error' : '' }}">
									<label for="tagLine" class="col-sm-4 control-label"> Tag Line: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Tag Line" id="tagLine" name="tagLine" value="{{ old('tagLine') }}">
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('compatibility') ? ' has-error' : '' }}">
									<label for="compatibility" class="col-sm-4 control-label">Compatibility: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Compatibility" id="compatibility" name="compatibility" value="{{ old('compatibility') }}">
									   
									</div>
								</div>
							</div>
								<div class="box-body">
									<div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
										<label for="size" class="col-sm-4 control-label">Zize: <span class="errorstar">*</span></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Size" id="size" name="size" value="{{ old('size') }}">
										   
										</div>
									</div>
								</div>
								<div class="box-body">
									<div class="form-group{{ $errors->has('ageRating') ? ' has-error' : '' }}">
										<label for="ageRating" class="col-sm-4 control-label">Age Rating: <span class="errorstar">*</span></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Age Rating" id="ageRating" name="ageRating" value="{{ old('ageRating') }}">
										   
										</div>
									</div>
								</div>
								<div class="box-body">
									<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
										<label for="price" class="col-sm-4 control-label">Price: <span class="errorstar">*</span></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Price" id="price" name="price" value="{{ old('price') }}">
										</div>
									</div>
								</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('playStoreLink') ? ' has-error' : '' }}">
									<label for="playStoreLink" class="col-sm-4 control-label">Play Store Link: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="lay Store Link" id="playStoreLink" name="playStoreLink" value="{{ old('playStoreLink') }}">
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
									<label for="description" class="col-sm-4 control-label">Description: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<textarea name="description" rows="10" cols="80" class="form-control">{{ old('description') }}</textarea>
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('clientVideo') ? ' has-error' : '' }}">
									<label for="clientVideo" class="col-sm-4 control-label">Client Video/Image <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="file" name="clientVideo" class="form-control">
									
										<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Image Or Video File</span>
										
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('slidrThumb') ? ' has-error' : '' }}">
									<label for="slidrThumb" class="col-sm-4 control-label">Slider Image <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="file" name="slidrThumb" class="form-control">
									
										<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Image File</span>
										
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('mianImage') ? ' has-error' : '' }}">
									<label for="mianImage" class="col-sm-4 control-label">Main Image <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="file" name="mianImage" class="form-control">
									
										<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Image File</span>
										
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('desImage2') ? ' has-error' : '' }}">
									<label for="desImage2" class="col-sm-4 control-label">Case Study Image 2 <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="file" name="desImage2" class="form-control">
									
										<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Image File</span>
										
									</div>
								</div>
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
