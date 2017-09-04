<section id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2>Games</h2>
        <hr class="star-primary">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 portfolio-item">
        <?php
        if(!isset($_SESSION['login_user'])){
          echo '<a onclick="return checkLogin();" class="portfolio-link" data-toggle="modal">';
        }
        else{
          echo '<a href="games/javascript-racer/index.php" class="portfolio-link" data-toggle="modal">';
        }
        ?>
        <div class="caption">
          <div class="caption-content">
            <i class="fa fa-search-plus fa-3x"></i>
          </div>
        </div>
        <img src="img/games/Outrun.png" class="img-responsive" alt="">
      </a>
    </div>
    <div class="col-sm-4 portfolio-item">
      <?php
      if(!isset($_SESSION['login_user'])){
        echo '<a onclick="return checkLogin();" class="portfolio-link" data-toggle="modal">';
      }
      else{
        echo '<a href="games/javascript-pong-master/index.php" class="portfolio-link" data-toggle="modal">';
      }
      ?>
      <div class="caption">
        <div class="caption-content">
          <i class="fa fa-search-plus fa-3x"></i>
        </div>
      </div>
      <img src="img/games/Pong.png" class="img-responsive" alt="">
    </a>
  </div>
  <div class="col-sm-4 portfolio-item">
    <?php
    if(!isset($_SESSION['login_user'])){
      echo '<a onclick="return checkLogin();" class="portfolio-link" data-toggle="modal">';
    }
    else{
      echo '<a href="games/javascript-breakout-master/index.php" class="portfolio-link" data-toggle="modal">';
    }
    ?>
    <div class="caption">
      <div class="caption-content">
        <i class="fa fa-search-plus fa-3x"></i>
      </div>
    </div>
    <img src="img/games/Breakout.png" class="img-responsive" alt="">
  </a>
</div>
</div>
</section>
