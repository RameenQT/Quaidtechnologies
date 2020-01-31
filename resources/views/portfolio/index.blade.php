@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Portfolio Management 
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Portfolio Management  </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-xs-2" style="padding-left:0px;">
                        <button type="button" class="btn btn-block btn-primary" onclick="location.href='{{ route('portfolio.create') }}'">Add New Portfolio</button>
                        <br>
                    </div>
                    <div class="col-xs-10">&nbsp;</div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="data-grid" class="table table-bordered table-striped">
                        <thead>
                        <tr>
							<th>Id</th>
                           <th>Type</th>
							 <th>Title</th>
                            <th>Tag Line</th>
                            <th>Status</th>
                            <th>Main Image</th>
							<th style="width:100px!important;">Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
							<th>Id</th>
                           <th>Type</th>
							 <th>Title</th>
                            <th>Tag Line</th>
                            <th>Status</th>
                            <th>Main Image</th>
							<th style="width:100px!important;">Actions</th>
                        </tr>
                        </tfoot>
                    </table>
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

@section('datatables_css')
<!-- DataTables -->
<link rel="stylesheet" href="/admin_theme/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('datatables_js')
<!-- DataTables -->
<script src="/admin_theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/admin_theme/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
$(function() {
    $('#data-grid').DataTable({
        processing: true,
        serverSide: true,
		"pageLength": 50,
        order: ["0", "desc"],
        ajax: '{!! route('portfolio.data') !!}',
        columns: [
            { data: 'id', name: 'id' ,visible:false},
			{ data: 'type', name: 'type'},
            { data: 'title', name: 'title'},
            { data: 'tagLine', name: 'tagLine'},
            { data: 'status', name: 'status'},
            { data: 'mianImage', name: 'mianImage'},
            {data: 'action', name: 'action', sortable: false, searchable: false},
       
        ]
    });
});
</script>
@endsection
