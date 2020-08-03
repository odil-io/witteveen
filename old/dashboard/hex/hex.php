<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script>
    $('#rgba').hide();
var updatePreview = function() {
		// Remove hash
    var hex = $('#hex').val().slice(1);

    // Split to four channels
    var c = hex.match(/.{2}/g);
    if(c.length != 4) {
        $('<p />', {
            'class': 'user-message warning'
        }).text('Value provided is invalid.').insertAfter('form').hide().slideDown();
        $('#hex').addClass('error');
        $('#rgba').slideUp();
        return false;
    } else {
        $('#hex').removeClass('error');
        $('.user-message').slideUp();
    }

    // Function: to decimals (for RGB)
    var d = function(v) {
        return parseInt(v, 16);
    };
    // Function: to percentage (for alpha), to 3 decimals
    var p = function(v) {
        return parseFloat(parseInt((parseInt(v, 16)/255)*1000)/1000);
    };

    // Check format: if it's argb, pop the alpha value from the end and move it to front
    var a, rgb = [];
    if($('#format').val() === 'argb') {
        c.push(c.shift());
    }

    // Convert array into rgba values
    a = p(c[3]);
    $.each(c.slice(0,3), function(i,v) {
        rgb.push(d(v));
    });

    // Announce value
    $('#rgba').slideDown().find('span').css('background-color', 'rgba('+rgb.join(',')+','+a+')').next('code').text('rgba('+rgb.join(',')+','+a+')');

    // Change body background
    $('body').css('background-color','rgba('+rgb.join(',')+','+a+')');
}

$('form').on('submit', function(e) {
    e.preventDefault();
		updatePreview();
});
$('#format, #hex').on('change', updatePreview);
</script>
    <style>
    @import url(http://fonts.googleapis.com/css?family=Open+Sans);
html, body {
    width: 100%;
    min-height: 100%;
}
body {
    background-color: #ccc;
    color: #333;
    font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    line-height: 1.5em;
    transition: all .25s ease-in-out;
}
section {
    background-color: rgba(255,255,255,.85);
    box-shadow: 0 0 5rem 0 rgba(0,0,0,.25);
    margin: 0;
    padding: 2rem;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
h1 {
    font-size: 2rem;
    margin-bottom: .5rem;
    text-align: center;
}
h1 + p {
    margin-bottom: 1.5rem;
    text-align: center;
}
a {
    color: rgba(97,149,198,1);
    text-decoration: none;
}
form {
    display: flex;
}
form > div {
    flex: 1 0 auto;
    padding: 0 .5rem;
}
label {
    cursor: pointer;
    display: block;
    font-size: .75em;
    line-height: 1.5rem;
    margin: 0 0 0 .25rem;
    text-transform: uppercase;
}
select, input {
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    display: block;
    height: 2rem;
    padding: 0 1rem;
}
select:focus, input:focus, button:focus {
    border-color: rgba(97,149,198,1);
    box-shadow: 0 0 10px 0 rgba(97,149,198,.25);
    outline: none;
}
button {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    cursor: pointer;
    display: block;
    margin-top: 1.5rem;
    padding: 0 1rem;
    height: 2rem;
}
#rgba {
    line-height: 1.5rem;
    margin-top: 1rem;
    text-align: center;
}
@keyframes pulse {
	0% { transform: scale(1); }
	30% { transform: scale(1); }
	40% { transform: scale(1.15); }
	50% { transform: scale(1); }
	60% { transform: scale(1); }
	70% { transform: scale(1.075); }
	80% { transform: scale(1); }
	100% { transform: scale(1); }
}
#rgba span {
    animation-name: pulse;
    animation-duration: 2s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    border: 2px solid rgba(0,0,0,.125);
    border-radius: 50%;
    display: block;
    margin: .5rem auto;
    width: 2rem;
    height: 2rem;
    transition: all .25s ease-in-out;
}
#rgba code {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 2px;
    display: inline-block;
    font-family: Consolas, monospace;
    font-size: 1.5em;
    padding: .5rem;
}
.user-message {
    border: 1px solid rgba(0,0,0,.125);
    margin: 1rem .5rem 0;
    padding: .5rem;
    text-align: center;
}
.warning {
    background: rgba(177,49,49,1);
    color: #eee;
}
.error {
    border-color: rgba(206,129,57,1);
}
    </style>
  </head>
  <body>
  <section>
      <h1>8-digit HEX converter</h1>
      <p>Converts 8-digit hexadecimal colour codes into CSS-compliant RGBa.<br />Made by <a href="http://terrymun.com">Terry Mun</a> out of boredom.</p>
      <form action="#">
        <div class="col-input">
              <label for="format">Format</label>
              <select id="format">
                  <option value="rgba">RGBa: RRGGBBAA</option>
                  <option value="argb">aRGB: AARRGGBB</option>
              </select>
          </div>
          <div class="col-input">
              <label for="hex">Hex</label>
              <input type="text" id="hex" value="#949494E8" />
          </div>
          <div class="col-button"><button>Convert</button></div>
      </form>
      <p id="rgba">CSS RGBA:<br /><span></span><code></code></p>
  </section>
</body>
</html>
