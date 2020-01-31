@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Services Management 
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('services.index') }}">  Services Management  </a></li>
        <li class="active"> Service Details</li>
    </ol>
</section>
 <section class="content">

      <div class="row">
        <div class="col-md-9">
		<!-- Profile Image -->
          <div class="box box-primary" style="padding: 20px;">
				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
					  <b>Service Title</b> <br />{{$service->title}}
					</li>
					<li class="list-group-item">
					  <b>Service Status</b> <br />{{$service->status}}
					</li> 
					<li class="list-group-item">
					  <b>Meta Title</b> <br />{{$service->meta_title}}
					</li> 
					<li class="list-group-item">
					  <b>Meta Description</b> <br />{{$service->meta_description}}
					</li> 
					<li class="list-group-item">
					  <b>Focus Keywords</b> <br />{{$service->focus_keywords}}
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
				  <h3 class="box-title">Service Description</h3>

				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
					</button>
				  </div>
				  <!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				{!! nl2br(strip_tags($service->description)) !!}
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
				  <h3 class="box-title">Service Image</h3>

				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
					</button>
				  </div>
				  <!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					
					<image src="/assets/uploads/images/{{$service->image}}" style="width:600px;"/>
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
@section('datatables_css')
<!-- DataTables -->
<link rel="stylesheet" href="/admin_theme/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('datatables_js')
<!-- DataTables -->
<script src="/admin_theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/admin_theme/plugins/datatables/dataTables.bootstrap.min.js"></script>

@endsection
