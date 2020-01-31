@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<style>
.error
{
	color:#dd4b39;
}
.errorfeild
{
	border-color: #dd4b39
}
</style>
		

<section class="content-header">
    <h1>
        &nbsp;
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                
                 

                    <div class="box-body">
                        <div class="form-group">
                            <label for="old_password" class="col-sm-2 control-label">Old Password</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Old Password" id="old_password" name="old_password" oninput="removemessagesoldpassword()">
                                <div class="help-block error" id="chngepasswordresponce" style="display:none;">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								</div>
                                    <span class="help-block error">
										<strong id="old_password_error"></strong>
										
									</span>
                                
                            </div>
                        </div>
                    </div>
					<div class="box-body">
                        <div class="form-group">
                            <label for="new_password" class="col-sm-2 control-label">New Password</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="New Password" id="new_password" name="new_password" oninput="removemessagesnewpassword()">
                                
                                    <span class="help-block error">
										<strong id="new_password_error"></strong>
										<strong id="length_password_error"></strong>
									</span>
                                
                            </div>
                        </div>
                    </div>
					<div class="box-body">
                        <div class="form-group">
                            <label for="conform_password" class="col-sm-2 control-label">Confirm Password</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Confirm Password" id="conform_password" name="conform_password" 
								oninput="removemessagechangepassword()">
                                
                                    <span class="help-block error">
										<strong id="conform_password_error"></strong>
										<strong id="match_password_error"></strong>
									</span>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="button" class="btn btn-default" onclick="location.href='{{route('home') }}'">Cancel</button>
                        <button type="button" class="btn btn-info pull-right" onclick="submitForm();">Change Password</button>
                    </div>
                    <!-- /.box-footer -->
                
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<script>
function submitForm()
{
	var old_password = document.getElementById("old_password").value;
	var new_password = document.getElementById("new_password").value;
	var conform_password = document.getElementById("conform_password").value;
	if (old_password==null || old_password=="")
	{  
		var old_password_msg = 'Please Enter Old Password';
		$("#old_password_error").html(old_password_msg);
		document.getElementById("old_password").className = "form-control errorfeild";		
	}
	else if (new_password==null || new_password=="")
	{  
		$("#length_password_error").empty();
		var new_password_msg = 'Please Enter New Password!';
		$("#new_password_error").html(new_password_msg);
		document.getElementById("new_password").className = "form-control errorfeild";		
	}
	else if (conform_password==null || conform_password=="")
	{  
		$("#match_password_error").empty();
		var conform_password_msg = 'Please Enter Confirm Password!';
		$("#conform_password_error").html(conform_password_msg);
		document.getElementById("conform_password").className = "form-control errorfeild";	
		
	}
	else if (new_password != conform_password)
	{  
		$("#conform_password_error").empty();
		var match_password_msg = 'Confirm Password NOt Match!!';
		$("#match_password_error").html(match_password_msg);
		document.getElementById("conform_password").className = "form-control errorfeild";		
	}
	else if(new_password.length<8){  
	 
		$("#new_password_error").empty();
		var length_password_msg = 'Password must be at least 8 characters long.';
		$("#length_password_error").html(length_password_msg);
		document.getElementById("new_password").className = "form-control errorfeild";	
	
  }else 
  {
	   var formData = old_password+'qat'+new_password+'qat'+conform_password;
	   var write_url = '/webmaster/changePasswordstore/'+formData;
		$.ajax({
        method: "GET",
        url: write_url,
		data: formData,
		contentType: false,
        processData: false,
        beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));},
        success: function(response) {
			$("#chngepasswordresponce").show();  
			$("#chngepasswordresponce").show();  
			$("#chngepasswordresponce").html(response);  
		 },
        
    });
  }
  
  
 
}
//Ajex Request
	
function removemessagesoldpassword()
{
	$("#old_password_error").empty();
	$("#chngepasswordresponce").empty();
	document.getElementById("old_password").className = "form-control";		
}
function removemessagesnewpassword()
{
	$("#new_password_error").empty();
	$("#length_password_error").empty();
	document.getElementById("conform_password").className = "form-control";	
}
function removemessagechangepassword()
{
	$("#conform_password_error").empty();
	$("#match_password_error").empty();
	document.getElementById("conform_password").className = "form-control";	
}
</script>
<!-- /.content -->
@endsection
