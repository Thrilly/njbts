var modal = document.getElementById('myModal');
var btn = document.getElementById("contact");
var btn2 = document.getElementById("contact2");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
btn2.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}




$(function() {

  var h = $(window).height();
  $("section#home-head").css("height", h);
  $("h2#home-title").css("margin-bottom", h/2.2).css("margin-top", h/2.2);

  function addLoadEvent(func) {
    var oldonload = window.onload;
    if (typeof window.onload != 'function') {
      window.onload = func;
    } else {
      window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
  }

  addLoadEvent(function() {
    $("#loading").fadeOut(1);
  });

  $(document).ready(function() {
        $("div.body").fadeIn(3000);
  });

});



$("div[id^='onglet-']").addClass("hidden");
$("#onglet-1").removeClass("hidden");
$("a[id^='btn-onglet-1'] span").addClass("active");

$("a[id^='btn-onglet-']").on("click",function(e){
  $("a[id^='btn-onglet-'] span").removeClass("active");
  var id = $(this).attr("id").replace("btn-onglet-","");
  $("#btn-onglet-" + id + " span").addClass("active");
  e.preventDefault();
  $("div[id^='onglet-']").addClass("hidden");
  $("#onglet-" + id).fadeIn(500).removeClass("hidden");
});

$("div[id^='xp-onglet-']").addClass("hidden");
$("#xp-onglet-1").removeClass("hidden");
$("a[id^='btn-xp-onglet-1'] span").addClass("active");

$("a[id^='btn-xp-onglet-']").on("click",function(e){
  $("a[id^='btn-xp-onglet-'] span").removeClass("active");
  var id = $(this).attr("id").replace("btn-xp-onglet-","");
  $("#btn-xp-onglet-"+id+" span").addClass("active");
  e.preventDefault();
  $("div[id^='xp-onglet-']").addClass("hidden");
  $("#xp-onglet-" + id).fadeIn(500).removeClass("hidden");
});

if ($(window).width() > 770){
  $(window).scroll(function(){
    var top = $(window).scrollTop();
    // $("section#home-head").css("height",offset);
    
       if ($(window).scrollTop()>1100){
          $(".navbar-inverse").css("background-color", "rgba(0, 0, 0, 1)");
       }else{
          $(".navbar-inverse").css("background-color", "rgba(20, 20, 20, 0)");
       }
       $("section#home-head").css("filter", "blur("+(top/40)+"px)");
       $("section#present").css("background-position", "0cm "+(-5+(top/70))+"cm");
       // $("section#inter").css("background-position", "0cm "+(-1+(top/-150))+"cm");
       // $("section#inter-2").css("background-position", "0cm "+(-8+(top/-150))+"cm");
    
  });
}else{
  $(".navbar-inverse").css("background-color", "rgba(25, 25, 25, 1)");
}



// $(function() {
//   var offset = $(window).offset();
//   alert(offset);

//   $( "*[id^=onglet-]" ).addClass("hidden");
//   $("#onglet-1").removeClass("hidden");
//   $("#btn-onglet-1").addClass("active");

// });

// $("*[id^=btn-onglet-]").on("click", function(){
//       $("*[id^=onglet-]").fadeIn(1);
// });

$(function() {
  var h = $(window).height();
  $( ".home" ).css("padding-top", (h/5)+"px");
  $( ".home" ).css("padding-bottom", (h/5)+"px");
  
});

$(document).ready(function(){
    var w = $(window).width();
    if (w>768){
      var n = $("#navbarproject").width();
      var u = $("#ulproject").width();
      var un = (n-u)*2;
      $("#ulproject").css("margin-left", un); 
    }
});

$("a[href^='#']").on("click",function(e){
  // alert($(this).attr('href'));
  $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top
  }, 1000);
});


function explode(){
  $("#loading").css("visibility", "hidden");
}

setTimeout(explode, 5000);
    
