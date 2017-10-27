$( document ).ready(function() {
  console.log("Lista la cuenta regresiva");
  var timer1, timer2;
  // waiting time in minutes
  var wait=1;
  timer1=setTimeout(alertUser, (10000*wait));
  timer2=setTimeout(logout, (20000*wait));

  $(document).keypress(function() {
    resetTimer();
  });

  $(document).mousemove(function() {
    resetTimer();
  });

  function resetTimer()
  {
     clearTimeout(timer1);
     clearTimeout(timer2);

     timer1=setTimeout(alertUser, (10000*wait));
     timer2=setTimeout(logout, (21000*wait));

     console.log("se reinicio cuenta");
  }

  function alertUser()
  {
    var timer = 10, // timer in seconds
    isTimerStarted = false;
       (function customSwal() {
          if (timer > 0 ){
            swal({
                title: "Se ha detectado inactivad",
                content: {
                  element: "input",
                  attributes: {
                    placeholder: "Ingresa tu contraseña",
                    type: "password",
                    id: "password"
                  },
                },
                text: "El sistema cerrará su sesión automáticamente en " + timer + " " + "segundos ",
                timer: timer * 1000,
                closeOnEsc: false,
                closeOnClickOutside: false,
                button: false,
            });
            timer--;
            setTimeout(customSwal, 1000);
            $("#password").focusin(function() {
              timer = 0;
              console.log("Se va a ingresar contraseña");
            });
          }
       })();
  }

  function logout()
  {
    //console.log("Cerró sesión");
    window.location.href='/logout';
  }
});
