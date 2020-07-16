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
                        <input type="text" class="form-control form-control-sm" name="campo[]">\
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

    /*se obtienen los campos identificados por el nombre*/
    var link_1 =document.fcaptcha.link_1;
    var link_2 =document.fcaptcha.link_3.length;
    var link_3 =document.fcaptcha.link_3.length;

    /*se arma el array general*/

    var captcha = {
        'titulo' : 'Otra Prueba',
        'links' : [{
            'linkUno': "",
            'linkDos': "",
            'linkTres':""
        }]
    }


    /*se arma cada uno de los array para almacenar la informacion de cada uno de los links*/
    var linkUno = [];
    var linkDos = [];
    var linkTres = [];

    var i
    for (i=0;i<document.fcaptcha.link_1.length;i++){
        if(document.fcaptcha.link_1[i].value)
           linkUno.push(document.fcaptcha.link_1[i].value);
    }

    for (i=0;i<document.fcaptcha.link_1.length;i++){
        if(document.fcaptcha.link_2[i].value)
            linkDos.push(document.fcaptcha.link_2[i].value);
    }
    for (i=0;i<document.fcaptcha.link_1.length;i++){
        if(document.fcaptcha.link_3[i].value)
            linkTres.push(document.fcaptcha.link_3[i].value);
    }

    /*se llena el array principal con la informacion los links*/

    captcha.links.linkUno  = linkUno;
    captcha.links.linkDos  = linkDos;
    captcha.links.linkTres = linkTres;


    var url =document.getElementById("url").value;

    $.ajax({
        type: 'POST',
        url: url+"captcha/generarCaptcha",
        data : {
            idcaptcha: captcha,
        },
        async: true,
        success: function(respuesta) {

            console.log(respuesta);

        },
        error: function() {
            console.error("No es posible completar la operación");
        }
    });
}



