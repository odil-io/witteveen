<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no"/>
  <title>HTML5 Speedtest</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet.css">
  <script src="script.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mt-5 mb-4">
        <h1>HTML5 Speedtest</h1>
        <button id="startStopBtn" class="btn btn-success btn-lg px-5"></button>
      </div>
    </div>

    <div class="row">
      <div class="col-3 testArea">
        <div class="testName">Download</div>
        <canvas id="dlMeter" class="meter"></canvas>
        <div id="dlText" class="meterText"></div>
        <div class="unit">Mbps</div>
      </div>

      <div class="col-3">
        <div class="testArea">
          <div class="testName">Upload</div>
          <canvas id="ulMeter" class="meter"></canvas>
          <div id="ulText" class="meterText"></div>
          <div class="unit">Mbps</div>
        </div>
      </div>

      <div class="col-3">
        <div class="testArea">
          <div class="testName">Ping</div>
          <canvas id="pingMeter" class="meter"></canvas>
          <div id="pingText" class="meterText"></div>
          <div class="unit">ms</div>
        </div>
      </div>

      <div class="col-3">
        <div class="testArea">
          <div class="testName">Jitter</div>
          <canvas id="jitMeter" class="meter"></canvas>
          <div id="jitText" class="meterText"></div>
          <div class="unit">ms</div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 text-center mb-4">
        <p id="ip" class="mt-2"></p>
      </div>
    </div>

    <div id="history" class="row">
      <div class="col-12">
        <?php $fileContents = file_get_contents('json_array.txt'); ?>
        <?php $json = json_decode($fileContents, true); ?>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">IP Address</th>
              <th scope="col">Download</th>
              <th scope="col">Upload</th>
              <th scope="col">Ping</th>
              <th scope="col">Jitter</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ( $json as $ip_address => $data): ?>
              <tr>
                <td>
                  <?php echo $ip_address; ?>
                </td>
                <?php foreach ($data as $value ): ?>
                  <td>
                    <?php echo $value; ?>
                  </td>
                <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-12 text-center">
        <p>Based on the script from Federico Dossena.
          <a href="https://github.com/adolfintel/speedtest" target="_blank">Source code</a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>
