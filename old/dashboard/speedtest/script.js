$(document).ready(function(){

  //SPEEDTEST AND UI CODE
  var worker = null; //speedtest worker
  var data = null; //data from worker

  $("#startStopBtn").on('click', function(){

    $("#startStopBtn").removeClass("btn-success");
    $("#startStopBtn").addClass("btn-danger");

    if (worker != null) {
      //speedtest is running, abort
      worker.postMessage('abort');
      worker = null;
      data = null;
      initUI();

    } else {
      //test is not running, begin
      worker = new Worker('speedtest_worker.min.js');
      worker.postMessage('start'); //Add optional parameters as a JSON object to this command
      worker.onmessage = function (e) {
        data = JSON.parse(e.data);
        var status = data.testState;
        
        if (status >= 4) {
          //test completed
          $("#startStopBtn").removeClass("btn-danger");
          $("#startStopBtn").addClass("btn-success");
          worker = null;
          updateUI(true);

          var output = new Object();
          output.ipaddress = data.clientIp;
          output.download = data.dlStatus + ' Mbps';
          output.upload = data.ulStatus + ' Mbps';
          output.ping = data.pingStatus + ' ms';
          output.jitter = data.jitterStatus + ' ms';

          $.ajax({
            type: "POST",
            url: "handler.php",
            data: JSON.stringify(output),
          })
          .done(function(){
            console.log('Done');
          }).fail(function(){
            console.log('Failed');
          });

          // Dit is het moment waarop we de resultaten kunnen opslaan. Logic:
          // 1. JS Haal de data uit de DOM
          // 2. JS Zet het in een array
          // 3. JS Stuur deze array naar een PHP file
          // 4. PHP haal json uit local file
          // 5. PHP add nieuwe array aan deze json
          // 6. PHP array vertalen naar json en deze opslaan op de server
        }
      };
    }
  });

  //this function reads the data sent back by the worker and updates the UI
  function updateUI(forced) {

    if (!forced && (!data || !worker)) return;

    var status = data.testState;

    I("ip").textContent = "Your IP Address: " + data.clientIp;

    I("dlText").textContent = (status == 1 && data.dlStatus == 0) ? "..." : data.dlStatus;
    drawMeter(I("dlMeter"), mbpsToAmount(Number(data.dlStatus)), meterBk, dlColor, Number(data.dlProgress), progColor);

    I("ulText").textContent = (status == 3 && data.ulStatus == 0) ? "..." : data.ulStatus;
    drawMeter(I("ulMeter"), mbpsToAmount(Number(data.ulStatus)), meterBk, ulColor, Number(data.ulProgress), progColor);

    I("pingText").textContent = data.pingStatus;
    drawMeter(I("pingMeter"), msToAmount(Number(data.pingStatus)), meterBk, pingColor, Number(data.pingProgress), progColor);

    I("jitText").textContent = data.jitterStatus;
    drawMeter(I("jitMeter"), msToAmount(Number(data.jitterStatus)), meterBk, jitColor, Number(data.pingProgress), progColor);
  }
  //poll the status from the worker (this will call updateUI)
  setInterval(function () {
    if (worker) worker.postMessage('status');
  }, 200);

  //update the UI every frame
  window.requestAnimationFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || (function (callback, element) {
    setTimeout(callback, 1000 / 60);
  });
  function frame() {
    requestAnimationFrame(frame);
    updateUI();
  }
  frame(); //start frame loop

  //function to (re)initialize UI
  function initUI() {
    drawMeter(I("dlMeter"), 0, meterBk, dlColor, 0);
    drawMeter(I("ulMeter"), 0, meterBk, ulColor, 0);
    drawMeter(I("pingMeter"), 0, meterBk, pingColor, 0);
    drawMeter(I("jitMeter"), 0, meterBk, jitColor, 0);
    I("dlText").textContent = "";
    I("ulText").textContent = "";
    I("pingText").textContent = "";
    I("jitText").textContent = "";
    I("ip").textContent = "";
  }

  function I(id) {
    return document.getElementById(id);
  }
  var meterBk = "#CACACA";
  var dlColor = "#009432",
  ulColor = "#0652DD",
  pingColor = "#EA2027",
  jitColor = "#833471";
  var progColor = "#F79F1F";
  //CODE FOR GAUGES
  function drawMeter(c, amount, bk, fg, progress, prog) {
    var ctx = c.getContext("2d");
    var dp = window.devicePixelRatio || 1;
    var cw = c.clientWidth * dp,
    ch = c.clientHeight * dp;
    var sizScale = ch * 0.0055;
    if (c.width == cw && c.height == ch) {
      ctx.clearRect(0, 0, cw, ch);
    } else {
      c.width = cw;
      c.height = ch;
    }
    ctx.beginPath();
    ctx.strokeStyle = bk;
    ctx.lineWidth = 16 * sizScale;
    ctx.arc(c.width / 2, c.height - 58 * sizScale, c.height / 1.8 - ctx.lineWidth, -Math.PI * 1.1, Math.PI * 0.1);
    ctx.stroke();
    ctx.beginPath();
    ctx.strokeStyle = fg;
    ctx.lineWidth = 16 * sizScale;
    ctx.arc(c.width / 2, c.height - 58 * sizScale, c.height / 1.8 - ctx.lineWidth, -Math.PI * 1.1, amount * Math.PI * 1.2 - Math.PI * 1.1);
    ctx.stroke();
    if (typeof progress !== "undefined") {
      ctx.fillStyle = prog;
      ctx.fillRect(c.width * 0.3, c.height - 16 * sizScale, c.width * 0.4 * progress, 4 * sizScale);
    }
  }
  function mbpsToAmount(s) {
    return 1 - (1 / (Math.pow(1.3, Math.sqrt(s))));
  }
  function msToAmount(s) {
    return 1 - (1 / (Math.pow(1.08, Math.sqrt(s))));
  }

  initUI();
});
