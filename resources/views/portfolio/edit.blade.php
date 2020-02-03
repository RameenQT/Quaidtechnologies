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
         <li><a href="{{ route('portfolio.index') }}">Portfolio Management  </a></li>
        <li class="active">Edit Portfolio</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Portfolio</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ route('portfolio.index').'/'. $portfolio->id }}" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />
						
					<div class="row">
							
						<div class="col-md-6">
						<div class="box-body">
								<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
									<label for="type" class="col-sm-4 control-label"> Type: <span class="errorstar">*</span></label>

									<div class="col-sm-8">
										<select name="type" class="form-control" >
											<option value="">Select Type</option>
                                            <option value="Web" disabled @if($portfolio->type == 'Web')selected @endif >Web</option>
									        <option value="Mobile" @if($portfolio->type == 'Mobile')selected @endif >Mobile</option>
										</select>
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
									<label for="title" class="col-sm-4 control-label"> Title: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder=" Title" id="title" name="title" value="{{ old('title',$portfolio->title) }}">
										
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
									<label for="category" class="col-sm-4 control-label">Category: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Category" id="category" name="category" value="{{ old('category',$portfolio->category) }}">
										@if ($errors->has('category'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('seller') ? ' has-error' : '' }}">
									<label for="seller" class="col-sm-4 control-label">Seller: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Size" id="seller" name="seller" value="{{ old('seller',$portfolio->seller) }}">
										@if ($errors->has('seller'))
                                    	<span class="help-block">
                                    	<strong>{{ $errors->first('seller') }}</strong>
                                   	 	</span>
                               			 @endif
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('languages') ? ' has-error' : '' }}">
									<label for="languages" class="col-sm-4 control-label">Languages: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Languages" id="languages" name="languages" value="{{ old('languages',$portfolio->languages) }}">
										@if ($errors->has('languages'))
                                    	<span class="help-block">
                                    	<strong>{{ $errors->first('languages') }}</strong>
                                   	 	</span>
                               			 @endif
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('copyright') ? ' has-error' : '' }}">
									<label for="copyright" class="col-sm-4 control-label">Copyright: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Copyright" id="copyright" name="copyright" value="{{ old('copyright',$portfolio->copyright) }}">
										@if ($errors->has('copyright'))
                                    	<span class="help-block">
                                    	<strong>{{ $errors->first('copyright') }}</strong>
                                   	 	</span>
                               			 @endif
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('appStoreLine') ? ' has-error' : '' }}">
									<label for="appStoreLine" class="col-sm-4 control-label">App Store Link: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="lay Store Link" id="appStoreLine" name="appStoreLine" value="{{ old('appStoreLine',$portfolio->appStoreLine) }}">
										@if ($errors->has('appStoreLine'))
                                    	<span class="help-block">
                                    	<strong>{{ $errors->first('appStoreLine') }}</strong>
                                   	 	</span>
                               			 @endif
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('shortDescription') ? ' has-error' : '' }}">
									<label for="shortDescription" class="col-sm-4 control-label">Short Description: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<textarea name="shortDescription" class="form-control" rows="10" cols="80">{{ old('shortDescription',$portfolio->shortDescription) }}</textarea>
										@if ($errors->has('shortDescription'))
                                    	<span class="help-block">
                                    	<strong>{{ $errors->first('shortDescription') }}</strong>
                                   	 	</span>
                               			 @endif
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('clientWords') ? ' has-error' : '' }}">
									<label for="clientWords" class="col-sm-4 control-label">Client Words: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<textarea name="clientWords" class="form-control" rows="10" cols="80">{{ old('clientWords',$portfolio->clientWords) }}</textarea>
										@if ($errors->has('clientWords'))
                                    	<span class="help-block">
                                    	<strong>{{ $errors->first('clientWords') }}</strong>
                                   	 	</span>
                               			 @endif
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('desImage1') ? ' has-error' : '' }}">
									<label for="desImage1" class="col-sm-4 control-label">Case Study Image 1 <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="file" name="desImage1" class="form-control">
								
										<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Image File</span>
										@if ($errors->has('desImage1'))
                                    	<span class="help-block">
                                    	<strong>{{ $errors->first('desImage1') }}</strong>
                                   	 	</span>
                               			 @endif
									</div>
								</div>
							</div>
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('desImage1') ? ' has-error' : '' }}">
                                    <label for="desImage1" class="col-sm-4 control-label">Current Image</label>
							        <div class="col-sm-8">
                                        <img src="/assets/uploads/images/{{$portfolio->desImage1}}" height="150" width="150"/>
                                    </div>
                                </div>
                            </div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('PortfolioGallery') ? ' has-error' : '' }}">
									<label for="PortfolioGallery" class="col-sm-4 control-label">portfolio Gallery </label>
									<div class="col-sm-8">
										<input type="file" name="PortfolioGallery[]" class="form-control"  multiple>
										
										<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Multiple Image Files</span>
										@if ($errors->has('PortfolioGallery'))
                                    	<span class="help-block">
                                    	<strong>{{ $errors->first('PortfolioGallery') }}</strong>
                                   	 	</span>
                               			 @endif
									</div>
								</div>
							</div>
							<div class="box-body">
                                <div class="form-group{{ $errors->has('PortfolioGallery') ? ' has-error' : '' }}">
                                    <label for="PortfolioGallery" class="col-sm-4 control-label">Current Image</label>
							        <div class="box-body">
									<?php
									//Columns must be a factor of 12 (1,2,3,4,6,12)
									$numOfCols = 4;
									$rowCount = 0;
									$bootstrapColWidth = 12 / $numOfCols;
									?>
									<div class="row">
									<div class="col-sm-6">
									@foreach($portfolioGallery as $image)
										<div class="col-sm-3">
											<img src="/assets/uploads/images/{{$image->image}}" style="width:150px;height:200px;"/>
										</div>
										<?php
										$rowCount++;
										if($rowCount % $numOfCols == 0) echo '</div><div  class="row" style="margin-top:50px;" >';
										?>
										@endforeach
										</div>
									</div>
                                </div>
                                </div>
                            </div>
						</div>
						<div class="col-md-6">
							<div class="box-body">
								<div class="form-group{{ $errors->has('clientName') ? ' has-error' : '' }}">
									<label for="clientName" class="col-sm-4 control-label"> Client Name: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder=" Client Name" id="clientName" name="clientName" value="{{ old('clientName',$portfolio->clientName) }}">
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('tagLine') ? ' has-error' : '' }}">
									<label for="tagLine" class="col-sm-4 control-label"> Tag Line: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Tag Line" id="tagLine" name="tagLine" value="{{ old('tagLine',$portfolio->tagLine) }}">
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('compatibility') ? ' has-error' : '' }}">
									<label for="compatibility" class="col-sm-4 control-label">Compatibility: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Compatibility" id="compatibility" name="compatibility" value="{{ old('compatibility',$portfolio->compatibility) }}">
									   
									</div>
								</div>
							</div>
								<div class="box-body">
									<div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
										<label for="size" class="col-sm-4 control-label">Size: <span class="errorstar">*</span></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Size" id="size" name="size" value="{{ old('size',$portfolio->size) }}">
										   
										</div>
									</div>
								</div>
								<div class="box-body">
									<div class="form-group{{ $errors->has('ageRating') ? ' has-error' : '' }}">
										<label for="ageRating" class="col-sm-4 control-label">Age Rating: <span class="errorstar">*</span></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Age Rating" id="ageRating" name="ageRating" value="{{ old('ageRating',$portfolio->ageRating) }}">
										   
										</div>
									</div>
								</div>
								<div class="box-body">
									<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
										<label for="price" class="col-sm-4 control-label">Price: <span class="errorstar">*</span></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Price" id="price" name="price" value="{{ old('price',$portfolio->price) }}">
										</div>
									</div>
								</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('playStoreLink') ? ' has-error' : '' }}">
									<label for="playStoreLink" class="col-sm-4 control-label">Play Store Link: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="lay Store Link" id="playStoreLink" name="playStoreLink" value="{{ old('playStoreLink',$portfolio->playStoreLink) }}">
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
									<label for="description" class="col-sm-4 control-label">Description: <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<textarea name="description" rows="10" cols="80" class="form-control">{{ old('description',$portfolio->description) }}</textarea>
									   
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('clientVideo') ? ' has-error' : '' }}">
									<label for="clientVideo" class="col-sm-4 control-label">Client Video/Image <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="file" name="clientVideo" class="form-control">
									
										<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Image Or Video File</span>
										@if ($errors->has('clientVideo'))
                                    	<span class="help-block">
                                    	<strong>{{ $errors->first('clientVideo') }}</strong>
                                   	 	</span>
                               			 @endif
									</div>
								</div>
							</div>
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('clientVideo') ? ' has-error' : '' }}">
                                    <label for="clientVideo" class="col-sm-4 control-label">Current video/Image</label>
							        <div class="col-sm-8">
										<video height="150" width="150" controls>
										<source src="/assets/uploads/images/{{$portfolio->clientVideo}}" type="video/mp4">
										</video>
									<!--<img src="/assets/uploads/images/{{$portfolio->clientVideo}}"height="150" width="150" />-->
									
									</div>
                                </div>
                            </div>
							
							<div class="box-body">
								<div class="form-group{{ $errors->has('slidrThumb') ? ' has-error' : '' }}">
									<label for="slidrThumb" class="col-sm-4 control-label">Slider Image </label>
									<div class="col-sm-8">
										<input type="file" name="slidrThumb" class="form-control">
									
										<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Image File</span>
										@if ($errors->has('slidrThumb'))
                                    	<span class="help-block">
                                    	<strong>{{ $errors->first('slidrThumb') }}</strong>
                                   	 	</span>
                               			 @endif
									</div>
								</div>
							</div>
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('slidrThumb') ? ' has-error' : '' }}">
                                    <label for="slidrThumb" class="col-sm-4 control-label">Current Image</label>
							        <div class="col-sm-8">
                                        <img src="/assets/uploads/images/{{$portfolio->slidrThumb}}"height="150" width="150" />
                                    </div>
                                </div>
                            </div>
                    
							<div class="box-body">
								<div class="form-group{{ $errors->has('mianImage') ? ' has-error' : '' }}">
									<label for="mianImage" class="col-sm-4 control-label">Main Image <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="file" name="mianImage" class="form-control">
									
										<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Image File</span>
										@if ($errors->has('mianImage'))
                                    	<span class="help-block">
                                    	<strong>{{ $errors->first('mianImage') }}</strong>
                                   	 	</span>
                               			 @endif
									</div>
								</div>
							</div>
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('mianImage') ? ' has-error' : '' }}">
                                    <label for="mianImage" class="col-sm-4 control-label">Current Image</label>
							        <div class="col-sm-8">
                                        <img src="/assets/uploads/images/{{$portfolio->mianImage}}" height="150" width="150"/>
                                    </div>
                                </div>
                            </div>
							<div class="box-body">
								<div class="form-group{{ $errors->has('desImage2') ? ' has-error' : '' }}">
									<label for="desImage2" class="col-sm-4 control-label">Case Study Image 2 <span class="errorstar">*</span></label>
									<div class="col-sm-8">
										<input type="file" name="desImage2" class="form-control">
									
										<span style="font-size: 14px;font-weight: normal;color:#3c8dbc;">Upload Image File</span>
										@if ($errors->has('desImage2'))
                                    	<span class="help-block">
                                    	<strong>{{ $errors->first('desImage2') }}</strong>
                                   	 	</span>
                               			 @endif
									</div>
								</div>
							</div>
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('desImage2') ? ' has-error' : '' }}">
                                    <label for="desImage2" class="col-sm-4 control-label">Current Image</label>
							        <div class="col-sm-8">
                                        <img src="/assets/uploads/images/{{$portfolio->desImage2}}" height="150" width="150"/>
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
