       //PREGUNTAS A1
       var preguntasA1 = document.querySelectorAll('.campoA1')
       var pregunta1 = document.getElementById('A-1-1')
       var subA1 = document.querySelectorAll('.subA1')
       var totalA1 = document.getElementById('totalA1');
   
       //PREGUNTAS A2
       var preguntasA2 = document.querySelectorAll('.campoA2')
       var totalA2 = document.getElementById('totalA2');
   
       //SUBTOTAL A
       var subtotalA = document.getElementById('subtotalA');
   
       
       //Preguntas B1
       var preguntasB1 = document.querySelectorAll('.campoB1');
       var totalB1 = document.getElementById('totalB1');
       
       //preguntasB2
       var preguntasB2 = document.querySelectorAll('.campoB2');
       var totalB2 = document.getElementById('totalB2');
       var subtotalB = document.getElementById('subtotalB');
       //Pregunta C
       var preguntasC = document.querySelectorAll('.campoC');
       var totalC = document.getElementById('totalC');
       var subtotalC = document.getElementById('subtotalC');
   
       //Preguntas D
       var preguntasD = document.querySelectorAll('.campoD');
       var totalD = document.getElementById('totalD');
       var subtotalD = document.getElementById('subtotalD');
       //total final
       var totalF = document.getElementById('totalF');
   
       //preguntas pertenecientes a la pregunta 1
       subA1.forEach(i => {
           i.addEventListener('keyup', function() {
               let sub = 0;
               subA1.forEach(j => {
                   if (j.value != '') {
                       sub += parseFloat(j.value)
                   }
               })
               pregunta1.value = sub / 4;
               updateTotalA1();
           })
       })
   
       //Eventos de preguntas A
       preguntasA1.forEach(item => {
           item.addEventListener('keyup', updateTotalA1)
       })
   
       preguntasA2.forEach(item => {
           item.addEventListener('keyup', updateTotalA2)
       })
       //Evento de prguntas B
       preguntasB1.forEach(item => {
           item.addEventListener('keyup', updateTotalB1)
       })
   
       preguntasB2.forEach(item => {
           item.addEventListener('keyup', updateTotalB2)
       })
       //Evento de prguntas C
       preguntasC.forEach(item => {
           item.addEventListener('keyup', updateTotalC)
       })
       //Evento de preguntas D
       preguntasD.forEach(item => {
           item.addEventListener('keyup', updateTotalD)
       })
   
       function updateTotalA1() {
           let total = 0;
           preguntasA1.forEach(pregunta => {
   
               if (pregunta.value != '') {
                   total += parseFloat(pregunta.value);
               }
           })
           totalA1.value = (total / 5) * 0.1
           let inner = parseFloat(totalA1.value) + parseFloat(totalA2.value);
   
           subtotalA.innerHTML = inner;
           totalF.innerHTML = parseFloat(subtotalA.innerHTML) + parseFloat(subtotalB.innerHTML)
   
       }
   
       function updateTotalA2() {
           let total = 0;
           preguntasA2.forEach(pregunta => {
   
               if (pregunta.value != '') {
                   total += parseFloat(pregunta.value);
               }
           })
           totalA2.value = (total / 10) * 0.1
           let inner = parseFloat(totalA1.value) + parseFloat(totalA2.value);
           subtotalA.innerHTML = inner;
           totalF.innerHTML = parseFloat(subtotalA.innerHTML) + parseFloat(subtotalB.innerHTML)
   
   
       }
       function updateTotalB1() {
           let total = 0;
           preguntasB1.forEach(pregunta => {
   
               if (pregunta.value != '') {
                   total += parseFloat(pregunta.value);
               }
           })
           totalB1.value = (total / 6) * 0.25
           let inner = parseFloat(totalB1.value) + parseFloat(totalB2.value);
   
           subtotalB.innerHTML = inner;
           totalF.innerHTML = parseFloat(subtotalA.innerHTML) + parseFloat(subtotalB.innerHTML) + parseFloat(subtotalC.innerHTML) + parseFloat(subtotalD.innerHTML);
           
   
       }
       function updateTotalB2() {
           let total = 0;
           preguntasB2.forEach(pregunta => {
   
               if (pregunta.value != '') {
                   total += parseFloat(pregunta.value);
               }
           })
           totalB2.value = (total / 16) * 0.35
           let inner = parseFloat(totalB1.value) + parseFloat(totalB2.value);
   
           subtotalB.innerHTML = inner;
           totalF.innerHTML = parseFloat(subtotalA.innerHTML) + parseFloat(subtotalB.innerHTML)  + parseFloat(subtotalC.innerHTML) + parseFloat(subtotalD.innerHTML);
   
       }
   
       function updateTotalC() {
           let total = 0;
           preguntasC.forEach(pregunta => {
   
               if (pregunta.value != '') {
                   total += parseFloat(pregunta.value);
               }
           })
           totalC.value = (total / 1) * 0.1
           let inner = parseFloat(totalC.value)
   
           subtotalC.innerHTML = inner;
           totalF.innerHTML = parseFloat(subtotalA.innerHTML) + parseFloat(subtotalB.innerHTML) + parseFloat(subtotalC.innerHTML) + parseFloat(subtotalD.innerHTML);
   
       }
       function updateTotalD() {
           let total = 0;
           preguntasD.forEach(pregunta => {
   
               if (pregunta.value != '') {
                   total += parseFloat(pregunta.value);
               }
           })
           totalD.value = (total / 2) * 0.1
           let inner = parseFloat(totalD.value)
   
           subtotalD.innerHTML = inner;
           totalF.innerHTML = parseFloat(subtotalA.innerHTML) + parseFloat(subtotalB.innerHTML) + parseFloat(subtotalC.innerHTML) + parseFloat(subtotalD.innerHTML);
   
       }

       btnsave.addEventListener('click', ()=>{
        Swal.fire({
            title: 'Guardar',
            text: "¿Seguro desea guardar los cambios?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Si, guardar',
            cancelButtonText: 'cancelar',
            cancelButtonColor: '#d33'
          }).then((result) => {
              if (result.isConfirmed) {
                console.log($('#cuimedform').serialize())

                // $.ajax({
                //     url: "../config/save-nota3.php",
                //     type: "post",
                //     data: $('#cuimedform').serialize(),
              
                //     //resultado postivo de la confirmacion
                //     success: function (res) {
                //       //Verificaion de campos vacios
                //      if(res == 'ok'){
                //         window.history.back();
                //      }
                //      else if( res == 'error'){
                //         console.log(res)
                //      }
                //      else if( res == 'NaN'){
                //         Swal.fire({
                //             title: 'Incorrecto',
                //             text: "Por favor verifique los campos que desea guardar, solo se permiten valores numericos",
                //             icon: 'warning',
                //             confirmButtonColor: '#3085d6',
                //             confirmButtonText: 'Ok',
                //           })
                //      }
                //     }
                // })
               
            }
          })
    })