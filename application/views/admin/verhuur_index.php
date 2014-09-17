<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			
			<!-- Nav Tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#Nieuwe" role="tab" data-toggle="tab">Verhuringen</a></li>
  				<li><a href="#Verhuur" role="tab" data-toggle="tab">Verhuring toevoegen </a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div class="active tab-pane" id="Nieuwe">
					<p>
						<table class="table table-condensed">
							<thead>
								<tr>
									<th>#</th>
									<th>Datum:</th>
									<th>Status:</th>
									<th>Groep:</th>
									<th>Mail:</th>
									<th>GSM</th>
									<th></th> <!-- Only used for functions -->
								</tr>
							</thead>
							<tbody>
								<?php foreach($Bevestigd as $Output): ?>
									<tr>
										<td><code>#<?php echo $Output->ID; ?></code></td>
										<td><?php echo $Output->Start_datum; ?> - <?php echo $Output->Eind_datum; ?></td>

										<td>
											<?php if($Output->Status == 0): ?>
												<span class="label label-danger"> Nieuwe aanvraag! </span>
											<?php elseif($Output->Status == 1): ?>
												<span class="label label-warning"> Optie! </span>
											<?php elseif($Output->Status == 2): ?>
												<span class="label label-success"> Bevestigd!</span>
											<?php endif; ?>
										</td>

										<td><?php echo $Output->Groep; ?></td>
										<td><?php echo $Output->Email; ?></td>
										<td><?php echo $Output->GSM; ?></td>

										<td>
											<div class="btn-toolbar" role="toolbar">
													<div class="btn-group">
														<a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/verhuur_info/<?php echo $Output->ID; ?>"><span class="octicon octicon-file-text"></span></a>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/verhuur_edit/<?php echo $Output->ID; ?>"><span class="octicon octicon-pencil"></span></a>
														<a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/Verhuur_delete/<?php echo $Output->ID; ?>"><span class="octicon octicon-trashcan"></span></a>
													</div>

												<div class="btn-group">
													<a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/Change_optie/<?php echo $Output->ID; ?>"><span class="octicon octicon-issue-opened"></span></a>
													<a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Verhuur/Change_bevestigd/<?php echo $Output->ID; ?>"><span class="octicon octicon-issue-closed"></span></a>
												</div>
											</div>
										</td>

									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>	
					</p>
				</div>

  				<div class="tab-pane" id="Verhuur">
  					<p>
					 <form method="POST" action="">
					 	<label for="Start">Start datum:</label>
					 	<input class="form-control" style="width: 30%;" id="Start" name="" placeholder="00/00/00">
					 	<br>

					 	<label for="Eind">Eind datum:</label>
					 	<input class="form-control" style="width: 30%;" id="Eind" name="" placeholder="bv. 00/00/00">
					 	<br>
					 	
					 	<label for="Groep">Groep:</label>
					 	<input class="form-control" style="width: 30%;" id="Groep" name="" placeholder="Groep">
					 	<br>
					 
					 	<label for="GSM">Gsm-nummer:</label>
					 	<input class="form-control" style="width: 30%;" id="GSM" placeholder="GSM nummer">
					 	<br>

					 	<label for="Mail">Email:</label>
					 	<input class="form-control" style="width: 30%;" id="Mail" placeholder="E-mail adres">
					 	<br>

					 	<button type="submite" class="btn btn-success">Toevoegen</button>
					 	<button type="reset" class="btn btn-danger">Reset!</button>
					 </form>  						
  					</p>
  				</div>
  			</div>

		</div>
	</div>
</div>