<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
  			<li class="active"><a href="#Kapoenen" role="tab" data-toggle="tab">De kapoenen</a></li>
  			<li><a href="#Welpen" role="tab" data-toggle="tab">De Welpen</a></li>
  			<li><a href="#JongGivers" role="tab" data-toggle="tab">De Jong-givers</a></li>
  			<li><a href="#Givers" role="tab" data-toggle="tab">De Givers</a></li>
  			<li><a href="#Jins" role="tab" data-toggle="tab">De Jins</a></li>
  			<li><a href="#Leiding" role="tab" data-toggle="tab">De Leiding</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
  			<div class="tab-pane active" id="Kapoenen">
  				<p>
  					<?php foreach($Kapoenen as $Kapoen): ?>
  						<form method="POST" action="">
  							<label for="Title"> Heading: </label>
  							<input style="width:35%;" class="form-control" id="Title" name="Title" value="" placeholder="Titel">
  							<br>

  							<label for="Sub">Sub Heading:</label>
  							<input style="width: 35%;" class="form-control" id="Sub" name="Sub_title" placeholder="">
  							<br>

  							<label for="beschrijving">Beschrijving:</label>
  							<textarea rows="10" id="beschrijving" style="width: 55%; "class="form-control"></textarea>
  							<br>
  					 <?php endforeach; ?>

  					<button class="btn btn-danger" type="submit">Wijzig!</button>
  					<button class="btn btn-danger" type="reset">Reset!</button>

          </form>
        </p>	
      </div>

 			<div class="tab-pane" id="Welpen"></div>
 			
  		<div class="tab-pane" id="JongGivers"></div>
  		
  		<div class="tab-pane" id="Givers"></div>
  		
  		<div class="tab-pane" id="Jins"></div>
  		
  		<div class="tab-pane" id="Leiding"></div>
		</div>

		</div>
	</div>
</div>
