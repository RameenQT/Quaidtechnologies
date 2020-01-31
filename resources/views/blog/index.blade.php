@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Blog Management 
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Blog Management  </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-xs-2" style="padding-left:0px;">
                        <button type="button" class="btn btn-block btn-primary" onclick="location.href='{{ route('blog.create') }}'">Add New Blog</button>
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
                            <th>Title</th>
                            <th>Blog Category</th>
                            <th>Status</th>
							<th style="width:130px!important;">Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
							<th>Id</th>
                            <th>Title</th>
							<th>Blog Category</th>
                            <th>Status</th>
							<th style="width:130px!important;">Actions</th>
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
        ajax: '{!! route('blog.data') !!}',
        columns: [
            { data: 'id', name: 'id' ,visible:false},
            { data: 'title', name: 'title'},
            { data: 'CatName', name: 'CatName'},
            { data: 'status', name: 'status'},
            {data: 'action', name: 'action', sortable: false, searchable: false},
       
        ]
    });
});
</script>
@endsection
