///////
// Auxiliares para mostrar y ocultar mensajes
///////
var divAlerta = document.getElementById('alerta');

function copiarAlPortapapeles() {

    var aux = document.createElement("input");
    aux.setAttribute("value", document.getElementById('url_captcha').innerHTML);
    document.body.appendChild(aux);
    aux.select();

    try {
        var res = document.execCommand('copy'); //Intento el copiado
        if (res)
            exito();
        else
            fracaso();

        mostrarAlerta();
    }
    catch(ex) {
        excepcion();
    }
    document.body.removeChild(aux);
}

function exito() {
    divAlerta.innerText = '¡¡Código copiado al portapapeles!!';
    divAlerta.classList.add('alert-success');
}

function fracaso() {
    divAlerta.innerText = '¡¡Ha fallado el copiado al portapapeles!!';
    divAlerta.classList.add('alert-warning');
}
function mostrarAlerta() {
    divAlerta.classList.remove('invisible');
    divAlerta.classList.add('visible');
    setTimeout(ocultarAlerta, 1500);
}
function excepcion() {
    divAlerta.innerText = 'Se ha producido un error al copiar al portapaples';
    divAlerta.classList.add('alert-danger');
}
function ocultarAlerta() {
    divAlerta.innerText = '';
    divAlerta.classList.remove('alert-success', 'alert-warning', 'alert-danger', 'visible');
    divAlerta.classList.add('invisible');
}