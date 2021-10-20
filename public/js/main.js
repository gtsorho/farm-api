function toggleSignUp() {
    var x = document.getElementById("signUp");
    var y = document.getElementById("signIn");

    x.style.display = "block";
    y.style.display = "none";

    // if (x.style.display === "none") {
    //   x.style.display = "block";
    //   y.style.display = "none";
    // } else {
    //   x.style.display = "none";
    // }
  }
  function togglelogIn() {
    var x = document.getElementById("signUp");
    var y = document.getElementById("signIn");

    x.style.display = "none";
    y.style.display = "block";


  }
  function onbtn(){
      var on = document.getElementById("onbtn");
      var off = document.getElementById("offbtn");

      off.setAttribute('class', 'button');
      on.setAttribute('class','button is-success')

  }
  function offbtn(){
    var on = document.getElementById("onbtn");
    var off = document.getElementById("offbtn");

    off.setAttribute('class', 'button is-dark');
    on.setAttribute('class','button')

}
function userpro(){
    var userpro = document.getElementById("userpro");
    var userset = document.getElementById("userset");
    var notification = document.getElementById("notification");
    var controlcenter= document.getElementById("controlcenter");

    userpro.style.display = "block";
    userset.style.display = "none";
    notification.style.display = "none";
    controlcenter.style.display = "none";

     document.getElementById("profile").setAttribute('class','panel-block is-active');
     document.getElementById("settings").setAttribute('class','panel-block ');
     document.getElementById("notes").setAttribute('class','panel-block ');
     document.getElementById("center").setAttribute('class','panel-block ');

}
function userset(){
    var userpro = document.getElementById("userpro");
    var userset = document.getElementById("userset");
    var notification = document.getElementById("notification");
    var controlcenter= document.getElementById("controlcenter");

    userpro.style.display = "none";
    userset.style.display = "block";
    notification.style.display = "none";
    controlcenter.style.display = "none";

     document.getElementById("profile").setAttribute('class','panel-block ');
     document.getElementById("settings").setAttribute('class','panel-block is-active');
     document.getElementById("notes").setAttribute('class','panel-block ');
     document.getElementById("center").setAttribute('class','panel-block ');
}
function notification(){
    var userpro = document.getElementById("userpro");
    var userset = document.getElementById("userset");
    var notification = document.getElementById("notification");
    var controlcenter= document.getElementById("controlcenter");

    userpro.style.display = "none";
    userset.style.display = "none";
    notification.style.display = "block";
    controlcenter.style.display = "none";

    document.getElementById("notes").setAttribute('class','panel-block is-active');
    document.getElementById("profile").setAttribute('class','panel-block ');
    document.getElementById("settings").setAttribute('class','panel-block ');
    document.getElementById("center").setAttribute('class','panel-block ');
}
function controlcenter(){
    var userpro = document.getElementById("userpro");
    var userset = document.getElementById("userset");
    var notification = document.getElementById("notification");
    var controlcenter= document.getElementById("controlcenter");

    userpro.style.display = "none";
    userset.style.display = "none";
    notification.style.display = "none";
    controlcenter.style.display = "block";

    document.getElementById("center").setAttribute('class','panel-block is-active');
    document.getElementById("profile").setAttribute('class','panel-block ');
    document.getElementById("settings").setAttribute('class','panel-block ');
    document.getElementById("notes").setAttribute('class','panel-block ');
    
}
function chartbtn(){
    var chart = document.getElementById("chartbtn");
    var ndvi = document.getElementById("ndvibtn");
    var avg = document.getElementById("avgbtn");

    ndvi.setAttribute('class', 'button');
    chart.setAttribute('class','button is-success')
    avg.setAttribute('class','button');

}
function ndvibtn(){
  var ndvi = document.getElementById("ndvibtn");
  var chart = document.getElementById("chartbtn");
  var avg = document.getElementById("avgbtn");

  ndvi.setAttribute('class', 'button is-danger');
  chart.setAttribute('class','button')
  avg.setAttribute('class','button');

}
function avgbtn(){
  var ndvi = document.getElementById("ndvibtn");
  var chart = document.getElementById("chartbtn");
  var avg = document.getElementById("avgbtn");

  ndvi.setAttribute('class', 'button');
  chart.setAttribute('class','button')
  avg.setAttribute('class','button is-primary');

}

$('#toggle > button').click(function() {
  var ix = $(this).index();
  
  $('#chartSec').toggle( ix === 0 );
  $('#ndviSec').toggle( ix === 2 );
  $('#averageSec').toggle( ix === 1 );
});
var modalDlg = document.querySelector('#image-modal');
modalDlg.classList.add('is-active');