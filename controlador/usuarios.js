
$(window).load(function(){
	$.ajax({
		type: "POST",
		url: "modelo/usuarios.php",
		data: {
			funcion: "ListarUsuarios"	
		},
		success: function(datos){
			var objeto = eval(datos);
			var texto = "";
			$.each( objeto , function(key, item){
				//alert(objeto[key].nombre);
				texto += "<tr class="+objeto[key].id+"><td>"+objeto[key].nombre+"</td><td>"+objeto[key].apellidos+"</td><td>"+objeto[key].rut+"</td><td>"+objeto[key].perfil_nombre+"</td><td>"+objeto[key].estado_nombre+"</td>";
				texto += "<td>"+						
						"<a class='btn btn-warning' codigo='"+objeto[key].id+"' onclick='dlgModificar("+objeto[key].id+")'><i class='icon-pencil icon-white'></i></a> "+
						"<a class='btn btn-danger' codigo='"+objeto[key].id+"' onclick='dlgEliminar("+objeto[key].id+")'><i class='icon-remove icon-white'></i></a> "+
					"</td></tr>";

				//tabla_body
			});
			
			$('#tabla_body').html(texto);
			
			/////////////////////////////////////////////////////////////
			$.extend($.tablesorter.themes.bootstrap, {
			    // these classes are added to the table. To see other table classes available,
			    // look here: http://twitter.github.com/bootstrap/base-css.html#tables
			    table      : 'table table-bordered',
			    header     : 'bootstrap-header', // give the header a gradient background
			    footerRow  : '',
			    footerCells: '',
			    icons      : '', // add "icon-white" to make them white; this icon class is added to the <i> in the header
			    sortNone   : 'bootstrap-icon-unsorted',
			    sortAsc    : 'icon-chevron-up',
			    sortDesc   : 'icon-chevron-down',
			    active     : '', // applied when column is sorted
			    hover      : '', // use custom css here - bootstrap class may not override it
			    filterRow  : '', // filter row class
			    even       : '', // odd row zebra striping
			    odd        : ''  // even row zebra striping
			  });
			
			  // call the tablesorter plugin and apply the uitheme widget
			  $("table").tablesorter({
			    // this will apply the bootstrap theme if "uitheme" widget is included
			    // the widgetOptions.uitheme is no longer required to be set
			    theme : "bootstrap",
			    
			    sortList: [[0,0],[1,0]],
			
			    widthFixed: true,
			
			    headerTemplate : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!
			
			    // widget code contained in the jquery.tablesorter.widgets.js file
			    // use the zebra stripe widget if you plan on hiding any rows (filter widget)
			    widgets : [ "uitheme", "filter", "zebra" ],
			
			    widgetOptions : {
			      // using the default zebra striping class name, so it actually isn't included in the theme variable above
			      // this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
			      zebra : ["even", "odd"],
			
			      // reset filters button
			      filter_reset : ".reset"
			
			      // set the uitheme widget to use the bootstrap theme class names
			      // this is no longer required, if theme is set
			      // ,uitheme : "bootstrap"
			
			    }
			  }).tablesorterPager({

			    // target the pager markup - see the HTML block below
			    container: $(".pager"),
			
			    // target the pager page select dropdown - choose a page
			    cssGoto  : ".pagenum",
			
			    // remove rows from the table to speed up the sort of large tables.
			    // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
			    removeRows: false,
			
			    // output string - default is '{page}/{totalPages}';
			    // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
			    output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'
			
			  });

			  
		}
	});
	$.ajax({
		type: "POST",
		url: "modelo/usuarios.php",
		async: false,
		data: {
			funcion: "ListarPerfiles"	
		},		
		success: function(datos){
			var objeto = eval(datos);
			var texto = "<option value='0'>Seleccione</option>";
			
			$.each( objeto , function(key, item){
				//alert(objeto[key].nombre);
				texto += "<option value="+objeto[key].id+">"+objeto[key].nombre+"</option>";
				//tabla_body
			});
			
			$('#perfiles').html(texto);
			$('#mperfiles').html(texto);

		}
	});
	$.ajax({
		type: "POST",
		url: "modelo/usuarios.php",
		data: {
			funcion: "ListarEstados"	
		},
		success: function(datos){
			var objeto = eval(datos);
			var texto = "";
			
			$.each( objeto , function(key, item){
				//alert(objeto[key].nombre);
				texto += "<option value="+objeto[key].id+">"+objeto[key].nombre+"</option>";
				//tabla_body
			});
			
			$('#estados').html(texto);
			$('#mestados').html(texto);

		}
	});
	$('#btnNuevoAceptar').click(function(){
		$('.mensajes').css('display','none');
		if($('#estados').val()>0 && $('#perfiles').val()>0 && $('#NuevoNombre').val().length > 0 && 
			$('#NuevoApellido').val().length > 0 && $('#NuevoRut').val().length > 0 && $('#NuevoClave').val().length > 0 ) {
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
				success: function(datos){
					//alert(datos);
					if(datos>0) {
						  var row = '<tr><td>'+$('#NuevoNombre').val()+'</td><td>'+$('#NuevoApellido').val()+'</td><td>'+$('#NuevoRut').val()+'</td>' +
						    '<td>'+$('#estados').find('option:selected').text()+'</td><td>'+$('#perfiles').find('option:selected').text()+'</td><td></td></tr>';
						   var $row = $(row),
						    resort = true,
						    callback = function(table){
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
	
	$('#btnEditarAceptar').click(function(){
		$('.mensajes').css('display','none');
		if($('#mestados').val()>0 && $('#mperfiles').val()>0 && $('#EditarNombre').val().length > 0 && 
			$('#EditarApellido').val().length > 0 && $('#EditarRut').val().length > 0 ) {
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
				success: function(datos){
					//alert(datos);
					if(datos>0) {						
						
						var row =						
							"<a class='btn btn-warning' codigo='"+$('#IdRegistro').val()+"' onclick='dlgModificar("+$('#IdRegistro').val()+")'><i class='icon-pencil icon-white'></i></a> "+
							"<a class='btn btn-danger' href='#'><i class='icon-remove icon-white'></i></a>";

						var $row = $(row),
							resort = true,
							callback = function(table){
								//alert('rows have been added!');
							};
						
						$('table').find( 'tr.'+$('#IdRegistro').val() ).find('td:eq(0)').text($('#EditarNombre').val());
						$('table').find( 'tr.'+$('#IdRegistro').val() ).find('td:eq(1)').text($('#EditarApellido').val());
						$('table').find( 'tr.'+$('#IdRegistro').val() ).find('td:eq(2)').text($('#EditarRut').val());
						$('table').find( 'tr.'+$('#IdRegistro').val() ).find('td:eq(3)').text($('#mperfiles option:selected').text());
						$('table').find( 'tr.'+$('#IdRegistro').val() ).find('td:eq(4)').text($('#mestados option:selected').text());
						$('table').find( 'tr.'+$('#IdRegistro').val() ).find('td:eq(5)').html(row);
						
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
			$('#mmensaje').html(" Por favor, Complete los datos del formulario.");
		}
	});
	
	$('#btnEliminarAceptar').click(function(){
		$('.mensajes').css('display','none');

			$.ajax({
				type: "POST",
				url: "modelo/usuarios.php",
				data: {
					funcion: "EliminarUsuario",
					id: $('#IdRegistro').val()
				},
				success: function(datos){
					//alert(datos);
					if(datos>0) {						
						
						var row =						
							"<a class='btn btn-warning' codigo='"+$('#IdRegistro').val()+"' onclick='dlgModificar("+$('#IdRegistro').val()+")'><i class='icon-pencil icon-white'></i></a> "+
							"<a class='btn btn-danger' href='#'><i class='icon-remove icon-white'></i></a>";

						var $row = $(row),
							resort = true,
							callback = function(table){
								//alert('rows have been added!');
							};
						
						$('table').find( 'tr.'+$('#IdRegistro').val() ).find('td:eq(0)').text($('#EditarNombre').val());
						$('table').find( 'tr.'+$('#IdRegistro').val() ).find('td:eq(1)').text($('#EditarApellido').val());
						$('table').find( 'tr.'+$('#IdRegistro').val() ).find('td:eq(2)').text($('#EditarRut').val());
						$('table').find( 'tr.'+$('#IdRegistro').val() ).find('td:eq(3)').text($('#mperfiles option:selected').text());
						$('table').find( 'tr.'+$('#IdRegistro').val() ).find('td:eq(4)').text($('#mestados option:selected').text());
						$('table').find( 'tr.'+$('#IdRegistro').val() ).find('td:eq(5)').html(row);
						
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
	
function dlgModificar(id){
	// PRE CARGAR LOS VALORES DE LA TABLA EN LOS CAMPOS DEL FORMULARIO
	//alert(id);
	$perfil = $('.'+id).find('td:eq(3)').text();
	$estado = $('.'+id).find('td:eq(4)').text();
	
	$('#IdRegistro').val( id );
	$('#EditarNombre').val( $('.'+id).find('td:eq(0)').text() );
	$('#EditarApellido').val( $('.'+id).find('td:eq(1)').text() );
	$('#EditarRut').val( $('.'+id).find('td:eq(2)').text() );
	
	var $valor = $("#mperfiles").find("option:contains('"+$perfil+"')").val();
	$("#mperfiles").val($valor);
		
	$valor = $("#mestados").find("option:contains('"+$estado+"')").val();
	$("#mestados").val($valor);
	
	$('#dlgModificar').modal('show');
}

function dlgEliminar(id){
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

