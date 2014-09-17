      <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Sint-Joris</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li> <a href="<?php echo base_url(); ?>backend"> <span class="fa fa-leaf Icon-color"></span> Takken </a> </li>
              <li> <a href="<?php echo base_url(); ?>verhuur/admin_verhuur"> <span class="fa fa-home Icon-color"></span> Verhuur </a> </li>
              <li> <a href=""><span class="octicon octicon-book Icon-color"></span> Activiteiten </a></li>
              <li> <a href=""><span class="fa fa-camera-retro Icon-color"></span> Foto's</a> </li>
              <li> <a href=""><span class="fa fa-info-circle Icon-color"></span> Info </a> </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <?php if($Role == 1): ?>
                <li><a href="<?php echo base_url(); ?>leiding/"><span class="octicon octicon-organization Icon-color"></span></a></li>
              <?php endif; ?>
              <li><a href="<?php echo base_url(); ?>backend/Logout"><span class="octicon octicon-sign-out Icon-color"></span></a></li>
            </ul>
          </div>
        </div>
      </div>