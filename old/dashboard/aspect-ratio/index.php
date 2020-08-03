<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>odil.io - Aspect Ratio</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="calc.js" charset="utf-8"></script>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-4">Aspect ratio calculator</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="initial-width">Original Width</label>
          <input class="form-control" type="text" min="1" id="initial-width" placeholder="Enter Width">
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="initial-height">Original Height</label>
          <input class="form-control" type="text" min="1" id="initial-height" placeholder="Enter Height">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="new-width">New Width</label>
          <input class="form-control" type="text" min="1" id="new-width" placeholder="Enter Width">
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="new-height">New Height</label>
          <input class="form-control" type="text" min="1" id="new-height" placeholder="Enter Height">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        Ratio: <span id="ratio">0:0</span>
      </div>
    </div>
  </div>

</body>
</html>
