@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Photo Gallery 
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('photogallery.index') }}">Photo Gallery </a></li>
        <li class="active">Photo Details</li>
    </ol>
</section>
 <section class="content">

      <div class="row">
        <div class="col-md-9">
		<!-- Profile Image -->
          <div class="box box-primary" style="padding: 20px;">
				<ul class="list-group list-group-unbordered">
					
					<li class="list-group-item">
					  <b>Story</b> <br />{!! nl2br(strip_tags($photogallery->story)) !!} 
					</li> 
					<li class="list-group-item">
					  <b>Type</b> <br />{{ $photogallery->type }} 
					</li> 
					
					
				</ul>
			</div>
            <!-- /.box-body -->
        </div>
		</div>
		
			@if($photogallery->photo)
		<div class="row">
			<div class="col-md-9">
			  <div class="box box-primary collapsed-box">
				<div class="box-header with-border">
				  <h3 class="box-title">Image</h3>

				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
					</button>
				  </div>
				  <!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<image src="/assets/uploads/images/{{$photogallery->photo}}" style="width:600px;"/>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
		</div>
		@endif
		
     </div>
      <!-- /.row -->

    </section>

@endsection

