//inputs
var inputs = document.querySelectorAll('input');

inputs.forEach(input => {
  input.addEventListener('click', () => {
    input.select()

  })

})




const btnsave = document.getElementById('btnsave');
const btncancel = document.getElementById('btncancel');

btnsave.addEventListener('click', () => {
  var nformulario = $('#nformulario').val();

  var ruta = nformulario == '#form-prom' ? '../config/save-nota.php' :
    nformulario == '#actform'     ? '../config/save-nota2.php' :
    nformulario == '#cuimedform'  ? '../config/save-nota3.php' :
    nformulario == '#cuimatform'  ? '../config/save-nota4.php' :
    nformulario == '#pradmform'   ? '../config/save-nota5.php' :
    nformulario == '#adultmform'  ? '../config/save-nota6.php' :
    nformulario == '#praintform'  ? '../config/save-nota7.php' :
    nformulario == '#fivform'     ? '../config/save-nota8.php' : '../config/save-nota9.php';

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
      // console.log(ruta)
      // console.log(nformulario)
      $.ajax({
        url: ruta,
        type: "post",
        data: $(nformulario).serialize(),

        //resultado postivo de la confirmacion
        success: function (res) {
          // Verificaion de campos vacios
          if (res == 'ok') {
            window.history.back();
          }
          else if (res == 'error') {
            console.log(res)
          }
          else if (res == 'NaN') {
            Swal.fire({
              title: 'Incorrecto',
              text: "Por favor verifique los campos que desea guardar, solo se permiten valores numericos",
              icon: 'warning',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Ok',
            })
          } else {
            console.log(res)
          }
        }
      })

    }
  })
})
btncancel.addEventListener('click', () => {
  window.history.back();
})





