
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


function adiccionarCamposLinkUno() {

    var campos_max          = 10;   //max de 10 campos

    var x = 3;
    $('#add_btn_1').click (function(e) {
        e.preventDefault();     //prevenir novos clicks
        if (x < campos_max) {
            $('#link_1').append('<div class="form-group">\
                                <input type="text" class="form-control form-control-sm" name="campo[]">\
                                <a href="#" class="remover_campo">Remover</a>\
                                </div>');
            x++;
        }
    });
    // Remover o div anterior
    $('#listas').on("click",".remover_campo",function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });
}

function adiccionarCamposLinkDos() {

    var campos_max          = 10;   //max de 10 campos

    var x = 3;
    $('#add_btn_2').click (function(e) {
        e.preventDefault();     //prevenir novos clicks
        if (x < campos_max) {
            $('#link_2').append('<div class="form-group">\
                                <input type="text" class="form-control form-control-sm" name="campo[]">\
                                <a href="#" class="remover_campo">Remover</a>\
                                </div>');
            x++;
        }
    });
    // Remover o div anterior
    $('#listas').on("click",".remover_campo",function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });
}


function adiccionarCamposLinkTres() {

    var campos_max          = 10;   //max de 10 campos

    var x = 3;
    $('#add_btn_3').click (function(e) {
        e.preventDefault();     //prevenir novos clicks
        if (x < campos_max) {
            $('#link_3').append('<div class="form-group">\
                                <input type="text" class="form-control form-control-sm" name="campo[]">\
                                <a href="#" class="remover_campo">Remover</a>\
                                </div>');
            x++;
        }
    });
    // Remover o div anterior
    $('#listas').on("click",".remover_campo",function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });
}