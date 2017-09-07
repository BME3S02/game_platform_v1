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
    <input id="roadWidth" name="roadWidth" type='range' min='500' max='3000' title="integer (500-3000)" >
    <label for="totalCars">total Cars (<span id="currenttotalCars"></span>) :</label></th>
    <input id="totalCars" name="totalCars" type='range' min='1' max='200' title="integer (0-200)" >
    <label for="maxSpeed">Max Speed (<span id="currentmaxSpeed"></span>) :</label></th>
    <input id="maxSpeed" name="maxSpeed" type='range' min='1' max='12000' title="integer (0-6000)" >
    <label for="maxTime">Max Time[sec] (<span id="currentmaxTime"></span>) :</label></th>
    <input id="maxTime" name="maxTime" type='range' min='3' max='180' title="integer (0-6000)" >
    <div style="display:none">
      <select id="backgroundImg" name="backgroundImg" style="border: 1;color: black;background: transparent;font-size: 10px;font-weight: bold;padding: 2px 10px;width: 100px; *width: 80px;*background: #58B14C;-webkit-appearance: none;">
        <option value="background1">background1</option>
        <option value="background2">background2</option>
        <option value="background3">background3</option>
        <option value="background4">background4</option>
        <option value="background5">background5</option>
      </select>
    </div>
    <div style="display:none">
      <select id="sprites" name="sprites" style="border: 1;color: black;background: transparent;font-size: 10px;font-weight: bold;padding: 2px 10px;width: 100px; *width: 80px;*background: #58B14C;-webkit-appearance: none;">
        <option value="sprites1">sprites1</option>
        <option value="sprites2">sprites2</option>
        <option value="sprites3">sprites3</option>
        <option value="sprites4">sprites4</option>
        <option value="sprites5">sprites5</option>
      </select>
    </div>

    <input type="submit" style="float: right;"value="Apply" id="submit" name="submit" class="btn btn-primary">
  </form>
</div>
