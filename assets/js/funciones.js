/*document.getElementById('prioridadTodas').addEventListener('click', filtrarPrioridad, false);
document.getElementById('prioridadBaja').addEventListener('click', filtrarPrioridad, false);
document.getElementById('prioridadMedia').addEventListener('click', filtrarPrioridad, false);
document.getElementById('prioridadAlta').addEventListener('click', filtrarPrioridad, false);

function filtrarPrioridad(e) {
    if (!e) {
        e = window.event;
    }

    if (e.target.id=="prioridadTodas"){
        document.getElementById('rellenoIncidencias').innerHTML = "hello";
    }


}*/

$(document).ready(function(){

    var base_url = 'http://localhost/Proyecto/';


    $("#botonEnviar").click(function(){
        var input_valor = $("#mensajeEnviar").val();

        $.ajax({
            type: 'POST',
            url: base_url + 'index.php/Chat/abrirChatUsuario',
            data: {input_valor: input_valor },
            dataType: "json",
            success: function(resp){             
              $("#traerMensaje").append(resp.html);
            }
        });
    });

});
