<?ini_set( 'zlib.output_compression_level',6);if(substr_count($_SERVER[ 'HTTP_ACCEPT_ENCODING'], 'gzip'))ob_start( 'ob_gzhandler');else ob_start();?>
<!DOCTYPE html>
<html lang="nl">
  <head prefix="og: http://ogp.me/ns# profile: http://ogp.me/ns/profile#">
    <meta http-equiv=x-ua-compatible content="ie=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Odilio Witteveen</title>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8" />
    <meta property=og:title content="Front-End Ontwikkelaar Odilio Witteveen" />
    <meta property=og:site_name content="Odilio Witteveen" />
    <meta property=og:locale content=nl_NL />
    <meta property=og:type content=website />
    <meta property=og:url content="https://odil.io/" />
    <meta property=og:image content="https://odil.io/odilio.jpg" />
    <meta property=og:image:secure_url content="https://odil.io/odilio.jpg" />
    <meta property=og:image:type content="image/png" />
    <meta property=og:description content="Odilio Witteveen doet websites maken bij IMAGA" />
    <meta name="description" content="Odilio Witteveen doet websites maken bij IMAGA" />
    <meta property=profile:first_name content=Odilio />
    <meta property=profile:last_name content=Witteveen />
    <link rel=icon type="image/png" href="/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300|Yantramanav:900&display=swap" rel="stylesheet">
    <style>
    body {
      font-family: 'Montserrat', sans-serif;
      font-size: 1.6em;
      color: #000;
    }
    html{
      width:100%;
      height:100%;
      background-color: #fff;
    }
    .container{
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
    }
    .row{
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      -ms-flex-align: center;
      align-items: center;
    }
    .col-40{
      -ms-flex: 0 0 40%;
      flex: 0 0 40%;
      max-width: 40%;
    }
    .col-60{
      -ms-flex: 0 0 60%;
      flex: 0 0 60%;
      max-width: 60%;
    }
    img{
      position: relative;
      height: auto;
      width: 100%;
    }
    h1{
      font-family: 'Yantramanav', sans-serif;
      font-size: 2.5em;
    }
    h1 > span{
      color:#5d7fd0;
    }
    ul{
      list-style-type: none;
      padding-left: 0;
    }
    ul ul{
      padding-left: 1em;
    }
    </style>
  </head>
  <body>
    <main>
      <div class="container">
        <div class="row">
          <div class="col-40">
            <h1>Hi, ik ben <span>Odilio Witteveen</span>.</h1>
            <ul>
              <li>WordPress Front/Back-End</li>
              <li>Google:
                <ul>
                  <li>Analitycs</li>
                  <li>Tag Manager</li>
                  <li>Data Studio</li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="col-60">
            <img src="afbeelding.jpg" alt="Odilio Witteveen">
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
<?php ob_end_flush();?>
