@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Blog Management 
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('blog.index') }}">  Blog Management  </a></li>
        <li class="active"> Blog Details</li>
    </ol>
</section>
 <section class="content">

      <div class="row">
        <div class="col-md-9">
		<!-- Profile Image -->
          <div class="box box-primary" style="padding: 20px;">
				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
					  <b>Blog Category</b> <br />{{$blog->categoryName->title}}
					</li>
					<li class="list-group-item">
					  <b>Blog Title</b> <br />{{$blog->title}}
					</li>
					<li class="list-group-item">
					  <b>Blog Status</b> <br />{{$blog->status}}
					</li> 
					<li class="list-group-item">
					  <b>Meta Title</b> <br />{{$blog->meta_title}}
					</li> 
					<li class="list-group-item">
					  <b>Meta Description</b> <br />{{$blog->meta_description}}
					</li> 
					<li class="list-group-item">
					  <b>Focus Keywords</b> <br />{{$blog->focus_keywords}}
					</li> 
					
				</ul>
			</div>
            <!-- /.box-body -->
        </div>
		</div>
		
		<div class="row">
			<div class="col-md-9">
			  <div class="box box-primary collapsed-box">
				<div class="box-header with-border">
				  <h3 class="box-title">Blog Description</h3>

				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
					</button>
				  </div>
				  <!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				{!! nl2br(strip_tags($blog->description)) !!}
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
		</div>	
		<div class="row">
			<div class="col-md-9">
			  <div class="box box-primary collapsed-box">
				<div class="box-header with-border">
				  <h3 class="box-title">Blog Image</h3>

				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
					</button>
				  </div>
				  <!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					
					<image src="/assets/uploads/images/{{$blog->image}}" style="width:600px;"/>
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

