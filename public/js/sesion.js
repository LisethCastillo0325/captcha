function cerrarSesion(){
    var datosform = $("#frm-login").serialize();
    $.ajax({
        type: 'POST',
        url: $("#url").val()+'login/cerrarSesion/',
        data: datosform,
        success: function(data){
            console.log(data);
           resultado = JSON.parse(data);
           if(resultado){
                if(! resultado.OK){
                    alerta("error","Error",resultado.mensaje);
                }else{
                    location.href = $("#url").val();
                }
           }
           console.log(resultado);
        },
        error: function(data){
            alerta("error","Error","Problemas al tratar de cerrar sesión");
        }
    });
    return false;
}