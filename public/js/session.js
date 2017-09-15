$( document ).ready(function() {
  var timer1, timer2;
      document.onkeypress=resetTimer;
      document.onmousemove=resetTimer;
      function resetTimer()
      {
         document.getElementById('question').style.display='none';
         clearTimeout(timer1);
         clearTimeout(timer2);
              // waiting time in minutes
          var wait=2;

         // alert user one minute before
          timer1=setTimeout(alertUser, (10000*wait)-1);

          // logout user
          timer2=setTimeout(logout, 10000*wait);
      }

      function alertUser()
      {
        var timer = 3, // timer in seconds
            isTimerStarted = false;

        (function customSwal() {
           if (timer > 0 ){
             swal({
                 title: "Han pasado tres minutos desde la última actividad en el sistema",
                 text: "El sistema cerrará su sesión automáticamente en " + timer + " " + "segundos ",
                 timer: timer * 1000,
                 closeOnEsc: false,
                 closeOnClickOutside: false,
                 showConfirmButton: false
             });
             if(timer) {
                 timer--;
                 setTimeout(customSwal, 1000);
             }
           }
           else {
             document.location.href = '/logout';
           }
        })();
      }

      function logout()
      {
          window.location.href='/logout';
      }

});
