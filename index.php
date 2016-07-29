
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/apiCaller.js"></script>

</head>
<div id="form1">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="apiCall">Api Call address</label>
				<input type="text" class="form-control" id="apiCall" placeholder="Enter Api Call">
				<small id="apiHelp" class="form-text text-muted">Enter the api number you want to call</small>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="p1">Parameter 1</label>
				<input type="text" class="form-control" id="p1" placeholder="Enter first Parameter">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="p2">Parameter 2</label>
				<input type="text" class="form-control" id="p2" placeholder="Enter second Parameter">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="p3">Parameter 3</label>
				<input type="text" class="form-control" id="p3" placeholder="Enter third Parameter">
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-12" align="right">
			<button class="btn btn-primary" id="btnSend">Submit</button>
		</div>
	</div>

	<div class="panel">
		<div class="row">
			<div class="col-md-12">		
				<div id="output">Output here</div>
			</div>
		</div>
	</div>


	<div class="well">	
		<div class="row">
		<div class="col-md-3">	

				<div>Call Number 100</div>
			</div>
			<div class="col-md-4">	

				<div>Parameters none</div>
			</div>
			<div class="col-md-4">	

				<div>Gets the Php session user code</div>
			</div>
		</div>
</div>
<div class="well">	
		<div class="row">
		<div class="col-md-3">	

				<div>Call Number 101</div>
			</div>
			<div class="col-md-4">	

				<div>Parameters:<ol><li>user name</li><li>email</li><li>password</li></ol></div>
			</div>
			<div class="col-md-4">	

				<div>signs up a user</div>
			</div>
		</div>
	</div>
<div class="well">	
<div class="row">
		<div class="col-md-3">	

				<div>Call Number 102</div>
			</div>
			<div class="col-md-4">	

				<div>Parameters:<ol><li>email</li><li>password</li></ol></div>
			</div>
			<div class="col-md-4">	

				<div>logs in a user</div>
			</div>
		</div>
	</div>
	<div class="well">	
<div class="row">
		<div class="col-md-3">	

				<div>Call Number 103</div>
			</div>
			<div class="col-md-4">	

				<div>Parameters:<ol><li>email</li></ol></div>
			</div>
			<div class="col-md-4">	

				<div>resets the user password</div>
			</div>
		</div>
	</div>


<div class="well">	
<div class="row">
		<div class="col-md-3">	

				<div>Call Number 104</div>
			</div>
			<div class="col-md-4">	

				<div>Parameters:<ol><li>user session</li><li>old password</li><li>new password</li></ol></div>
			</div>
			<div class="col-md-4">	

				<div>resets the user password</div>
			</div>
		</div>
	</div>


</div>
</div>
</div>
