<?php foreach($user as $output): ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <h1> <?php echo $output->username; ?> </h1>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-12 col-lg-12">
                <img title="profile image" class="pull-right img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100">
            </div>
        </div>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3">
               <ul class="list-group">
                   <li class="list-group-item text-muted">Gegevens:</li>
                   <li class="list-group-item text-right">
                       <span class="pull-left">
                           <strong>Laatst ingologd:</strong>
                       </span>
                       <?php foreach($session as $time) ?>
                            <?php echo $time->last_activity; ?>
                       <?php endforeach; ?>
                   </li>
                   <li class="list-group-item text-right">
                       <span class="pull-left">
                           <strong> E-mail: </strong>
                       </span>
                       <?php echo $output->email; ?>
                   </li>
               </ul>
            </div>
            <!-- END sidebar -->

            <!-- Main content -->
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">

            </div>
            <!-- END main content -->
        </div>
    </div>
<?php endforeach; ?>