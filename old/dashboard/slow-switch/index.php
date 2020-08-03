<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Slow Switch</title>
  </head>
  <body>
    <p>source:
      <a href="https://artists.scitoys.com/slowswitch">https://artists.scitoys.com/slowswitch</a>
    </p>
    <script>
      var Debug = 0; // remove the '= 0' to get a debugging window
      var SVGRoot;
      var svgNS = "http://www.w3.org/2000/svg";
      var v_limit;
      var start_time;
      var clear;
      var amps = 0;
      var voltage_label;
      var count = 0;
      var tick_count = 0;
      var moved_to_x = 0;
      var moved_to_y = 0;
      var moved_to_which = null;
      var s_volt_text = null;
      var s_amp_text = null;
      var s_ohm_text = null;
      var buffer = null;
      var wave = null;
      var scope = null;
      var volts_text = null;
      var current_text = null;
      var charging = true;
      var discharging = false;
      var automatic = false;
      var interval = null;
      var ticks_per_second = 60; // no need to exceed screen refresh rate
      var current_voltage = 0;
      var battery_voltage = 12;
      var scope_range = battery_voltage * 2.5; // x2 plus a little for the rounded edges
      var lo_voltage = battery_voltage * (1 / Math.exp(1));
      var hi_voltage = battery_voltage - lo_voltage;
      var R1 = 100;
      var R2 = 100;
      var C1 = 0.01;
      var diode_forward_voltage = 1.9;
      function
      isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
      }
      function
      explore(element) {
        for (var x in element) {
          if (!isNumber(x))
            debug("" + element.id + "." + x + ": " + eval("element." + x));
          }
        }
      function
      init() {
        if (Debug == undefined) {
          Debug = window.open("", "_blank", "width=600,height=800,left=10,top=10");
        }
        SVGRoot = document.getElementById("svg2");
        draw_circuit();
        var v = document.getElementById("volts").value;
        new_voltage(parseFloat(v));
        var r1 = document.getElementById("R1").value;
        R1 = parseFloat(r1);
        var r2 = document.getElementById("R2").value;
        R2 = parseFloat(r2);
        var c1 = document.getElementById("C1").value;
        C1 = parseFloat(c1);
      }
      function
      debug(str) {
        if (Debug != undefined && Debug != 0) {
          Debug.document.write("<br/>" + str);
          Debug.scrollTo(0, 9999999);
        }
      }
      function
      onexit() {
        Debug.close();
      }
      function
      get_element(evt) {
        var element = evt.srcElement;
        if (element == undefined)
          element = evt.originalTarget; // Firefox

        return element;
      }
      function
      charge() {
        tick_count = 0;
        v_limit = 3;
        var current_time = new Date();
        start_time = current_time.getTime();
        automatic = false;
        charging = true;
        discharging = false;
        var group = document.getElementById("oscilloscope");
        var sw = document.getElementById("switch");
        group.removeChild(sw);
        sw = spst(group, 75, 60, 0, "on", "switch");
        group.appendChild(sw);
        window.clearInterval(interval);
        interval = window.setInterval("tick()", 1000 / ticks_per_second);
      }
      function
      discharge() {
        tick_count = 0;
        v_limit = 0;
        var current_time = new Date();
        start_time = current_time.getTime();
        charging = false;
        discharging = true;
        automatic = false;
        var group = document.getElementById("oscilloscope");
        var sw = document.getElementById("switch");
        group.removeChild(sw);
        sw = spst(group, 75, 60, 0, "off", "switch");
        group.appendChild(sw);
        window.clearInterval(interval);
        interval = window.setInterval("tick()", 1000 / ticks_per_second);
      }
      function
      off() {
        tick_count = 0;
        charging = false;
        discharging = false;
        automatic = false;
        window.clearInterval(interval);
        var group = document.getElementById("oscilloscope");
        var sw = document.getElementById("switch");
        group.removeChild(sw);
        sw = spst(group, 75, 60, 0, "off", "switch");
        group.appendChild(sw);
      }
      function
      auto() {
        tick_count = 0;
        v_limit = 9999999;
        charge();
        automatic = true;
      }
      function
      spst(element, x, y, angle, pos, name) {
        var grp = document.createElementNS(svgNS, "g");
        var sw = document.createElementNS(svgNS, "path");
        var off = "M 0 0 l 20 0 l 30 -10 l -20 0   l  5 12 l 15 -12 l -30  10 l -20 0 z m 55 0 l 20 0";
        var on = "M 0 0 l 20 0 l 30 0   l -20 -6  l  0 12 l 20 -6  l -30  0  l -20 0 z m 55 0 l 20 0";
        if (pos == "off") {
          sw.setAttributeNS(null, "d", off);
        } else if (pos == "on") {
          sw.setAttributeNS(null, "d", on);
        }
        sw.setAttributeNS(null, "fill", "black");
        sw.setAttributeNS(null, "stroke", "black");
        circle(grp, 54, 0, 3, "#000");
        grp.appendChild(sw);
        element.appendChild(grp);
        grp.setAttributeNS(null, "transform", "translate(" + x + "," + y + "), rotate( " + angle + ")");
        grp.setAttributeNS(null, "id", name);
        return grp;
      }
      function
      led(element, x, y, angle, state, name) {
        var grp = document.createElementNS(svgNS, "g");
        var circ = circle(grp, 30, 0, 20, "#F33");
        circ.setAttributeNS(null, "opacity", "0");
        circ.setAttributeNS(null, "id", "led_circle");
        var circ_border = circle(grp, 30, 0, 20, "black");
        circ_border.setAttributeNS(null, "fill", "none");
        circ_border.setAttributeNS(null, "stroke", "black");
        var led = document.createElementNS(svgNS, "path");
        var diode = "M 0 0 l 20 0 l 0 -10 l 20 10 l -20 10 l 0 -10 m 20 10 l 0 -20 m 0 10 l 20 0";
        led.setAttributeNS(null, "d", diode);
        led.setAttributeNS(null, "fill", "black");
        led.setAttributeNS(null, "stroke", "black");
        grp.appendChild(led);
        var arrow_path = document.createElementNS(svgNS, "path");
        var arrows = "M 30 -10 l -10 -10 l 5 0 l -10 -10 l 5 3 l -2 2 l -3 -5";
        arrows += " M 37 -8 l -10 -10 l 5 0 l -10 -10 l 5 3 l -2 2 l -3 -5";
        arrow_path.setAttributeNS(null, "d", arrows);
        arrow_path.setAttributeNS(null, "fill", "none");
        arrow_path.setAttributeNS(null, "stroke", "black");
        arrow_path.setAttributeNS(null, "id", "led_arrows");
        grp.appendChild(arrow_path);
        element.appendChild(grp);
        grp.setAttributeNS(null, "transform", "translate(" + x + "," + y + "), rotate( " + angle + ")");
        grp.setAttributeNS(null, "id", name);
        return grp;
      }
      function
      probe(element, x1, y1, x2, y2, off_x, off_y, color, dots) {
        var grp = document.createElementNS(svgNS, "g");
        grp.setAttribute("shape-rendering", "inherit");
        grp.setAttribute("pointer-events", "all");
        var path = document.createElementNS(svgNS, "path");
        var mid_x = x1 - (x1 - x2) / 2;
        var mid_y = y1 - (y1 - y2) / 2;
        var curve = "M " + x1 + " " + y1 + " ";
        curve += "Q " + off_x + " " + off_y + " ";
        curve += mid_x + " " + mid_y + " ";
        curve += "T " + x2 + " " + y2;
        path.setAttributeNS(null, "d", curve);
        path.setAttributeNS(null, "fill", "none");
        path.setAttributeNS(null, "stroke", color);
        path.setAttributeNS(null, "stroke-width", 3);
        if (dots) {
          circle(grp, x1 + 1, y1, 3, color);
          circle(grp, x2 - 1, y2, 3, color);
        }
        grp.appendChild(path);
        element.appendChild(grp);
        return grp;
      }
      function
      connect(element, x1, y1, x2, y2, color, dots) {
        var grp = document.createElementNS(svgNS, "g");
        grp.setAttribute("shape-rendering", "inherit");
        grp.setAttribute("pointer-events", "all");
        var line = document.createElementNS(svgNS, "line");
        line.setAttributeNS(null, "x1", x1);
        line.setAttributeNS(null, "y1", y1);
        line.setAttributeNS(null, "x2", x2);
        line.setAttributeNS(null, "y2", y2);
        line.setAttributeNS(null, "fill", "none");
        line.setAttributeNS(null, "stroke", color);
        if (dots) {
          circle(grp, x1 + 1, y1, 3, "#000");
          circle(grp, x2 - 1, y2, 3, "#000");
        }
        grp.appendChild(line);
        element.appendChild(grp);
        return grp;
      }
      function
      battery(element, x, y, angle) {
        var batt = document.createElementNS(svgNS, "path");
        batt.setAttributeNS(null, "d", "M 0 0 l 40 0 m 0 30 l 0 -60 m 10 45 l 0 -30 m 10 45 l 0 -60 m 10 45 l 0 -30 m 0 15 l 40 0");
        batt.setAttributeNS(null, "fill", "none");
        batt.setAttributeNS(null, "stroke", "black");
        element.appendChild(batt);
        batt.setAttributeNS(null, "transform", "translate(" + x + "," + y + "), rotate( " + angle + ")");
        return batt;
      }
      function
      capacitor(element, x, y, angle) {
        var cap = document.createElementNS(svgNS, "path");
        cap.setAttributeNS(null, "d", "M 0 0 l 40 0 m 0 30 l 0 -60 m 20 60 l 0 -60 m 0 30 l 40 0");
        cap.setAttributeNS(null, "fill", "none");
        cap.setAttributeNS(null, "stroke", "black");
        element.appendChild(cap);
        cap.setAttributeNS(null, "transform", "translate(" + x + "," + y + "), rotate( " + angle + ")");
        return cap;
      }
      function
      resistor(element, x, y, angle) {
        var pl = document.createElementNS(svgNS, "polyline");
        pl.setAttributeNS(null, "points", "0,40 10,40 15,50 25,30 35,50 45,30 55,50 65,30 75,50 85,30 90,40 100,40");
        pl.setAttributeNS(null, "fill", "none");
        pl.setAttributeNS(null, "stroke", "black");
        element.appendChild(pl);
        pl.setAttributeNS(null, "transform", "translate(" + x + "," + y + "), rotate( " + angle + ")");
        return pl;
      }
      function
      label(element, x, y, angle, size, color, text) {
        var t = document.createElementNS(svgNS, "text");
        t.setAttributeNS(null, "x", x);
        t.setAttributeNS(null, "y", y);
        t.setAttributeNS(null, "font-size", size);
        t.setAttributeNS(null, "fill", color);
        var txt = document.createTextNode(text);
        t.appendChild(txt);
        t.setAttributeNS(null, "transform", "translate(" + x + "," + y + "), rotate( " + angle + ")");
        element.appendChild(t);
        return t;
      }
      function
      circle(element, x, y, size, color) {
        var circ = document.createElementNS(svgNS, "circle");
        circ.setAttributeNS(null, "cx", x);
        circ.setAttributeNS(null, "cy", y);
        circ.setAttributeNS(null, "r", size);
        circ.setAttributeNS(null, "fill", color);
        element.appendChild(circ);
        return circ;
      }
      function
      draw_scope(element, name) {
        var box = document.getElementById("outside_border");
        var x = parseInt(box.getAttribute("x"));
        var y = parseInt(box.getAttribute("y"));
        var width = parseInt(box.getAttribute("width"));
        var height = parseInt(box.getAttribute("height"));
        this.screen_x = x + 10;
        this.screen_y = y + 10;
        this.screen_width = width - 20;
        this.screen_height = height - 90;
        var screen = document.createElementNS(svgNS, "rect");
        screen.setAttributeNS(null, "x", this.screen_x);
        screen.setAttributeNS(null, "y", this.screen_y);
        screen.setAttributeNS(null, "rx", 20);
        screen.setAttributeNS(null, "ry", 20);
        screen.setAttributeNS(null, "width", this.screen_width);
        screen.setAttributeNS(null, "height", this.screen_height);
        screen.setAttributeNS(null, "fill", "#AAA");
        element.appendChild(screen);
        var zero = document.createElementNS(svgNS, "line");
        zero.setAttributeNS(null, "x1", this.screen_x);
        zero.setAttributeNS(null, "y1", this.screen_y + this.screen_height / 2);
        zero.setAttributeNS(null, "x2", this.screen_x + this.screen_width);
        zero.setAttributeNS(null, "y2", this.screen_y + this.screen_height / 2);
        zero.setAttributeNS(null, "fill", "none");
        zero.setAttributeNS(null, "stroke", "#ABA");
        element.appendChild(zero);
        var volts = document.createElementNS(svgNS, "text");
        volts.setAttributeNS(null, "x", this.screen_x + 60);
        volts.setAttributeNS(null, "y", this.screen_y + (height - 55));
        volts.setAttributeNS(null, "font-size", "32px");
        volts.setAttributeNS(null, "fill", "black");
        volts_text = document.createTextNode("Volts: 0");
        volts.appendChild(volts_text);
        element.appendChild(volts);
        var current = document.createElementNS(svgNS, "text");
        current.setAttributeNS(null, "x", this.screen_x + 60);
        current.setAttributeNS(null, "y", this.screen_y + (height - 25));
        current.setAttributeNS(null, "font-size", "20px");
        current.setAttributeNS(null, "fill", "black");
        current_text = document.createTextNode("");
        current.appendChild(current_text);
        element.appendChild(current);
        this.pos = circle(element, x + 30, y + (height - 60), 10, "#A00");
        this.neg = circle(element, x + 30, y + (height - 30), 10, "#555");
        this.id = name;
        return this;
      }
      var off_resistance = 10000000;
      var ohmic_resistance = 0.042;
      var thermal_voltage = 0.02585; // 300 Kelvin (room temperature)
      //
      // Green LED
      //
      var saturation_current = 0.0000000000932; // 93.2 picoamps
      var diode_n = 4.61; // Found this somewhere on the 'net
      diode_n = 4.22; // This gives a closer voltage drop to the green LED I am actually using
      ohmic_resistance = 4.2;
      //
      // Values from SPICE model for red LED
      //
      // diode_n = 3.3; saturation_current = 0.0000000001;
      var cap_leakage = 3500000; // 35 volts / 10 microamps is 3,500,000 ohms
      function
      diode_current(voltage_across_diode) {
        // If = Is(e^(Vf/(N*Vt)) - 1)
        var forward_current = saturation_current * Math.exp(voltage_across_diode / (diode_n * thermal_voltage) - 1);
        return forward_current;
      }
      var guess = 0.6;
      function
      diode_resistor_voltage(capacitor_voltage, resistance) {
        var voltage = 0;
        for (var x = 0; x < 100; x++) {
          voltage = diode_n * thermal_voltage * Math.log((capacitor_voltage - guess) / (resistance * saturation_current) + 1);
          if (!isFinite(voltage)) {
            return 0;
          }
          if (Math.abs(voltage - guess) < 0.001) {
            return voltage;
          }
          guess = voltage;
        }
        return voltage;
      }
      function
      voltage() {
        var circ = document.getElementById("led_circle");
        var arrows = document.getElementById("led_arrows");
        var resistance;
        if (charging) {
          //
          // We use the current voltage because the capacitor acts like a short This also takes into account R1, so we only use R2 to get the diode voltage
          //
          var voltage_drop = diode_resistor_voltage(current_voltage, R2);
          // debug( "Voltage drop using current_voltage(" + current_voltage + ") and R2 is " + voltage_drop );
          var charging_voltage;
          if (voltage_drop > 0) {
            amps = (current_voltage - voltage_drop) / R2;
            var diode_brightness = amps / 0.02;
            // debug( "Diode_brightness is " + diode_brightness );
            circ.setAttributeNS(null, "opacity", diode_brightness);
            if (diode_brightness > 2) {
              circ.setAttributeNS(null, "fill", "brown");
              arrows.setAttributeNS(null, "stroke", "none");
            } else if (diode_brightness > 1) {
              circ.setAttributeNS(null, "fill", "yellow");
              arrows.setAttributeNS(null, "stroke", "black");
            } else {
              circ.setAttributeNS(null, "fill", "#F33");
              arrows.setAttributeNS(null, "stroke", "black");
            }
            var diode_resistance = current_voltage / amps + ohmic_resistance;
            var combined_resistance = diode_resistance + R2;
            charging_voltage = battery_voltage * combined_resistance / (combined_resistance + R1);
            // debug( "Voltage across led is " + voltage_drop ); debug( "Voltage at top of led is " + charging_voltage ); debug( "Voltage at bottom of led is " + (charging_voltage - voltage_drop) ); debug( "Current through led is " + amps ); debug( "Current
            // through shorted led is " + ((charging_voltage * R2 / (R2 + R1)) / R2) ); debug( "Diode_resistance is " + diode_resistance ); resistance = diode_resistance + R1 + R2;
          } else {
            circ.setAttributeNS(null, "opacity", "0");
            charging_voltage = battery_voltage;
            // resistance = R1;
          }
          var factor = 1 - Math.exp(-(1 / ticks_per_second) / (R1 * C1));
          // debug( "Factor is " + factor );
          current_voltage += (charging_voltage - current_voltage) * factor;
          // debug( "" );
          return current_voltage;
        } else if (discharging) {
          var voltage_drop = diode_resistor_voltage(current_voltage, R2);
          if (voltage_drop > 0) {
            amps = voltage_drop / R2;
            var diode_brightness = amps / 0.02;
            // debug( "Diode_brightness is " + diode_brightness );
            circ.setAttributeNS(null, "opacity", diode_brightness);
            if (diode_brightness > 2) {
              circ.setAttributeNS(null, "fill", "brown");
              arrows.setAttributeNS(null, "stroke", "none");
            } else if (diode_brightness > 1) {
              circ.setAttributeNS(null, "fill", "yellow");
              arrows.setAttributeNS(null, "stroke", "black");
            } else {
              circ.setAttributeNS(null, "fill", "#F33");
              arrows.setAttributeNS(null, "stroke", "black");
            }
            resistance = voltage_drop / amps;
            // debug( "Volts is " + voltage_drop ); debug( "Amps is " + amps ); debug( "Resistance is " + resistance );
            var factor = Math.exp(-(1 / ticks_per_second) / (resistance * C1));
            current_voltage *= factor;
            // debug( "" );
          } else {
            amps = 0;
            circ.setAttributeNS(null, "opacity", "0");
            var total_resistance = 1 / ((1 / off_resistance) + (1 / cap_leakage));
            var factor = Math.exp(-(1 / ticks_per_second) / (total_resistance * C1));
            current_voltage *= factor;
          }
          return current_voltage;
        } else {
          return current_voltage;
        }
      }
      function
      tick() {
        var l = buffer.length;
        var group = document.getElementById("oscilloscope");
        if (wave != null) {
          group.removeChild(wave);
        }
        wave = document.createElementNS(svgNS, "path");
        wave.setAttributeNS(null, "fill", "none");
        wave.setAttributeNS(null, "stroke", "red");
        var left = scope.screen_x;
        var top = scope.screen_y;
        var w = scope.screen_width;
        var h = scope.screen_height;
        var scale = h / scope_range;
        var v = voltage();
        buffer[count % l] = v * scale;
        count++;
        tick_count++;
        v = Math.round(v * 1000) / 1000;
        var the_wave = "M " + (
          left + 1
        ) + " " + (
          top + (h / 2) - buffer[count % l]
        ) + " ";
        for (var x = 0; x < l; x++) {
          var i = (count + x) % l;
          the_wave += "L " + (
            left + 1 + x
          ) + " " + (
            top + (h / 2) - buffer[i]
          ) + " ";
        }
        wave.setAttributeNS(null, "d", the_wave);
        group.appendChild(wave);
        var parent = volts_text.parentElement;
        parent.removeChild(volts_text);
        volts_text = document.createTextNode("Volts: " + Math.round(v * 1000) / 1000);
        parent.appendChild(volts_text);
        var parent = current_text.parentElement;
        parent.removeChild(current_text);
        current_text = document.createTextNode("LED Current: " + Math.round(amps * 100000) / 100 + " ma");
        parent.appendChild(current_text);
      }
      function
      new_voltage(v) {
        battery_voltage = v;
        voltage_label.firstChild.textContent = "+" + battery_voltage + "v";
      }
      function
      new_R1(r) {
        R1 = r;
      }
      function
      new_R2(r) {
        R2 = r;
      }
      function
      new_C1(c) {
        C1 = c;
      }
      function
      draw_circuit() {
        var group = document.getElementById("oscilloscope");
        var box = document.getElementById("outside_border");
        box.setAttribute("x", 295);
        scope = draw_scope(group, "scope1");
        var pos_x = parseInt(scope.pos.getAttribute("cx"));
        var pos_y = parseInt(scope.pos.getAttribute("cy"));
        var neg_x = parseInt(scope.neg.getAttribute("cx"));
        var neg_y = parseInt(scope.neg.getAttribute("cy"));
        resistor(group, 70, 60, 90); // charging resistor
        label(group, 25, 50, 0, "10px", "black", "R1");
        capacitor(group, 240, 140, 90);
        label(group, 125, 110, 0, "10px", "black", "C1");
        battery(group, 30, 270, 270);
        voltage_label = label(group, 25, 95, 0, "10px", "black", "+" + battery_voltage + "v");
        connect(group, 29, 270, 241, 270, "black", false); // bottom wire
        spst(group, 75, 60, 0, "off", "switch");
        connect(group, 240, 60, 240, 140, "black", false); // switch to capacitor vertical
        connect(group, 240, 270, 240, 240, "black", false); // ground to capacitor vertical
        connect(group, 30, 60, 75, 60, "black", false); // battery to switch horizontal
        connect(group, 150, 60, 241, 60, "black", false); // switch to capacitor horizontal
        probe(group, pos_x, pos_y, 241, 125, pos_x - 20, pos_y + 10, "red", true);
        probe(group, neg_x, neg_y, 241, 255, neg_x - 20, neg_y + 10, "black", true);
        resistor(group, 200, 170, 90); // LED current limiting resistor
        label(group, 88, 120, 0, "10px", "black", "R2");
        led(group, 160, 90, 90, "off", "led");
        connect(group, 160, 60, 160, 90, "black", false); // switch to LED vertical
        connect(group, 160, 150, 160, 170, "black", false); // resistor to LED vertical
        buffer = new Array(scope.screen_width);
        for (var x = 0; x < scope.screen_width; x++) {
          buffer[x] = 0;
        }
      }
    </script>
    <form accept-charset="utf-8" id="f" action="javascript:void(0);">
      <div id="oscope" style="margin: 0px auto; text-align: center;">
        <div style="padding: 10px;margin: 0px auto; text-align: center; background-color: #EEE" id="scope">
          <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" id="svg2" version="1.1" viewbox="0 0 600 310" overflow="visible" height="300px">
            <g id="oscilloscope">
              <rect style="opacity:1;fill:#ffffff;fill-opacity:1;stroke-width:4;stroke-miterlimit:4;stroke:#000000;stroke-opacity:1" id="outside_border" width="300" height="300" x="245" y="10" rx="20" ry="20"/>
            </g>
          </svg>
        </div>
        <input type="button" value="on" onclick="automatic=false;charge();">
        <input type="button" value="off" onclick="automatic=false;discharge();">
        <input type="button" value="stop" onclick="automatic=false;off();">
        <br/>Voltage:
        <input id="volts" type="text" size="1" value="12" onchange="new_voltage(this.value);">
        volts
        <br/>R1:
        <input id="R1" type="text" size="6" value="100" onchange="new_R1(this.value);">
        ohms
        <br/>R2:
        <input id="R2" type="text" size="6" value="440" onchange="new_R2(this.value);">
        ohms
        <br/>C1:
        <input id="C1" type="text" size="6" value="0.01" onchange="new_C1(this.value);">
        farads
      </div>
    </form>
    <script>
      init();
    </script>
    <!-- <p class="rtejustify" style="">&nbsp;</p> <p class="rtejustify" style=""><object data="slow_switch.shtml" height="520px" id="outer_wrapper" style="overflow:hidden" type="text/html" width="700px"><embed data="slow_switch.shtml" height="520px"
    style="overflow:hidden" type="text/html" width="700px"></embed></object></p> <p class="rtejustify" style="">&nbsp;</p> -->
  </body>
</html>
