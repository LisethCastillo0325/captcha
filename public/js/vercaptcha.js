
var resultado;

function validarCaptcha(){

    var idcaptcha = document.getElementById("idcaptcha").value;
    var valorUno  = document.getElementById("valorUno").value;
    var valorDos  = document.getElementById("valorDos").value;
    var valorTres = document.getElementById("valorTres").value;

    var captchaValidar = valorUno+'-'+valorDos+'-'+valorTres;

    if(captchaValidar !== idcaptcha){
        console.log('no son iguales');
    }else{
        console.log('si son iguales');

        habilitarBotones(idcaptcha);
    }
}


function habilitarBotones(idcaptcha){
    $.post("http://localhost/captchamvc/captcha/apiObtenerLinksCaptcha/", {idcaptcha: idcaptcha},
        function (data)
        {
            resultado = JSON.parse(data);
            console.log('dentro: ', resultado);
        });
    
    // necesito usar esta variable ya por fuera, para hacer el resto de la dinamica
    console.log('afuera: ', resultado);
}


function confirmDelete(idcaptcha) {

    swal({
        title: "Atención!!!",
        text: "¿Esta seguro de eliminar el registro?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Eliminar!",
        cancelButtonText: "Cancelar!",

    }).then(result => {
        swal("Eliminado!", "Su Registro ha sido eliminado.", "success");
        if (result.value) {

            //window.location.href="http://localhost/captchamvc/captcha/eliminar/"+idcaptcha;
            $.post("http://localhost/captchamvc/captcha/eliminar/" + idcaptcha);
            location.reload();

        } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
            swal("Cancelado", "Tu Registro esta seguro :)", "error");
        }
        //swal.closeModal();
    });
}