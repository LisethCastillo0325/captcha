function validarLogin(){
    var datosform = $("#frm-login").serialize();
    $.ajax({
        type: 'POST',
        url: $("#url").val()+'login/validar/',
        data: datosform,
        success: function(data){
           resultado = JSON.parse(data);
           if(resultado){
                if(! resultado.OK){
                    alerta("error","Error",resultado.mensaje);
                }else{
                    if(resultado.data.length === 0){
                        alerta("warning","Usuario y/o contraseña incorrectos!","");
                    }else{
                        location.href = $("#url").val();
                    }
                }
           }
           console.log(resultado);
        },
        error: function(data){
            alerta("error","Error","Problemas al tratar de enviar el formulario");
        }
    });
    return false;
}

function alerta(tipo, titulo, mensaje){
    swal({
        title: titulo,
        text: mensaje,
        type: tipo
    });
}

