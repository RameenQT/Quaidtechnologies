@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Portfolio Management 
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('portfolio.index') }}">  Portfolio Management  </a></li>
        <li class="active"> Portfolio Details</li>
    </ol>
</section>
 <section class="content">

     <div class="row">
        <div class="col-md-12 text-center">
			<h1>{{$portfolio->title}}</h1><h4>{{$portfolio->tagLine}}</h4>
        </div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
				<table class="table table-striped" style="text-align: left;">
					<tbody>
						<tr>
						  <td><b>Category</b></td>
						  <td>{{$portfolio->category}}</td>
						  <td><b>Languages</b></td>
						  <td>{{$portfolio->languages}}</td>
						</tr>
						<tr>
						  <td><b>Compatibility</b></td>
						  <td>{{$portfolio->compatibility}}</td>
						  <td><b>AgeRating</b></td>
						  <td>{{$portfolio->ageRating}}</td>
						</tr>
						<tr>
						  <td><b>Seller </b></td>
						  <td>{{$portfolio->seller}}</td>
						  <td><b>Copyright</b></td>
						  <td>{{$portfolio->copyright}}</td>
						</tr>
						<tr>
						  <td><b>size </b></td>
						  <td>{{$portfolio->size}}</td>
						  <td><b>Price</b></td>
						  <td>{{$portfolio->price}}</td>
						</tr>
					</tbody>
				</table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
		  <div class="box box-primary collapsed-box">
			<div class="box-header with-border">
			  <h3 class="box-title">About {{$portfolio->title}}</h3>

			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
				</button>
			  </div>
			  <!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body" >
				{{$portfolio->description}}
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
		<div class="col-md-6">
		  <div class="box box-primary collapsed-box">
			<div class="box-header with-border">
			  <h3 class="box-title">Client Words</h3>

			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
				</button>
			  </div>
			  <!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body" >
				<h4>{{$portfolio->clientName}}</h4>
				"{{$portfolio->clientWords}}"
				<br /><br />
				<video controls  width="500" height="240">
				  <source src="/assets/uploads/images/{{$portfolio->clientVideo}}" type="video/mp4">
				Your browser does not support the video tag.
				</video>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
	</div>
	<div class="row">
			<div class="col-md-12">
			  <div class="box box-primary collapsed-box">
				<div class="box-header with-border">
				  <h3 class="box-title">Portfolio Gallery Images</h3>

				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
					</button>
				  </div>
				  <!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<?php
						//Columns must be a factor of 12 (1,2,3,4,6,12)
						$numOfCols = 4;
						$rowCount = 0;
						$bootstrapColWidth = 12 / $numOfCols;
					?>
					<div class="row">
						@foreach($portfolioGallery as $image)
							<div class="col-sm-3">
								<img src="/assets/uploads/images/{{$image->image}}" style="width:150px;height:200px;"/>
								<br /><br />
								<a onclick="return confirm('Are you sure you want to delete this?')" href="deleteImage/{{$image->id}}/{{$portfolio->id}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
							</div>
					<?php
						$rowCount++;
						if($rowCount % $numOfCols == 0) echo '</div><div  class="row" style="margin-top:50px;" >';
					?>
						@endforeach
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
		</div>

	
		
     </div>
      <!-- /.row -->

    </section>

@endsection

