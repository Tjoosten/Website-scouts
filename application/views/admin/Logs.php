<div class="container">
  <div class="row">
    <div class="col-xs-9 col-sm-9 col-md-9 col-md-9">
      <?php if(count($Logs) == 0): ?>
        <div class="alert alert-danger">
          <p> Er zijn geen logs in het systeem. </p>
        </div>
      <?php else: ?>
        <div style="margin-bottom: 15px;" class="pull-left">
          <form class="form-inline" method="POST" action="<?php echo base_url(). 'Logs/Search'; ?>" autocomplete="off">
            <input class="form-control" name="Term" placeholder="Zoek logs (Persoon)" />
            <button type="submit" class="btn btn-success"> <span class="fa fa-search"></span> </button>
          </form>
        </div>
        <table class="table table-hover table-condensed">
          <thead>
            <tr>
              <th> Datum: </th>
              <th> Persoon: </th>
              <th> Bericht: </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($Logs as $Log): ?>
              <tr>
                <td> <code> [<?php echo $Log->Date ?> - <?php echo $Log->Time; ?>] </code></td>
                <td> <?php echo $Log->User; ?> </td>
                <td> <?php echo $Log->Message; ?> </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </div>
</div>
