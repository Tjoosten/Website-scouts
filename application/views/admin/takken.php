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
  							<input style="width:35%;" class="form-control" id="Title" name="Title" value="<?php echo $Kapoen->Title; ?>" placeholder="Titel">
  							<br>

  							<label for="Sub">Sub Heading:</label>
  							<input style="width: 35%;" class="form-control" id="Sub" name="Sub_title" value="<?php echo $Kapoen->Sub_title; ?>" placeholder="Sub titel">
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

 			<div class="tab-pane" id="Welpen">
 			  <?php foreach($Welpen as $Welp): ?>
          <p>
            <form method="POST" action="">
              <label for="Title">Heading:</label>
              <input style="width: 35%;" class="form-control" id="Title" name="Title" value="<?php echo $Welp->Title; ?>" placeholder="Titel">
              <br>

              <label for="Sub">Sub heading:</label>
              <input style="width: 35%;" class="form-control" id="Sub" name="Sub" value="<?php echo $Welp->Sub_title; ?>" placeholder="Sub titel">
              <br>

              <label for="beschrijving">Beschrijving</label>
              <textarea rows="10" id="beschrijving" style="width: 55%;" class="form-control"></textarea>
              <br>

              <button class="btn btn-danger" type="submit">Wijzig!</button>
              <button class="btn btn-danger" type="reset">Reset!</button>
            </form>
          </p>
 			  <?php endforeach; ?>
 			</div>
 			
  		<div class="tab-pane" id="JongGivers">
  		  <?php foreach($JongGivers as $JongGiver): ?>
          <p>
            <form method="POST" action="">
              <label for="Title"> Heading: </label>
              <input style="width: 35%;" class="form-control" id="Title" name="Title" value="<?php echo $JongGiver->Title; ?>" placeholder="Titel">
              <br>

              <label for="Sub">Sub Heading:</label>
              <input style="width: 35%" class="form-control" id="Sub" name="Sub_title" value="<?php echo $JongGiver->Sub_title; ?>" placeholder="Sub title">
              <br>

              <label for="beschrijving">Beschrijving:</label>
              <textarea rows="10" id="beschrijving" style="width: 55%;" class="form-control" name=""></textarea>
              <br>

              <button class="btn btn-danger" type="submit">Wijzig!</button>
              <button class="btn btn-danger" type="reset">Reset!</button>
            </form>
          </p>
  		  <?php endforeach; ?>
  		</div>
  		
  		<div class="tab-pane" id="Givers">
  		  <?php foreach($Givers as $Giver): ?>
          <p>
            <form method="POST" action="">
              <label for="title">Heiding:</label>
              <input style="width: 35%;" class="form-control" id="title" name="Title" value="<?php echo $Giver->Title; ?>" placeholder="Titel">
              <br>

              <label for="Sub">Sub heading: </label>
              <input style="width:35%;" class="form-control" id="Sub" name="Sub_title" value="<?php echo $Giver->Sub_title; ?>" placeholder="Sub title">
              <br>

              <label for="beschrijving">Beschrijving:</label>
              <textarea rows="10" id="beschrijving" style="width: 55%;" class="form-control" name=""></textarea>
              <br>

              <button class="btn btn-danger" type="submit">Wijzig!</button>
              <button class="btn btn-danger" type="reset">Reset!</button>
            </form>
          </p>
  		  <?php endforeach; ?>
  		</div>
  		
  		<div class="tab-pane" id="Jins">
  		  <?php foreach($Jins as $jin): ?>
          <p>
            <form method="POST" action="">
              <label for="title">Headin:</label>
              <input style="width: 35%;" class="form-control" id="title" name="Title" value="<?php echo $jin->Title; ?>" placeholder="Titel">
              <br>

               <label for="Sub">Sub heading: </label>
              <input style="width:35%;" class="form-control" id="Sub" name="Sub_title" value="<?php echo $jin->Sub_title; ?>" placeholder="Sub title">
              <br>

              <label for="beschrijving">Beschrijving:</label>
              <textarea rows="10" id="beschrijving" style="width: 55%;" class="form-control" name=""></textarea>
              <br>

              <button class="btn btn-danger" type="submit">Wijzig!</button>
              <button class="btn btn-danger" type="reset">Reset!</button>
            </form>
          </p>
  		  <?php endforeach; ?>
  		</div>
  		
  		<div class="tab-pane" id="Leiding">
  		  <?php foreach($Leiding as $Output): ?>
          <p>
            <form method="POST" action="">
              <label for="title">Headin:</label>
              <input style="width: 35%;" class="form-control" id="title" name="Title" value="<?php echo $Output->Title; ?>" placeholder="Titel">
              <br>

               <label for="Sub">Sub heading: </label>
              <input style="width:35%;" class="form-control" id="Sub" name="Sub_title" value="<?php echo $Output->Sub_title; ?>" placeholder="Sub title">
              <br>

              <label for="beschrijving">Beschrijving:</label>
              <textarea rows="10" id="beschrijving" style="width: 55%;" class="form-control" name=""></textarea>
              <br>

              <button class="btn btn-danger" type="submit">Wijzig!</button>
              <button class="btn btn-danger" type="reset">Reset!</button>
            </form>
          </p>
  		  <?php endforeach; ?>
  		</div>
		</div>

		</div>
</div>
