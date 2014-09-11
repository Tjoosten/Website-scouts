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
      		  				<th>Tak:<th>
      		  				<th></th> <!-- Functies -->
        		  		</tr>
        		  	</thead>
        		  	<tbody>
        		  		<?php foreach(): ?>
        		  			<tr>
        		  				<td><code><?php echo ?></code></td>
        		  				<td><?php echo ?></td>
        		  				<td><?php echo ?></td>
        		  				<td><?php echo ?></td>
        		  				<td><?php echo ?></td>
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
