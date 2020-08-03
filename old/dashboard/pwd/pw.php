<?php

/**
* odil.io Password Generation page.
* Use this to quickly get password from s 'secure' site.
*
*
*
* @author      Odilio Witteveen <dev@odil.io>
* @link        https://odil.io
* @license     GNU Public Licence v3
* @version     v1.0.0
*
* @php         PHP 7
*/



$le     = ( empty($_GET['le']) ) ? 12 : (int)filter_input(INPUT_GET, 'le', FILTER_SANITIZE_NUMBER_INT);
$s      = ( empty($_GET['s']) ) ? true : false;
$n      = ( empty($_GET['n']) ) ? true : false;
$up     = ( empty($_GET['up']) ) ? true : false;
$lo     = ( empty($_GET['lo']) ) ? true : false;
$w      = ( empty($_GET['w']) ) ? false : true;

//$security = new Security();

//$password = $security->generatePassword($le, $s, $n, $up, $lo, $w);

?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>odil.io - PWDGen v2.0.6</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container mb-5 text-center">
    <div class="row">
      <div class="col-12">
        <div class="alert alert-danger" role="alert">
          This product no longer maintained and is borked.
        </div>
      </div>
    </div>
  </div>
  <div class="container">

    <div class="row justify-content-center">

      <div class="col-6 mt-5">

        <form class="form-horizontal" action="pw.php" method="get">

          <div class="form-group">
            <label for="p">Password</label>
            <input class="form-control" id="p" type="text" value="<?php echo $password; ?>" />
          </div>


          <div class="form-group">

            <label for="le">Length</label>

            <input class="form-control" id="le" type="number" name="le" value="<?php echo $le; ?>" />

          </div>


          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" id="s" type="checkbox" name="s" value="false" <?php echo ($s) ? "" : "checked";?> />
              <label class="form-check-label" for="s">
                No special characters
              </label>
            </div>

          </div>

          <div class="col-sm-5">

            <div class="checkbox">

              <label for="up">

                <input id="up" type="checkbox" name="up" value="false" <?php echo ($up) ? "" : "checked";?>/> No uppercase characters

              </label>

            </div>

          </div>

        </div>


        <div class="form-group">

          <div class="col-sm-offset-2 col-sm-5">

            <div class="checkbox">

              <label for="lo">

                <input id="lo" type="checkbox" name="lo" value="false" <?php echo ($lo) ? "" : "checked";?>/> No lowercase characters

              </label>

            </div>

          </div>

          <div class="col-sm-5">

            <div class="checkbox">

              <label for="n">

                <input id="n" type="checkbox" name="n" value="false" <?php echo ($n) ? "" : "checked";?> /> No numbers

              </label>

            </div>

          </div>

        </div>



        <div class="form-group">

          <div class="col-sm-offset-2 col-sm-10">

            <div class="checkbox">

              <label for="w">

                <input id="w" type="checkbox" name="w" value="true" <?php echo ($w) ? "checked" : "";?> /> Only use words

              </label>

            </div>

          </div>

        </div>


        <div class="form-group">

          <div class="col-sm-offset-2 col-sm-10">

            <input class="btn btn-primary" type="submit" value="generate">

          </div>

        </div>

      </form>

    </div>

  </div>

</div>

</body>

</html>
