var clipboard = new Clipboard('.portapapeles');
var divAlerta = document.getElementById('alerta');



clipboard.on('success', function(e) {
    exito();
    mostrarAlerta();
});

clipboard.on('error', function(e) {
	// Algo no salio como debia
    fracaso();
    mostrarAlerta();
});



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

function ocultarAlerta() {
    divAlerta.innerText = '';
    divAlerta.classList.remove('alert-success', 'alert-warning', 'alert-danger', 'visible');
    divAlerta.classList.add('invisible');
}