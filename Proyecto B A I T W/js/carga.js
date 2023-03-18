//window.onload = function(){
  //  $('#load').fadeOut();
   // setTimeout( function() { window.location.href = "./inicio.html"; }, 2000 );
//}

    window.addEventListener("load", function(){
        document.getElementById("loader").classList.toggle("loader2");
       // setTimeout( function() { window.location.href = "./inicio.html"; }, 1000 );
        window.location.href = "./inicio.html";
  }, 5000)

 /* setTimeout(function(){
    window.addEventListener("load", function(){
      document.getElementById("loader").classList.toggle("loader2");
      window.location.href = "./inicio.html";
    }, 11000)
 })*/