<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">
				<h3>Wijzig verhuur info</h3>
			</div>

			<form method="POST" action="">
				<label for="Start">Start datum</label>
				<input id="Start" type="text "class="form-control" style="width: 30%" name="" value="" Placeholder="00/00/00">
				<br>

				<label for="Eind">Eind datum:</label>
				<input id="Eind" type="text" class="form-control" style="width: 30%;" name="" value="" placeholder="00/00/00">
				<br>

				<label for="Status">Status: </label>
				<select class="form-control" id="Status" name="" style="width: 30%;">
					<option value="">Bevestigd</option>
					<option value="">Optie</option>
				</select>
				<br>

				<label for="Groep">Groep: </label>
				<input id="Groep" type="text" class="form-control" style="width: 30%;" name="" value="" placeholder="Groep">
				<br>

				<label for="GSM">GSM nummer: </label>
				<input id="GSM" type="text" class="form-control" style="width: 30%;" name="" value="" placeholder="GSM nummer">
				<br>

				<label for="Mail">Mail adres:</label>
				<input id="Mail" type="text" class="form-control" style="width: 30%;" name="" value="" placeholder="Mail adres">
				<br>

				<button type="submit" class="btn btn-success">Wijzig!</button>
				<button type="reset" class="btn btn-danger">Reset</button>
			</form>

		</div>
	</div>
</div>