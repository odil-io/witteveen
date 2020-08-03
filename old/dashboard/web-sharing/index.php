<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>odil.io - EXPERIMENTS</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script language="javascript">

  var url = encodeURIComponent(window.location.href);
  var title = encodeURIComponent(document.title);

  function TwitterShare(){
    window.location.href = "http://twitter.com/intent/tweet?url=" + url + "&text=" + title + "&via=userfocus";
  }
  function FacebookShare(){
    window.location.href = "https://www.facebook.com/sharer/sharer.php?u=" + url + "&t=" + title;
  }
  function LinkedInShare(){
    window.location.href = "https://www.linkedin.com/shareArticle?mini=true&url=" + url + "&title=" + title + "&source=Userfocus";
  }
  </script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-4">Web Sharing</h1>
        <h6></h6>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <a href="javascript:TwitterShare()" class="btn btn-primary btn-lg">Twitter</a>
        <a href="javascript:FacebookShare()" class="btn btn-primary btn-lg">Facebook</a>
        <a href="javascript:LinkedInShare()" class="btn btn-primary btn-lg">LinkedIn</a>
      </div>
    </div>
  </div>
</body>
</html>
