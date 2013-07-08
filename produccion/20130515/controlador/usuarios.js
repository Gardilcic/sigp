$(window).load(function() {

    $('#btn_entrar').click(function() {
        $('.mensajes').css('display', 'none');
        if ($('#nombre_usuario').val().length > 4 && $('#clave_usuario').val().length > 1) {
            $.ajax({
                type: "POST",
                url: "modelo/usuarios.php",
                data: {
                    funcion: "ValidarUsuario",
                    nombre: $('#nombre_usuario').val(),
                    clave: $('#clave_usuario').val()
                },
                success: function(datos) {
                    //alert(datos);
                    var objeto = eval(datos);
                    $.each(objeto, function(key, item) {
                        if(item.error == 0) {
                            location.href = "adm_pais.php";
                        } else {
                            $('.mensajes').show();
                            $('#mensaje').html(item.mensaje);
                        }
                    });                    
                }
            });
        }
        else
        {
            $('.mensajes').show();
            $('#mensaje').html(" Por favor, debe completar todos los datos del formulario.");
        }
    });
    
    $('#btnNuevoAceptar').click(function() {
        $('.mensajes').css('display', 'none');
        if ($('#estados').val() > 0 && $('#perfiles').val() > 0 && $('#NuevoNombre').val().length > 0 &&
                $('#NuevoApellido').val().length > 0 && $('#NuevoRut').val().length > 0 && $('#NuevoClave').val().length > 0) {
            $.ajax({
                type: "POST",
                url: "modelo/usuarios.php",
                data: {
                    funcion: "GrabarNuevoUsuario",
                    nombre: $('#NuevoNombre').val(),
                    apellidos: $('#NuevoApellido').val(),
                    rut: $('#NuevoRut').val(),
                    clave: $('#NuevoClave').val(),
                    idEstado: $('#estados').val(),
                    idPerfil: $('#perfiles').val()
                },
                success: function(datos) {
                    //alert(datos);
                    if (datos > 0) {
                        var row = '<tr class=' + datos + '><td>' + $('#NuevoNombre').val() + '</td><td>' + $('#NuevoApellido').val() + '</td><td>' + $('#NuevoRut').val() + '</td>' +
                                '<td>' + $('#perfiles').find('option:selected').text() + '</td><td>' + $('#estados').find('option:selected').text() + '</td>';
                        row +=
                                "<td><a class='btn btn-warning' codigo='" + datos + "' onclick='dlgModificar(" + datos + ")'><i class='icon-pencil icon-white'></i></a> " +
                                "<a class='btn btn-danger' href='#'><i class='icon-remove icon-white'></i></a></td></tr>";
                        var $row = $(row),
                                resort = true,
                                callback = function(table) {
                            alert('rows have been added!');
                        };
                        $('table')
                                .find('tbody').append($row)
                                .trigger('addRows', [$row, resort, callback]);
                        document.getElementById("form_nuevo").reset();
                        $('#dlgAgregar').modal('hide');
                        //$('#estados').html(texto);
                    }
                }
            });
        }
        else
        {
            $('.mensajes').show();
            $('#mensaje').html(" Por favor, Complete los datos del formulario.");
        }
    });
    $('#btnEditarAceptar').click(function() {
        $('.mensajes').css('display', 'none');
        if ($('#mestados').val() > 0 && $('#mperfiles').val() > 0 && $('#EditarNombre').val().length > 0 &&
                $('#EditarApellido').val().length > 0 && $('#EditarRut').val().length > 0) {
            $.ajax({
                type: "POST",
                url: "modelo/usuarios.php",
                data: {
                    funcion: "GrabarUsuario",
                    id: $('#IdRegistro').val(),
                    nombre: $('#EditarNombre').val(),
                    apellidos: $('#EditarApellido').val(),
                    rut: $('#EditarRut').val(),
                    clave: $('#EditarClave').val(),
                    idEstado: $('#mestados').val(),
                    idPerfil: $('#mperfiles').val()
                },
                success: function(datos) {
                    //alert(datos);
                    if (datos > 0) {

                        var row =
                                "<a class='btn btn-warning' codigo='" + $('#IdRegistro').val() + "' onclick='dlgModificar(" + $('#IdRegistro').val() + ")'><i class='icon-pencil icon-white'></i></a> " +
                                "<a class='btn btn-danger' href='#'><i class='icon-remove icon-white'></i></a>";
                        var $row = $(row),
                                resort = true,
                                callback = function(table) {
                            //alert('rows have been added!');
                        };
                        $('table').find('tr.' + $('#IdRegistro').val()).find('td:eq(0)').text($('#EditarNombre').val());
                        $('table').find('tr.' + $('#IdRegistro').val()).find('td:eq(1)').text($('#EditarApellido').val());
                        $('table').find('tr.' + $('#IdRegistro').val()).find('td:eq(2)').text($('#EditarRut').val());
                        $('table').find('tr.' + $('#IdRegistro').val()).find('td:eq(3)').text($('#mperfiles option:selected').text());
                        $('table').find('tr.' + $('#IdRegistro').val()).find('td:eq(4)').text($('#mestados option:selected').text());
                        $('table').find('tr.' + $('#IdRegistro').val()).find('td:eq(5)').html(row);
                        $("table").trigger("updateCell", [this, resort, callback]);
                        document.getElementById("form_nuevo").reset();
                        $('#dlgModificar').modal('hide');
                    }
                }
            });
        }
        else
        {
            $('.mmensajes').show();
            $('#mmensaje').html(" Debe completar todos los datos del formulario.");
        }
    });
    $('#btnEliminarAceptar').click(function() {
        $('.mensajes').css('display', 'none');
        $.ajax({
            type: "POST",
            url: "modelo/usuarios.php",
            data: {
                funcion: "EliminarUsuario",
                id: $('#IdRegistro').val()
            },
            success: function(datos) {
                //alert(datos);
                if (datos > 0) {

                    var row =
                            "<a class='btn btn-warning' codigo='" + $('#IdRegistro').val() + "' onclick='dlgModificar(" + $('#IdRegistro').val() + ")'><i class='icon-pencil icon-white'></i></a> " +
                            "<a class='btn btn-danger' href='#'><i class='icon-remove icon-white'></i></a>";
                    var $row = $(row),
                            resort = true,
                            callback = function(table) {
                        //alert('rows have been added!');
                    };
                    $('table').find('tr.' + $('#IdRegistro').val()).find('td:eq(0)').text($('#EditarNombre').val());
                    $('table').find('tr.' + $('#IdRegistro').val()).find('td:eq(1)').text($('#EditarApellido').val());
                    $('table').find('tr.' + $('#IdRegistro').val()).find('td:eq(2)').text($('#EditarRut').val());
                    $('table').find('tr.' + $('#IdRegistro').val()).find('td:eq(3)').text($('#mperfiles option:selected').text());
                    $('table').find('tr.' + $('#IdRegistro').val()).find('td:eq(4)').text($('#mestados option:selected').text());
                    $('table').find('tr.' + $('#IdRegistro').val()).find('td:eq(5)').html(row);
                    $("table").trigger("updateCell", [this, resort, callback]);
                    document.getElementById("form_nuevo").reset();
                    $('#dlgModificar').modal('hide');
                }
            }
        });
        /*}
         else
         {
         $('.mmensajes').show();
         $('#mmensaje').html(" Por favor, Complete los datos del formulario.");
         }*/
    });
});
function dlgModificar(id) {
    // PRE CARGAR LOS VALORES DE LA TABLA EN LOS CAMPOS DEL FORMULARIO
    //alert(id);
    $perfil = $('.' + id).find('td:eq(3)').text();
    $estado = $('.' + id).find('td:eq(4)').text();
    $('#IdRegistro').val(id);
    $('#EditarNombre').val($('.' + id).find('td:eq(0)').text());
    $('#EditarApellido').val($('.' + id).find('td:eq(1)').text());
    $('#EditarRut').val($('.' + id).find('td:eq(2)').text());
    var $valor = $("#mperfiles").find("option:contains('" + $perfil + "')").val();
    $("#mperfiles").val($valor);
    $valor = $("#mestados").find("option:contains('" + $estado + "')").val();
    $("#mestados").val($valor);
    $('#dlgModificar').modal('show');
}

function dlgEliminar(id) {
    // PRE CARGAR LOS VALORES DE LA TABLA EN LOS CAMPOS DEL FORMULARIO
    //alert(id);
    /*$perfil = $('.'+id).find('td:eq(3)').text();
     $estado = $('.'+id).find('td:eq(4)').text();
     
     $('#IdRegistro').val( id );
     $('#EditarNombre').val( $('.'+id).find('td:eq(0)').text() );
     $('#EditarApellido').val( $('.'+id).find('td:eq(1)').text() );
     $('#EditarRut').val( $('.'+id).find('td:eq(2)').text() );
     
     var $valor = $("#mperfiles").find("option:contains('"+$perfil+"')").val();
     $("#mperfiles").val($valor);
     
     $valor = $("#mestados").find("option:contains('"+$estado+"')").val();
     $("#mestados").val($valor);*/

    $('#dlgEliminar').modal('show');
}

/*function validarCampos() {
    $('.mensajes').css('display', 'none');
    if ($('#nombre_usuario').val().length > 4 && $('#clave_usuario').val().length > 1) {
        return true;
    }
    else {
        $('.mensajes').show();
        $('#mensaje').html(" Por favor, complete todos los datos del formulario.");
        return false;
    } 
}
*/