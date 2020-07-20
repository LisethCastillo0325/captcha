function confirmDelete(idcaptcha) {

    var url =document.getElementById("url").value;

    swal({
        title: "Atención!!!",
        text: "¿Esta seguro de eliminar el registro?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Eliminar!",
        cancelButtonText: "Cancelar!",

    }).then(result => {
        //swal("Eliminado!", "Su Registro ha sido eliminado.", "success");
        if (result.value) {

            //window.location.href="http://localhost/captchamvc/captcha/eliminar/"+idcaptcha;
            $.post(url+"captcha/eliminar/" + idcaptcha);
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



function generarCaptcha(){

    /*se obtienen los campos identificados por el nombre*/
    var titulo     = document.fcaptcha.titulo.value;
    var url_origen = document.fcaptcha.url_origen.value;

    if(titulo =='' || titulo=='undefined'){
        alerta("error","Error",'Debe ingresar el Título');
       return true;
    }

    var link_1 =document.fcaptcha.link_1;
    var link_2 =document.fcaptcha.link_2;
    var link_3 =document.fcaptcha.link_3;

    /*se arma el array general*/

    var captcha = {
        'titulo' : titulo,
        'url_origen' : url_origen,
        'links' : {
            'linkUno': [],
            'linkDos': [],
            'linkTres':[]
        }
    }


    /*se arma cada uno de los array para almacenar la informacion de cada uno de los links*/
    var linkUno = [];
    var linkDos = [];
    var linkTres = [];

    var i;
    for (i=0;i<document.fcaptcha.link_1.length;i++){
        if(document.fcaptcha.link_1[i].value){
            linkUno.push(document.fcaptcha.link_1[i].value);
        }
    }

    for (i=0;i<document.fcaptcha.link_2.length;i++){

        if(document.fcaptcha.link_2[i].value)
            linkDos.push(document.fcaptcha.link_2[i].value);
    }
    for (i=0;i<document.fcaptcha.link_3.length;i++){

        if(document.fcaptcha.link_3[i].value){
            linkTres.push(document.fcaptcha.link_3[i].value);
        }
    }


    if(linkUno =='' && linkDos =='' && linkTres ==''){
        alerta("error","Error",'Debe ingresar como minimo una Dirección url');
        return true;
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
        success: function(data) {

            resultado = JSON.parse(data);

           var url_captcha = document.getElementById("urlVercaptcha").value + ""+ resultado.data.captcha;

            if(resultado){
                if(! resultado.OK){
                    alerta("error","Error",resultado.mensaje);
                }else{
                    document.getElementById('url_captcha_text').value = url_captcha;

                    alerta("success","Registro Generado satisfactoriamente!","");
                }
            }

        },
        error: function() {
            console.error("No es posible completar la operación");
        }
    });
}

$(document).ready(function(){
    var i=1;
    $('#add_1').click(function(){
        i++;
        //$('#dynamic_field_1').append('<tr id="row'+i+'"><td></td><td><input type="text" name="link_1" placeholder="Ingrese Direccioó Url" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        $('#dynamic_field_1').append('<div class="row mt-1" id="row_1_'+i+'"><div class="col"> </div><div class="col"><input type="text" name="link_1" placeholder="Ingrese Dirección Url" class="form-control name_list" /></div><div class="col"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" data-toggle="tooltip" data-placement="right" title="Quitar">X</button></div></div>');
    });

    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        $('#row_1_'+button_id+'').remove();
    });

});

$(document).ready(function(){
    var i=1;
    $('#add_2').click(function(){
        i++;
        //$('#dynamic_field_2').append('<tr id="row'+i+'"><td></td><td><input type="text" name="link_2" placeholder="Ingrese Direccioó Url" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_2">X</button></td></tr>');
        $('#dynamic_field_2').append('<div class="row mt-1" id="row_2_'+i+'"><div class="col"> </div><div class="col"><input type="text" name="link_2" placeholder="Ingrese Dirección Url" class="form-control name_list" /></div><div class="col"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_2" data-toggle="tooltip" data-placement="right" title="Quitar">X</button></div></div>');

    });

    $(document).on('click', '.btn_remove_2', function(){
        var button_id = $(this).attr("id");
        $('#row_2_'+button_id+'').remove();
    });

});

$(document).ready(function(){
    var i=1;
    $('#add_3').click(function(){
        i++;
        //$('#dynamic_field_3').append('<tr id="row'+i+'"><td></td><td><input type="text" name="link_2" placeholder="Ingrese Direccioó Url" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_3">X</button></td></tr>');
        $('#dynamic_field_3').append('<div class="row mt-1" id="row_3_'+i+'"><div class="col"> </div><div class="col"><input type="text" name="link_3" placeholder="Ingrese Dirección Url" class="form-control name_list" /></div><div class="col"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_3" data-toggle="tooltip" data-placement="right" title="Quitar">X</button></div></div>');
    });

    $(document).on('click', '.btn_remove_3', function(){
        var button_id = $(this).attr("id");
        $('#row_3_'+button_id+'').remove();
    });

});



function modificarCaptcha(){

    /*se obtienen los campos identificados por el nombre*/
    var titulo     = document.fcaptcha.titulo.value;
    var captcha    = document.fcaptcha.captcha.value;
    var url_origen = document.fcaptcha.url_origen.value;

    if(titulo =='' || titulo=='undefined'){
        alerta("error","Error",'Debe ingresar el Título');
        return true;
    }

    /*se arma el array general*/

    var captcha = {
        'titulo' : titulo,
        'captcha' : captcha,
        'url_origen' : url_origen,
        'links' : {
            'linkUno': [],
            'linkDos': [],
            'linkTres':[]
        }
    }


    /*se arma cada uno de los array para almacenar la informacion de cada uno de los links*/
    var linkUno = [];
    var linkDos = [];
    var linkTres = [];

    var i=0;

    /*link 1*/
    if(document.fcaptcha.link_1.length >0){

        for (i=0;i<document.fcaptcha.link_1.length;i++){

            if(document.fcaptcha.link_1[i].value){
                linkUno.push(document.fcaptcha.link_1[i].value);
            }
        }
    }else if(document.fcaptcha.link_1.value !='') {
        linkUno.push(document.fcaptcha.link_1.value);
    }

    /*link 2*/
    if(document.fcaptcha.link_2.length >0){


        for (i=0;i<document.fcaptcha.link_2.length;i++){

        if(document.fcaptcha.link_2[i].value){
            linkDos.push(document.fcaptcha.link_2[i].value);
        }
    }
    }else if(document.fcaptcha.link_2.value !='') {
        linkDos.push(document.fcaptcha.link_2.value);
    }

    /*link 3*/
    if(document.fcaptcha.link_3.length >0){
        for (i=0;i<document.fcaptcha.link_3.length;i++){

            if(document.fcaptcha.link_3[i].value){
                linkTres.push(document.fcaptcha.link_3[i].value);
            }
        }

    }else if(document.fcaptcha.link_3.value !=''){
        linkTres.push(document.fcaptcha.link_3.value);
    }



    if(linkUno =='' && linkDos =='' && linkTres ==''){
        alerta("error","Error",'Debe ingresar como minimo una Dirección url');
        return true;
    }
    /*se llena el array principal con la informacion los links*/

    captcha.links.linkUno  = linkUno;
    captcha.links.linkDos  = linkDos;
    captcha.links.linkTres = linkTres;


    var url =document.getElementById("url").value;

    console.log(captcha);

    $.ajax({
        type: 'POST',
        url: url+"captcha/modificarCaptcha",
        data : {
            idcaptcha: captcha,
        },
        async: true,
        success: function(data) {

            resultado = JSON.parse(data);
            if(resultado){
                if(! resultado.OK){
                    alerta("error","Error",resultado.mensaje);
                }else{
                    alerta("success","Registro Actualizado satisfactoriamente!","");
                }
            }

        },
        error: function() {
            alerta("error","No es posible completar la operación!","");

            console.error("No es posible completar la operación");
        }
    });
}

function alerta(tipo, titulo, mensaje){
    swal({
        title: titulo,
        text: mensaje,
        type: tipo
    });
}

function alertaProgressBar(texto, tiempo){
    // ejemplo: https://sweetalert2.github.io/
    return Swal.fire({
        title: texto,
        timer: tiempo,
        timerProgressBar: true,
        onBeforeOpen: function() {
          Swal.showLoading();
        }
    });
}

function verCaptcha() {
    var url_captcha = document.getElementById('url_captcha_text').value;
    window.open (url_captcha);
}

function refrescarPagina() {
    //alertaProgressBar('Cargando...', 500).then(function(){
        location.reload();
    //});
}