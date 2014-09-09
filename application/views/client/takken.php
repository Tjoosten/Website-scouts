<div class="container">

  <div class="row">
    <div class="col-md-12">
      <ol class="breadcrumb">
        <li><a href="">Home</a></li>
      </ol>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3 col-sm-3 col-lg-3">
      <div class="panel panel-default">
      	<div class="panel-heading">
      		Takken:
      	</div>
      	<div class="list-group">
      		<a class="list-group-item" href="<?php echo base_url(); ?>takken/Kapoenen/">De Kapoenen</a>
      		<a class="list-group-item" href="<?php echo base_url(); ?>takken/Welpen">De Welpen</a>
      		<a class="list-group-item" href="<?php echo base_url(); ?>takken/JongGivers/">De Jong-givers</a>
      		<a class="list-group-item" href="<?php echo base_url(); ?>takken/Givers/">De Givers</a>
      		<a class="list-group-item" href="<?php echo base_url(); ?>takken/Jins/">De Jins</a>
      		<a class="list-group-item" href="<?php echo base_url(); ?>takken/Leiding/">De Leiding</a>
      	</div>
      </div>
    </div>	

    <div class="col-sm-9 col-md-9 col-lg-9">
      <div class="panel panel-default">
        <div class="panel-body">
        
        <div style="margin-top: -20px;" class="page-header">
          <h2 style="margin-bottom: -5px;">Takken:</h2>
        </div>

        <?php foreach($Kapoenen as $Kapoen): ?>
          <div class="well well-sm">
            <p>Test</p>
          </div>
        <?php endforeach; ?>

        <?php foreach($Welpen as $Welp): ?>
          <div class="well well-sm">
            <p>Test</p>
          </div>
        <?php endforeach; ?>

        <?php foreach($JongGivers as $JongGiver): ?>
          <div class="well well-sm">
          </div>
        <?php endforeach; ?>

        <?php foreach($Givers as $Giver): ?>
          <div class="well well-sm">
          </div>
        <?php endforeach; ?>

        <?php foreach($Jins as $Jin): ?>
          <div class="well well-sm">
          </div>
        <?php endforeach; ?>

        <?php foreach($Leiding as $Output): ?>
          <div style="margin-bottom: 2px;" class="well well-sm">
          
          </div>
        <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</div>