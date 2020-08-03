<script>
/**
 *
 * SalonHub Custom Script
 *
 */
var salonhub = {
	ids : ['salonhub_header', 'salonhub_footer', 'salonhub_afspraakmaken'],
	button :'Afspraak Maken',
	title : '',
	client : 'careforhair',
	header : '{fullname} - {address}, {city}',
	introduction : 'In 3 eenvoudige stappen een afspraak maken, vul uw e-mail adres in om uw afspraak te bevestigen.',
	confirmation : 'Uw afspraak is bevestigd op {date} om {time} uur.<br><br>{fullname}<br>{address}<br>{city}<br><br>Tel. {telephone}<br><a href="mailto:{email}">{email}</a>.'
}

var script = document.createElement('script');
script.setAttribute('type', 'text/javascript');
script.setAttribute('defer', 'defer');
script.setAttribute('src', '//widget.salonhub.nl/a/i.js');
document.getElementsByTagName('head')[0].appendChild(script);


jQuery(window).load(function() {
  jQuery('.flexslider').flexslider({
	controlNav: false,
	animation: "slide",
	useCSS: false, // uitsluiten van gebruik 3D CSS, Chrome rerendering wordt dan niet meer gebruikt
	slideshow: true,
	animationLoop: true,
	itemWidth: 420,
	minItems: 1,
	maxItems: 10
  });

  jQuery('#salonhub_headerSM').on('change', function(e){
	  //e.preventDefault();
	  //jQuery('#salonhub_headerB').attr('data-url', e.target.value );
	  //window.location.href = e.target.value;
  });

  jQuery('#salonhub_headerB').on('click', function(e){
	  //e.preventDefault();
	  //window.location.href = jQuery(this).attr('data-url' );
  });
  jQuery('#salonhub_footerB').on('click', function(e){
	  e.preventDefault();
	  window.location.href = "/online-afspreken/";
  });
});
</script>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:900i|Poppins&display=swap" rel="stylesheet">
<style>
#salonhub_headerB,#salonhub_footerB,#salonhub_afspraakmakenB,#salonhub_link{display:block;padding:0.429em 1.143em 0.643em;font-size:14px;color:#fff;border-color:#ce2f39;background-color:#ce2f39;text-shadow:0px 0.075em 0.075em rgba(0, 0, 0, 0.5);background-image:linear-gradient(to top, #0d1627, rgba(255, 255, 255, 0)), linear-gradient(#ce2f39, #ce2f39);background-blend-mode:overlay, normal;border:solid 1px #cb1528;font-family:"Poppins",sans-serif;border-radius:3px;width:100%;margin:12px auto 0}#salonhub_headerS,#salonhub_footerS,#salonhub_afspraakmakenT{position:relative;overflow:hidden;width:100%;margin:10px auto;border-radius:3px}#salonhub_headerS:after,#salonhub_footerS:after,#salonhub_afspraakmakenT:after{position:absolute;display:block;content:"e906";background-color:#bec2c4;width:37.5px;height:40px;top:0;right:0;font-family:'icomoon' !important;speak:none;font-style:normal;font-weight:normal;font-variant:normal;text-transform:none;line-height:1;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;text-align:center;line-height:42px;font-size:20px;color:#000;border-radius:0 3px 3px 0;cursor:pointer;z-index:99}#salonhub_headerS:focus-within:after,#salonhub_footerS:focus-within:after,#salonhub_afspraakmakenT:focus-within:after{z-index:9999}#salonhub_headerSM,#salonhub_footerSM,#salonhub_afspraakmakenSM{display:block;position:relative;width:100%;height:40px;border:solid 1px #bec2c4;border-radius:3px;background:transparent;z-index:9999;margin:0;cursor:pointer;z-index:999}#salonhub_headerSM:focus,#salonhub_footerSM:focus,#salonhub_afspraakmakenSM:focus{width:100%}#salonhub_footer{display:inline-block;margin-left:13px}#salonhub_footerB{display:inline-block;width:30%;vertical-align:middle;margin:0;min-width:180px}#salonhub_footerS{display:inline-block;margin-right:10px;vertical-align:middle;width:auto;min-width:220px}.container{max-width:960px;margin:0 auto}.row{width:100%}.row.narrow{max-width:300px;margin:0 auto}h2{font-family:'Playfair Display',serif;color:#443e3f}p{font-family:'Poppins',sans-serif;font-weight:400;color:#746b6c}.text-center{text-align:center !important}
</style>
<div class="container">
  <div class="row text-center">
    <img src=" data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAH0AAACZCAMAAAA1i8WDAAADAFBMVEVMaXH////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////QLTT///9tbnF/gILusbP29vbk5OWIiYvZVFqbm57WRk6SkpXt7e739/fjf4X64+TliY/wu77xv8H//v71z9HqnaJ/gIPb29z///94eXzsp6v9/f3y8vJ2d3n8/PxwcXRub3K3t7nusbT87/DfbXOio6X65eb88PHwuLr5+flvcHNyc3a/wMH09PTd3d6ZmZt6e37roKP++vrJycqNjpCMjY9+foHu7++TlJbdZmz89PTUPEPeaW/YTlX76+zqnaGHh4rCw8SPkJLAwMKkpafg4ODn5+fw8PD88vPhc3nmjJL0y8766On0zdDpmJ3gcXednqDGx8iEhYehoaN8fYB0dXi9vb6vsLKDg4bT1NXi4uPSNTzbXWT10dPUPkXie4L99fbsqq3319nok5jYUVetrq+AgYOKi43TOECfn6HOz9DQ0dK+v8DY2NnIyMq5urvRMTm8vL6ztLXrpanbW2H21tfieX7WR0/++/vVQUn43t/aV17kgojjfYTZU1nokpfgcHX20tXtsbTusrX54uTzyMvzxsntra/qm6D32drzysyQkZOvr7Hs7O2nqKrDw8Wqq63Ly8z7+/uVlpjFxcbXTFPp6erk5OTTOkHmiY/qpKfrqKvhdnzywsT43N3olZr54OH99/ftr7PyxMbxwcLvtrjV1da4uLrg4OHt7e2LjI/32dvwvb/cYWjolpv+/Pznj5TWSVD99vbq6urlh43cY2rtrK/vtLexsrNkIU4BAAAAR3RSTlMA+3rpF/gDASPd2+8F5L0w8rc+Gf0q2ImgNHQTTVci8Atsk5jrf6jS5vUcwIGrsa53us1H+VxCxpyyjjglH/Nu9uJlxJdPhf/x/RkAAAjx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" alt="Care For Hair logo">
  </div>
  <div class="row text-center">
    <p>Op dit moment wordt er onderhoud uitgevoerd aan de website.</p>
    <p>Probeer het over 5 minuten weer. Onze excuus voor het ongemak!</p>
    <p>Reserveren kan nog steeds via het selectie menu hier onder.</p>
  </div>
  <div class="row narrow">
    <h2 class="text-center">Afspraak maken</h2>
    <div id="salonhub_afspraakmaken"></div>
  </div>
</div>
