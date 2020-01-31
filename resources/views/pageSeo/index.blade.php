@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Page SEO Content
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Page SEO Content  </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="data-grid" class="table table-bordered table-striped">
                        <thead>
                        <tr>
							<th>Id</th>
                            <th>Page</th>
                            <th>Title</th>
                            <th style="width:30px!important;">Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
							<th>Id</th>
                            <th>Page</th>
                            <th>Title</th>
                            <th style="width:30px!important;">Actions</th>
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
        ajax: '{!! route('pageSeo.data') !!}',
        columns: [
            { data: 'id', name: 'id' ,visible:false},
            { data: 'page', name: 'page'},
            { data: 'meta_title', name: 'meta_title'},
           {data: 'action', name: 'action', sortable: false, searchable: false},
       
        ]
    });
});
</script>
@endsection
