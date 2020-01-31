@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        General Settings
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> General Settings  </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-xs-2" style="padding-left:0px;">
                        
						<a href="generalsettings/{{$generalsettings->id}}/edit" class="btn btn-block btn-primary">Edit General Settings</a>
                        <br>
                    </div>
                    <div class="col-xs-10">&nbsp;</div>
                </div>
                <!-- /.box-header -->
				<div class="row">
					<div class="col-md-6">
						<div class="box box-info box-solid">
						<div class="box-header with-border">
						  <h3 class="box-title">General Settings</h3>

						  <div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						  </div>
						  <!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							  <ul class="list-group list-group-unbordered">
									<li class="list-group-item">
									  <b>Email</b> <br />{{$generalsettings->email}}
									</li>
									<li class="list-group-item">
									  <b>Phone</b> <br />{{$generalsettings->phone}}
									</li> 
									
									 
									
									
								</ul>
						</div>
						<!-- /.box-body -->
					</div>
					</div>
					<div class="col-md-6">
						<div class="box box-info box-solid">
						<div class="box-header with-border">
						  <h3 class="box-title">Social Links</h3>

						  <div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						  </div>
						  <!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							  <ul class="list-group list-group-unbordered">
									<li class="list-group-item">
									  <b>Facebook</b> <br /><a href="{{$generalsettings->facebook}}" target="parent">{{$generalsettings->facebook}}</a>
									</li>
									<li class="list-group-item">
									  <b>Twitter</b> <br /><a href="{{$generalsettings->twitter}}" target="parent">{{$generalsettings->twitter}}</a>
									</li> 
									<li class="list-group-item">
									  <b>Instagram</b> <br /><a href="{{$generalsettings->linkdin}}" target="parent">{{$generalsettings->linkdin}}</a>
									</li> 
									<li class="list-group-item">
									  <b>Google Plus</b> <br /><a href="{{$generalsettings->google}}" target="parent">{{$generalsettings->google}}</a>
									</li> 
									<li class="list-group-item">
									  <b>Linkedin</b> <br /><a href="{{$generalsettings->google}}" target="parent">{{$generalsettings->linkedin}}</a>
									</li> 
									
								
								</ul>
						</div>
						<!-- /.box-body -->
					</div>
					</div>
				</div>
                <div class="row">
					<div class="col-md-12">
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
							   <ul class="list-group list-group-unbordered">
									<li class="list-group-item">
									 <b>Meta Title</b> <br />{!! nl2br(strip_tags($generalsettings->meta_title)) !!}
									</li>
									<li class="list-group-item">
									  <b>Meta Description</b>  <br />{!! nl2br(strip_tags($generalsettings->meta_description)) !!}
									</li> 
									
									<li class="list-group-item">
									  <b>Meta Keywords</b> <br />{!! nl2br(strip_tags($generalsettings->focus_keywords)) !!}
									</li> 
								</ul>
						</div>
						<!-- /.box-body -->
					</div>
					</div>
					
					
				</div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

@endsection
