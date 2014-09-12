<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#admin" role="tab" data-toggle="tab">Admin's</a></li>
        <li><a href="#leiding" role="tab" data-toggle="tab">Leiding</a></li>
        <li><a href="#new" role="tab" data-toggle="tab">Nieuwe Admin / Leiding</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
        <div class="tab-pane active" id="admin">
        	<div class="col-sm-8 col-md-8 col-lg-8">
        		<p>
        		  <table class="table table-condensed">
        		  	<thead>
        		  		<tr>
      		  				<th>#</th>
      		  				<th>Naam:</th>
      		  				<th>Mail:</th>
      		  				<th>GSM:<th>
      		  				<th></th> <!-- Functies -->
        		  		</tr>
        		  	</thead>
        		  	<tbody>
        		  		<?php foreach($Administrators as $Admin): ?>
        		  			<tr>
        		  				<td><code>#<?php echo $Admin->id; ?></code></td>
        		  				<td><?php echo $Admin->username; ?></td>
        		  				<td><?php echo $Admon->Mail; ?></td>
        		  				<td><?php echo $Admin->GSM; ?></td>
        		  				<td>
        		  				  <div class="btn-group">
        		  				  </div>
        		  				</td>
        		  			</tr>
        		  		<?php endforeach; ?>
        		  	</tbody>
        		  </table>
        		</p>
        	</div>
        </div>
        
        <div class="tab-pane" id="leiding">
        </div>
        
        <div class="tab-pane" id="new">
        </div>
			</div>

		</div>
	</div>
</div>
