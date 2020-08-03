<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>odil.io - Tools</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function(){
    var result = $('#result');
    var base = $('#base');
    var list = $('#convert');
    $('#calc').click(function() {
      var baseVal = base.val();
      var px = list.val().split(',');
      var html = [];
      $.each(px, function(i, v) {
        var px = parseInt(v);
        var rem = parseFloat((px / parseInt(baseVal, 10)).toPrecision(4));
        var isBase = (rem === 1) ? ' <i>(base)</i>' : '';
        html.push('<div class="alert alert-info">' + v + 'px = ' + rem + 'rem' + isBase + '</div>')
      });
      result.html(html.join(''));
    });
  });
</script>
</head>
<body>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-8">
      <form>
        <div class="form-group">
          <label for="base">Base Font Size</label>
          <div class="input-group">
            <input id="base" class="form-control" value="16" type="text" aria-describedby="base-desc" placeholder="16">
            <div class="input-group-append">
              <span class="input-group-text">px</span>
            </div>
          </div>
          <small id="base-desc" class="form-text text-muted">Base &lt;HTML&gt; font-size (in px)</small>
        </div>
        <div class="form-group">
          <label for="base">Target Font Size</label>
          <div class="input-group">
            <input id="convert" class="form-control" value="18" type="text" aria-describedby="convert-desc" placeholder="16">
            <div class="input-group-append">
              <span class="input-group-text">px</span>
            </div>
          </div>
          <small id="convert-desc" class="form-text text-muted">Size to convert to</small>
        </div>
        <input id='calc' type='button' value='Calculate' class="btn btn-primary">
      </form>
    </div>
  </div>
  <div class="row justify-content-center pt-4">
    <div class="col-8">
      <div id="result"></div>
    </div>
  </div>
</div>
</body>
</html>
