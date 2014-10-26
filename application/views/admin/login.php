<!DOCTYPE html>
<html>
<head>
	<title> Admin Login </title>
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">

	<style type="text/css">
		body {
			padding-top: 20px;
			margin-left: 20px;
		}
	</style>

</head>
<body>
<div class="container">
	<h1>Leiding gedeelte. Login!</h1>
	<?php echo validation_errors(); ?>
    <?php echo form_open('verifylogin'); ?>
      <label for="username">Username:</label>
      <input style="width:25%;" placeholder="Gebruikersnaam" class="form-control"type="text" size="20" id="username" name="username"/>
      <br/>
      <label for="password">Password:</label>
      <input style="width: 25%" placeholder="Wachtwoord" class="form-control" type="password" size="20" id="passowrd" name="password"/>
      <br/>
      <input class="btn btn-default" type="submit" value="Login"/>
    </form>
    	</div>
</body>
</html>