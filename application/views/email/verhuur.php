<!DOCTYPE html>
<html lang="nl">
	<head>
		<title> Verhuur notification </title>
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<h4> Notificatie: nieuwe verhuring </h4>
			
			<table class="table table-condensed table-bordered">
				<tbody>
					<tr>
						<td> <strong> Start Datum: </strong> </td>
						<td> <?php echo $Start; ?>
					</tr>
					<tr>
						<td> <strong> Eind Datum: </strong> </td>
						<td> <?php echo $Start; ?>
					</tr>
					<tr>
						<td> <strong> Groep: </strong> </td>
						<td> <?php echo $Groep; ?>
					</tr>
					<tr>
						<td> <strong> GSM nummer: </strong> </td>
						<td> <?php echo $GSM; ?>
					</tr>
					<tr>
						<td> <strong> Email: </strong> </td>
						<td> <?php echo $Mail; ?>
					</tr>
				</tbody>
			</table>
			
			<hr>
			<p class="small text-muted">
				Deze mail notificatie is afkomstig van <a href="http://www.st-joris-turnhout.be">www.st-joris-turnhout.be</a> <br>
				Generation time: <?php echo $exec; ?>
			</p>
		</div>
	</body>
</html>