<?php include 'mysql_connect.php';?>

<html>
<!-- Head -->
<head>
  <?php include 'head.php'; ?>
  <style>

  h1{
    font-size: 30px;
    color: black;
    text-transform: uppercase;
    font-weight: 300;
    text-align: center;
    margin-bottom: 15px;
  }
  table{
    width:100%;
    table-layout: fixed;
  }
  .tbl-header{
    background-color: #2C3E50;
  }
  .tbl-content{
    height:300px;
    overflow-x:auto;
    margin-top: 0px;
    border: 1px solid rgba(255,255,255,0.3);
  }
  th{
    padding: 20px 15px;
    text-align: left;
    font-weight: 500;
    font-size: 12px;
    color: #fff;
    text-transform: uppercase;
  }
  td{
    padding: 15px;
    text-align: left;
    vertical-align:middle;
    font-weight: 300;
    font-size: 12px;
    color: black;
    border-bottom: solid 1px rgba(255,255,255,0.1);
  }


  /* demo styles */

  @import url(http://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
  body{
    background: white;
    font-family: 'Roboto', sans-serif;
  }
  section{

  }


  /* follow me template */
  .made-with-love {
    margin-top: 40px;
    padding: 10px;
    clear: left;
    text-align: center;
    font-size: 10px;
    font-family: arial;
    color: #fff;
  }
  .made-with-love i {
    font-style: normal;
    color: #F50057;
    font-size: 14px;
    position: relative;
    top: 2px;
  }
  .made-with-love a {
    color: #fff;
    text-decoration: none;
  }
  .made-with-love a:hover {
    text-decoration: underline;
  }


  /* for custom scrollbar for webkit browser*/

  ::-webkit-scrollbar {
    width: 6px;
  }
  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  }
  ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  }
  </style>
</head>

<body id="page-top" class="index">

  <!-- Navigation -->
  <?php include 'nav.php'; ?>


  <div class="container">
    <section>
      <!--for demo wrap-->

      <div class="text-center">
        <h2>Record</h2>
        <hr class="star-primary">
      </div>
      <form action="clearrecord.php" method="GET">
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sort By Game
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="record.php?sort=All">All Games</a></li>
              <li><a href="record.php?sort=Outrun">Outrun</a></li>
              <li><a href="record.php?sort=Pong">Pong</a></li>
              <li><a href="record.php?sort=Breakout">Breakout</a></li>
            </ul>
            <input type="hidden" name=<?php if(isset($_GET['sort'])){
              if ($_GET['sort'] == 'All'){ echo 'All';}
              else if ($_GET['sort'] == 'Outrun'){ echo 'Outrun';}
                else if ($_GET['sort'] == 'Pong'){ echo 'Pong';}
                  else if ($_GET['sort'] == 'Breakout'){ echo 'Breakout';}
                }
                else{
                  echo 'All';
                }?>
                value=<?php if(isset($_GET['sort'])){
                  if ($_GET['sort'] == 'All'){ echo 'All';}
                  else if ($_GET['sort'] == 'Outrun'){ echo 'Outrun';}
                    else if ($_GET['sort'] == 'Pong'){ echo 'Pong';}
                      else if ($_GET['sort'] == 'Breakout'){ echo 'Breakout';}
                    }
                    else{
                      echo 'All';
                    }
                ?>>
          <input type="submit" value="Clear Record" class="btn btn-primary">
          </div>
        </form>
        <div class="tbl-header">
          <table cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>Player</th>
                <th>Game</th>
                <th>Date</th>
                <th>Record</th>
                <th>Value</th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="tbl-content">
          <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
              <?php
              if(isset($_GET['sort'])){
              if ($_GET['sort'] == 'All'){
                  $sql = "SELECT * FROM gamerecord WHERE profileName ='".$_SESSION['login_user']."' ORDER BY date";
                }
              else if ($_GET['sort'] == 'Outrun'){
                $sql = "SELECT * FROM gamerecord WHERE gameName = 'Outrun' AND profileName ='".$_SESSION['login_user']."' ORDER BY date";
              }
              else if ($_GET['sort'] == 'Pong'){
                $sql = "SELECT * FROM gamerecord WHERE gameName = 'Pong' AND profileName ='".$_SESSION['login_user']."' ORDER BY date";
              }
              else if ($_GET['sort'] == 'Breakout'){
                $sql = "SELECT * FROM gamerecord WHERE gameName = 'Breakout' AND profileName ='".$_SESSION['login_user']."' ORDER BY date";
              }
              }
              else {
                $sql = "SELECT * FROM gamerecord WHERE profileName ='".$_SESSION['login_user']."' ORDER BY date";
              }
              $result = mysql_query($sql);
              while($row = mysql_fetch_array($result)){
                echo '<tr>';
                echo '<td>'.$row["profileName"].'</td>';
                echo '<td>'.$row["gameName"].'</td>';
                echo '<td>'.$row["date"].'</td>';
                echo '<td>'.$row["record"].'</td>';
                echo '<td>'.$row["value"].'</td>';
                echo '</tr>';
              }
              ?>

            </tbody>
          </table>
        </div>
      </section>
    </div>



    <!-- Footer -->
    <footer class="text-center">
      <?php include 'footer.php'; ?>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
      <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

  </body>

  </html>
