<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>GTMetrix API</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>GTMetrix API</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <form>
          <div class="form-group">
            <input type="text" class="form-control" id="site" aria-describedby="sitedesc" placeholder="https://website.tld/">
            <small id="sitedesc" class="form-text text-muted">Voer hier de website in.</small>
          </div>
          <button id="submit" type="submit" class="btn btn-primary" disabled>Test</button>
        </form>
      </div>
    </div>
    <div id="results" class="row">
      <div class="col-8">
        <div class="row">
          <div class="col-12">
            Site URL: <span id="site_url"></span>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="row">
          <div class="col-12 text-center">
            <h4>PageSpeed</h4>
            <h1 id="pagespeed-score">98%</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#submit').prop('disabled', false);
  });
  </script>
</body>
</html>
