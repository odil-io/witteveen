

// Dit hele script moet opnieuw en beter geschreven worden. Dingen zijn omslachtig en slordig.
// Typisch copy/paste werk...

//Formulas:
//New height = new width / (original width / original height).
//New width = (original width / original height) * new height.
$(document).ready(function(){

  //Initial values:
  var initialWidth = 1920,
  initialHeight = 1080,
  newWidth,
  newHeight;

  var r = getGreatestCommonDivisor(initialWidth, initialHeight);
  // document.write ("<pre>");
  // document.write ("Dimensions = ", initialWidth, " x ", initialHeight, "<br>");
  // document.write ("Gcd        = ", r, "<br>");
  // document.write ("Aspect     = ", initialWidth/r, ":", initialHeight/r);
  // document.write ("</pre>");

  $("#initial-width").val(initialWidth);
  $("#initial-height").val(initialHeight);

  //Get new values:
  function getValues(){
    initialWidth = $("#initial-width").val();
    initialHeight = $("#initial-height").val();
    newWidth = $("#new-width").val();
    newHeight = $("#new-height").val();
  };

  //Aspect ratio:
  function getAspectRatio(){
    //Formula: "Aspect Ratio = Width / Height".
    return aspectRatio = initialWidth/initialHeight;
  };

  function getGreatestCommonDivisor(a, b){
      return (b == 0) ? a : getGreatestCommonDivisor(b, a%b);
  };

  //Get new height:
  $("#new-width").on("change keyup", function(){
    //Refresh data.
    getValues();
    getAspectRatio();
    //Formula: "Height = Width / Aspect Ratio".
    newHeight = Math.round(newWidth/aspectRatio);
    //Output:
    $("#new-height").val(newHeight);
  });

  //Get new width:
  $("#new-height").on("change keyup", function(){
    //Refresh data.
    getValues();
    getAspectRatio();
    //Formula: "Width = Aspect Ratio * Height".
    newWidth = Math.round(newHeight*aspectRatio);
    //Output:
    $("#new-width").val(newWidth);
  });

  //Reset:
  $("#initial-width, #initial-height").on("change keyup", function(){
    //Output:

    var ratio = getGreatestCommonDivisor( $("#initial-width").val(), $("#initial-height").val() );

    $("#new-width").val("");
    $("#new-height").val("");

    $("#ratio").html(initialWidth/ratio + ":" + initialHeight/ratio)
  });

});
