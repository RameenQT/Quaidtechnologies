@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                
				<span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="authors">Total Authors</a></span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                
				<span class="info-box-icon bg-red"><i class="fa fa-book"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><a href="articles">Total Articles</a></span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-picture-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="news_letters">Total News Letters</a></span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        
        <!-- /.col -->
    </div>
	<div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                
				<span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="sitemembers">Total Members</a></span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
		 <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                
				<span class="info-box-icon bg-red"><i class="fa fa-book"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><a href="proceedings">Total Proceedings</a></span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
		<div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-picture-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="invitations">Total Invitations</a></span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
	</div>
</section>
<!-- /.content -->
@endsection

@section('page_css')
<!-- Morris chart -->
<link rel="stylesheet" href="/admin_theme/plugins/morris/morris.css">
@endsection

@section('page_js')
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/admin_theme/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/admin_theme/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="/admin_theme/plugins/knob/jquery.knob.js"></script>


@endsection
