<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Dashboard - 234dfa3765db11e789500d17ef97744829cc77ce</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
  <div class="container">
    <div class="row">
      <?php $directories = scandir('./'); ?>
      <?php foreach($directories as $directory): ?>
        <?php if( !in_array( $directory, array(".","..") ) ): ?>
          <?php if( is_dir($directory) ):?>
            <div class="col-3 py-3">
              <div class="card">
                <div class="card-body">
                  <div class="card-title">
                    <h5><?php echo $directory; ?></h5>
                  </div>
                  <div class="card-text">
                    <a href="<?php echo $directory; ?>" class="btn btn-primary btn-block">Open</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
