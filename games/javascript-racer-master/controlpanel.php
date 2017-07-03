<div id="sidebar">
  <h2>Outrun!</h2>
  <table id="controls" style="margin-right:20px">
    <tr><td id="fps" colspan="2" align="right"></td></tr>
  </table>
  <form action="index.php" method="GET" id="settingsForm" name="settingsForm">
    <div>
      <select id="lanes" name="lanes">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option selected>4</option>
      </select>
    </div>
    <label for="roadWidth">Car Size (<span id="currentRoadWidth"></span>) :</label>
    <input id="roadWidth" name="roadWidth" type='range' min='500' max='3000' title="integer (500-3000)" value=<?php if(isset($_GET['roadWidth'])){ echo $_GET['roadWidth']; } else { echo $roadWidth; }?>>
    <label for="totalCars">total Cars (<span id="currenttotalCars"></span>) :</label></th>
    <input id="totalCars" name="totalCars" type='range' min='1' max='200' title="integer (0-200)" value=<?php if(isset($_GET['totalCars'])){ echo $_GET['totalCars']; } else { echo  $totalCars; }?>>
    <label for="maxSpeed">Max Speed (<span id="currentmaxSpeed"></span>) :</label></th>
    <input id="maxSpeed" name="maxSpeed" type='range' min='1' max='12000' title="integer (0-6000)" value=<?php if(isset($_GET['maxSpeed'])){ echo $_GET['maxSpeed']; } else { echo $maxSpeed; }?>>
    <input type="submit" style="float: right;"value="Apply" id="submit" name="submit" class="btn btn-primary">
  </form>
</div>
