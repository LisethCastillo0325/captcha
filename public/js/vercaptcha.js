
var idcaptcha;
var contadorLinksBoton1 = 0;
var contadorLinksBoton2 = 0;
var contadorLinksBoton3 = 0;
var finalLinksBoton1 = false;
var finalLinksBoton2 = false;
var finalLinksBoton3 = false;
var agregarbotones = false;

function validarCaptcha(){
    idcaptcha     = document.getElementById("idcaptcha").value;
    var valorUno  = document.getElementById("valorUno").value;
    var valorDos  = document.getElementById("valorDos").value;
    var valorTres = document.getElementById("valorTres").value;
    var captchaValidar = valorUno+'-'+valorDos+'-'+valorTres;

    if((valorUno).length === 0 || (valorDos).length === 0 || (valorTres).length === 0){
        alerta('info','Debes completar los campos!','');
    }else{
        if(captchaValidar !== idcaptcha){
            alerta('warning','Aún no logras resolver el captcha!','Intenta de nuevo.');
        }else{
            habilitarBotones();
        }
    }
}

function habilitarBotones(){
    if(agregarbotones === false){
        var boton1 = "<button id='linkUno' class='btn btn-dark ml-3 boton-link' type='button'>Link 1</button>";
        var boton2 = "<button id='linkDos' class='btn btn-dark ml-3 boton-link' type='button'>Link 2</button>";
        var boton3 = "<button id='linkTres' class='btn btn-dark ml-3 boton-link' type='button'>Link 3</button>";
        $("#div-botones").addClass('animated fadeIn');
        $("#div-botones").append(boton1, boton2, boton3);
        inhabilitarBoton('validarCampos');
        agregarEventoABotones();
    }
}

function agregarEventoABotones(){
    agregarbotones = true;
    agregarEventoABoton('linkUno');
    agregarEventoABoton('linkDos');
    agregarEventoABoton('linkTres');
}

function agregarEventoABoton($id){
    document
    .getElementById($id)
    .addEventListener('click', function(){
        obtenerLinksBotones($id);
    });
}

function obtenerLinksBotones(keyLink){
    if(finalLinksBoton1 === false || finalLinksBoton2 === false || finalLinksBoton3 === false){
        $.post("http://localhost/captchamvc/captcha/apiObtenerCaptcha/", {idcaptcha: idcaptcha},
            function (data) {
                manejadorLinks(keyLink, data['data']['links'][0][keyLink]);
            }, "json");
    }
}

function manejadorLinks(botonID, links){
    console.log('links: ', links);

    switch (botonID) {
        case 'linkUno':
            if(links.length <= contadorLinksBoton1){
                finalLinksBoton1 = true;
                inhabilitarBoton(botonID);
            }else{
                abrirLink(links[contadorLinksBoton1]);
                contadorLinksBoton1++;
            }
            break;
        case 'linkDos':
            if(links.length <= contadorLinksBoton2){
                finalLinksBoton2 = true;
                inhabilitarBoton(botonID);
            }else{
                abrirLink(links[contadorLinksBoton2]);
                contadorLinksBoton2++;
            }
            break;
        case 'linkTres':
            if(links.length <= contadorLinksBoton3){
                finalLinksBoton3 = true;
                inhabilitarBoton(botonID);
            }else{
                abrirLink(links[contadorLinksBoton3]);
                contadorLinksBoton3++;
            }
            break;
        default:
            break;
    }
}

function abrirLink(url){
    // Abrir nuevo tab
    var win = window.open(url, '_blank');
    // Cambiar el foco al nuevo tab 
    win.focus();
}

function inhabilitarBoton(id){
    $('#'+id).attr("disabled", true);
}

function alerta(tipo, titulo, mensaje){
    swal({
        title: titulo,
        text: mensaje,
        type: tipo
    });
}

