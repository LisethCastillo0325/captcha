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

    $('#link_1').append('<div class="form-group">\
                        <input type="text" class="form-control form-control-sm" name="link_1[]">\
                        <a href="#" class="remover_campo">Remover</a>\
                        </div>');
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

function generarCaptcha(){

    var nuevoCaptcha = generarIdCaptcha();
    //var jsonCaptcha = obtenerJsonCaptcha();

    /* se recorreo el Json de Captchas para ver que el captcha nuevo sea unico*/

console.log("nuevaao",obtenerJsonCaptcha());

   // var flag =false;
    for (var i in jsonCaptcha) {
        console.log("capt",jsonCaptcha[i].nameTable)
    }



    /*if (flag){
        jsonCaptcha.push(
            {"titulo":"The Avengers",
                "captcha":"1235-4568-XZWK",
                "fechaCreacion":"2020-07-11",
                "cantidadVisitas":15,
                "cantidadPaises":3,
                "urlCliente":"wwww.youtube.com",
                "links":[
                    {"linkUno":
                            ["wwww.google.com","wwww.youtube.com","wwww.facebook.com"],
                        "linkDos":
                            ["wwww.hotmail.com","wwww.instagram.com","wwww.elpis.com"],
                        "linkTres":["wwww.yahoo.com","wwww.mercadolibre.com","wwww.eltiempo.com"]
                    }
                ]
            }
        );
    }*/


}





function generarIdCaptcha(){

    letra = new Array("H", "R", "X", "Y", "Z", "W", "K");
    numero = new Array(0,1, 2, 3, 4, 5, 6, 7, 8, 9);

    var captcha1 = '';
    var captcha2 = '';
    var captcha3 = '';


    for (var i = 0; i < 4; i++) {
        elegido = Math.random() * 10;
        elegido = Math.floor(elegido);
        captcha1 = captcha1 + "" + numero[elegido];
    }

    for (var i = 0; i < 4; i++) {
        elegido = Math.random() * 10;
        elegido = Math.floor(elegido);
        captcha2 = captcha2 + "" + numero[elegido];
    }

    for (var i = 0; i < 4; i++) {
        elegido = Math.random() * 7;
        elegido = Math.floor(elegido);
        captcha3 = captcha3 + "" + letra[elegido];
    }

    var captcha = captcha1+"-"+captcha2+"-"+captcha3;

    return captcha;
}

function obtenerJsonCaptcha(){

    var url =document.getElementById("url").value;

    var jsonCaptcha= '';


    $.ajax({
        method: "POST",
        url: url+"captcha/apiObtenerJsonCaptcha",
        data : {
            idcaptcha:1,
        },
        success: function(respuesta) {

             jsonCaptcha = JSON.parse(respuesta);
            console.log("ssssss--",jsonCaptcha.data);
            return jsonCaptcha.data;

        },
        error: function() {
            console.error("No es posible completar la operación");
        }
    });
}