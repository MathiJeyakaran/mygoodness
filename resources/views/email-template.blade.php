<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<title>Email</title>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card yellowbg">
					<h2>Hey Admin!</h2> <br>
					You received an email from : {{ $name }} <br><br>
					User details: <br><br> 
					Name :  {{ $name }}<br> 
					Email :  {{ $email }}<br>
					Subject :  {{ $subject }}<br><br>
					
					Thanks 
				</div>
			</div>
		</div>
	</div>	
</body>
</html>
