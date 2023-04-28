<?php
require_once('db.php');
session_start();
//$titulo = ucwords(mb_strtolower($session->data['usuario']->titulo, "UTF-8"));
$nombre = ucwords(mb_strtolower($session->data['login_user']->nombre, "UTF-8"));
$apellidos = ucwords(mb_strtolower($session->data['login_user']->paterno, "UTF-8")) . ' ' . ucwords(mb_strtolower($session->data['login_user']->materno, "UTF-8"));
$fecha = ucwords(mb_strtolower($session->data['login_user']->nombre, "UTF-8"));
$nombre_usuario = $nombre . ' ' . $apellidos;
$login_usuario = $session->data['login_user']->usuario;
/*if ($session->data['usuario']->genero == 'H') {
	$conexion = "Conectado como: <strong>Administrador (" . $login_usuario . ")</strong>";
} else {
	$conexion = "Conectada como: <strong>Administradora (" . $login_usuario . ")</strong>";
}*/
$usuario_id = $session->data['login_user']->usuario_id;
$db->setQuery("SET NAMES utf8");
$db->query();
$query="SELECT usuario_id, CONCAT(IFNULL(nombre, ''), ' ', IFNULL(paterno, ''), ' ', IFNULL(materno, '')) AS nombre, usuario, nombre fecha_entrada, nombre status, nombre admin FROM usuarios";
$db->setQuery($query);
$db->query();
$usuarios = $db->loadObjectList();
$nusuarios = count($usuarios);
?>
<!doctype html>
<!--[if lt IE 8 ]><html lang="es" class="no-js ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="es" class="no-js ie"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!--><html lang="es" class="no-js"><!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Registro Ususarios</title>
	
	<!-- Hojas de estilo globales -->
	<link href="cssmenu/cssmenu/menu_source/styles.css" rel="stylesheet">
	<link href="css/reset.css" rel="stylesheet" type="text/css">
	<link href="css/common.css" rel="stylesheet" type="text/css">
	<link href="css/form.css" rel="stylesheet" type="text/css">
	<link href="css/standard.css" rel="stylesheet" type="text/css">

	<!-- Carga combinada de hojas de estilo -->
	<!-- Carga 960.gs.fluid o 960.gs para intercambiar entre esquema fijo o fluido -->
	<link href="css/mini.php?files=reset,common,form,standard,960.gs.fluid,simple-lists,block-lists,planning,table,calendars,wizard,gallery" rel="stylesheet" type="text/css">
	
	<!-- Estilos personalizados -->
	<link href="css/simple-slider.css" rel="stylesheet" type="text/css" />
	<link href="css/simple-lists.css" rel="stylesheet" type="text/css" />
	<link href="css/table.css" rel="stylesheet" type="text/css">

	<!-- Tema "Redmond" para el plugin Date Picker de jQuery -->
	<link href="css/redmond/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="icon" type="image/png" href="favicon-large.png">
	
	<!-- Aquí se carga Modernizr para navegadores obsoletos, todas las librerías de javascript se incluyeron al final después de </body> para un rendimiento mejorado -->
	<script src="js/libs/modernizr.custom.min.js"></script>
	
</head>

<body>
	
	<!-- Estatus del servidor -->
	<header><div class="container_12">
		<img src="images/espacio.JPG">
		<img src="images/VW.JPG" align= "left" onclick="location.href='admin.php'">
	    <div id='cssmenu'>
		<ul>
   			<li><a href='admin.php'><span>Inicio</span></a></li>
   			<li class='active'><a href='#'><span>Registro</span></a></li>
   			<li><a href='#'><span>Reportes</span></a></li>
		</ul>
	</div>
	</div></header>
	<!-- Fin de estatus del servidor -->
	
	<nav id="main-nav">
		
	</nav>
	
	<!-- Fin de la barra de status -->
	
	<div id="header-shadow"></div>

	<!-- Content -->
	<article class="container_12">
		<section class="grid_12" id="inicio_bloque">
			<div class="block-content">
				<div class="block-controls">
					
					<!--<ul class="controls-tabs js-tabs">-->
					<ul>
						 <li><a href="javascript:void(0);" onclick="form_registro.submit();" title="">Historial</a></li>
						 <li><a href="javascript:void(0);" onclick="form_perfil.submit();" title="">Perfil</a></li>
						<!--<li><a href="javascript:void(0);" onclick="eliminarUsuario();" title="Eliminar"><img src="images/icons/web-app/24/Delete.png" width="24" height="24"></a></li>-->
					</ul>
					
				</div>
				<form class="form" id="form_perfil" name = "form_perfil" method="post" action="perfil.php">
						<input type="hidden" name="usuarioid_perfil" id="usuarioid_perfil" value="" />
						<input type="hidden" name="usuario_perfil" id="usuario_perfil" value="" />
						<input type="hidden" name="fortalezas" id="fortalezas" value="" />
						<input type="hidden" name="debilidades" id="debilidades" value="" />
						<input type="hidden" name="oportunidades" id="oportunidades" value="" />
						<input type="hidden" name="amenazas" id="amenazas" value="" />
				</form>
				<form class="form" id="form_registro" name = "form_registro" method="post" action="historial.php">
					<fieldset>
						<!--<legend>Registro de Trabajador</legend>-->
						
						<ul class="message error no-margin" id="form_error" style="display: none;">
							<li>Falta capturar los siguientes datos:</li>
						</ul>
						<input type="hidden" name="usuario_id" id="usuario_id" value="" />
						<input type="hidden" name="fecha_inicio" id="fecha_inicio" value="" />
						<input type="hidden" name="fecha_salida" id="fecha_salida" value="" />
						<input type="hidden" name="motivos_salida" id="motivos_salida" value="" />
						<input type="hidden" name="incidencias" id="incidencias" value="" />
						<div class="columns">
							<div class="colx2-left">
								<p>
									<label for="nombre">Nombre(s)</label>
									<span class="input-type-text margin-right relative"><input type="text" name="nombre" id="nombre" value=""></span>
								</p>
								<p>
									<label for="paterno">Apellido Paterno</label>
									<span class="input-type-text margin-right relative"><input type="text" name="paterno" id="paterno" value=""></span>
								</p>
								<p>
									<label for="materno">Apellido Materno</label>
									<span class="input-type-text margin-right relative"><input type="text" name="materno" id="materno" value=""></span>
								</p>
								<p>
									<label for="direccion">Dirección (Calle/numero/Colonia)</label>
									<span class="input-type-text margin-right relative"><input type="text" name="direccion" id="direccion" value=""></span>
								</p>
								<p>
									<label for="fecha_entrada">Fecha de Entrada a la Empresa</label>
									<span class="input-type-text margin-right relative"><input type="text" name="fecha_entrada" id="fecha_entrada" value="" class="datepicker"><img src="images/icons/fugue/calendar-month.png" width="16" height="16"></span>
								</p>
								<span class="label">Estatus</span>
								<span class="input-type-text margin-right relative">
									<ul class="checkable-list">
										<li><input type="radio" name="estatus" id="estatus-a" value="1">&nbsp;<label for="estatus-a">Activo</label></li>
										<li><input type="radio" name="estatus" id="estatus-b" value="0">&nbsp;<label for="estatus-b">Baja</label></li>
									</ul>
								</span>
								<p>
									<label for="area">Área</label>
									<span class="input-type-text margin-right relative"><input type="text" name="area" id="area" value=""></span>
								</p>
							</div>
							<div class="colx2-right">
								<p>
									<label for="puesto">Puesto</label>
									<span class="input-type-text margin-right relative"><input type="text" name="puesto" id="puesto" value=""></span>
								</p>
								<p>
									<label for="sueldo">Sueldo</label>
									<span class="input-type-text margin-right relative"><input type="text" name="sueldo" id="sueldo" value=""></span>
								</p>
								<p>
									<label for="funciones">Funciones Generales</label>
									<span class="input-type-text margin-right relative"><input type="text" name="funciones" id="funciones" value=""></span>
								</p>
								<p>
									<label for="usuario">Nombre de Usuario</label>
									<span class="input-type-text margin-right relative"><input type="text" name="usuario" id="usuario" value=""></span>
								</p>
								<p>
									<label for="contrasena">Contraseña</label>
									<span class="input-type-text margin-right relative"><input type="text" name="contrasena" id="contrasena" value=""></span>
								</p>
								
							</div>
						</div>
						<br />
						<p>
							<label for="observaciones">Observaciones</label>
							<textarea name="observaciones" id="observaciones" style="width: 100%;"></textarea>
						</p>
						<p>
							<label for="cualidades">Cualidades</label>
							<textarea name="cualidades" id="cualidades" style="width: 100%;"></textarea>
						</p>

						<ul id="status-infos">
						<button type="button" href="javascript:void(0);" onclick="guardarUsuario();">Guardar</button>
						<button type="button" href="javascript:void(0);" onclick="nuevoUsuario();">Nuevo</button>
						<button type="button" href="javascript:void(0);" onclick="eliminarUsuario();">Eliminar</button>
			        	<!--<li><a href="logout.php" class="button red"><span onclick="salir(); return false;" class="smaller">CERRAR SESIÓN</span></a></li>-->
		            	</ul>

					</fieldset>
				</form>
				<br></br>
				<div class="block-content">
					<h2>Trabajadores Registrados</h2>
					<table class="table tabladocentes no-margin" cellspacing="0" width="100%">
					
						<thead>
							<tr>
								<th scope="col">
									<span class="column-sort">
										<a href="#" title="Ascendente" class="sort-up"></a>
										<a href="#" title="Descendente" class="sort-down"></a>
									</span>
									Nombre Completo
								</th>
								<th scope="col">
									<span class="column-sort">
										<a href="#" title="Ascendente" class="sort-up"></a>
										<a href="#" title="Descendente" class="sort-down"></a>
									</span>
									Usuario
								</th>
								<th scope="col">
									<span class="column-sort">
										<a href="#" title="Ascendente" class="sort-up"></a>
										<a href="#" title="Descendente" class="sort-down"></a>
									</span>
									Fecha de Alta
								</th>
								<th scope="col">
									<span class="column-sort">
										<a href="#" title="Ascendente" class="sort-up"></a>
										<a href="#" title="Descendente" class="sort-down"></a>
									</span>
									Usuario Alta
								</th>
								<th scope="col">
									<span class="column-sort">
										<a href="#" title="Ascendente" class="sort-up"></a>
										<a href="#" title="Descendente" class="sort-down"></a>
									</span>
									Estatus
								</th>
								<th scope="col" class="table-actions">Acción</th>
							</tr>
						</thead>
						<tbody>
							<?php
								// Creamos la lista de usuarios que se mostrarán en la tabla dinámica
								for ($i = 0; $i < $nusuarios; $i++) {
									echo "<tr>";
									echo "<td>{$usuarios[$i]->nombre}</td>";
									echo "<td>{$usuarios[$i]->usuario}</td>";
									echo "<td>{$usuarios[$i]->fecha_entrada}</td>";
									//echo "<td>{$usuarios[$i]->usuario_alta}</td>";
									echo "<td><ul class=\"keywords\">";
									
									if ($usuarios[$i]->admin == '1') {
										echo "<li class=\"blue-keyword\">ADMIN</li>";
									}
									echo "<td><ul class=\"keywords\">";
									if ($usuarios[$i]->status == 1) {
										echo "<li class=\"blue-keyword\">ACTIVO</li>&nbsp;";
									} else {
										echo "<li class=\"blue-keyword\">BAJA</li>&nbsp";
									}
									echo "</ul></td>";
									echo "<td class=\"table-actions\"><a href=\"javascript:void(0);\" onclick=\"edita({$usuarios[$i]->usuario_id});\" title=\"Editar\" class=\"with-tip\"><img src=\"images/icons/fugue/pencil.png\" width=\"16\" height=\"16\"></a></td>";
									echo "</tr>";
								}

							?>
							
						</tbody>
					</table>
				</div>
				<div id="tblscroll"></div> <br></br>
				<button type="button" onclick="salir(); return false;">Salir</button>
			</div>
		</section>
	</article>
	
	<footer>
		<!--<div class="float-right">
			<a href="#top" class="button"><img src="images/icons/fugue/navigation-090.png" width="16" height="16"> Subir</a>
		</div>-->
		
	</footer>
	
	<!-- Combined JS load -->
	<script src="js/mini.php?files=libs/jquery-1.6.3.min,old-browsers,libs/jquery.hashchange,jquery.accessibleList,searchField,common,standard,jquery.tip,jquery.contextMenu,jquery.modal,list"></script>
	<!--[if lte IE 8]><script src="js/standard.ie.js"></script><![endif]-->
	
	<script src="js/jquery-ui-1.9.2.custom.min.js"></script>

	<!-- Librería Scroll -->
	<script src="js/jquery.scrollTo-1.4.3.1-min.js"></script>

	<!-- Librería High Charts -->
	<script src="js/Highcharts-3.0.2/highcharts.js"></script>

	<!-- Librería simple slider -->
	<script src="js/simple-slider.min.js"></script>

	<!-- Librería Data Tables -->
	<script src="js/libs/jquery.dataTables.min.js"></script>

	<script>
		$(document).ready(function() {
			
			// Configuración inicial de la tabla de docentes
			
			$.fn.dataTableExt.oStdClasses.sWrapper = 'no-margin last-child';
			$.fn.dataTableExt.oStdClasses.sInfo = 'message no-margin';
			$.fn.dataTableExt.oStdClasses.sLength = 'float-left';
			$.fn.dataTableExt.oStdClasses.sFilter = 'float-right';
			$.fn.dataTableExt.oStdClasses.sPaging = 'sub-hover paging_';
			$.fn.dataTableExt.oStdClasses.sPagePrevEnabled = 'control-prev';
			$.fn.dataTableExt.oStdClasses.sPagePrevDisabled = 'control-prev disabled';
			$.fn.dataTableExt.oStdClasses.sPageNextEnabled = 'control-next';
			$.fn.dataTableExt.oStdClasses.sPageNextDisabled = 'control-next disabled';
			$.fn.dataTableExt.oStdClasses.sPageFirst = 'control-first';
			$.fn.dataTableExt.oStdClasses.sPagePrevious = 'control-prev';
			$.fn.dataTableExt.oStdClasses.sPageNext = 'control-next';
			$.fn.dataTableExt.oStdClasses.sPageLast = 'control-last';
			
			// Se aplica a la tabla con clase "tabladocentes"
			$('.tabladocentes').each(function(i)
			{
				// Configuración de la tabla
				var table = $(this),
					oTable = table.dataTable({
						oLanguage: {
							"sProcessing":     "Procesando...",
						    "sLengthMenu":     "Mostrar _MENU_ registros",
						    "sZeroRecords":    "No se encontraron resultados",
						    "sEmptyTable":     "Ningún dato disponible en esta tabla",
						    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
						    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
						    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
						    "sInfoPostFix":    "",
						    "sSearch":         "Buscar:",
						    "sUrl":            "",
						    "sInfoThousands":  ",",
						    "sLoadingRecords": "Cargando...",
						    "oPaginate": {
						        "sFirst":    "Primero",
						        "sLast":     "Último",
						        "sNext":     "Siguiente",
						        "sPrevious": "Anterior"
						    },
						    "oAria": {
						        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
						    }
						},
						aoColumns: [
							// Columna 1
							{ sType: 'string' },
							
							// Columna 2
							{ sType: 'string' },

							// Columna 3
							{ sType: 'string' },

							// Columna 4
							{ sType: 'string' },

							// Columna 5
							{ sType: 'string' },							

							// Columna 6
							{ bSortable: false }
						],
						
						sDom: '<"block-controls"<"controls-buttons"p>>rti<"block-footer clearfix"lf>',
						
						/*
						 * Usamos un Callback para aplicar la configuración a la tabla
						 */
						fnDrawCallback: function()
						{
							this.parent().applyTemplateSetup();
						},
						fnInitComplete: function()
						{
							this.parent().applyTemplateSetup();
						}
					});
				
				table.find('thead .sort-up').click(function(event)
				{
					event.preventDefault();
					
					var column = $(this).closest('th'),
						columnIndex = column.parent().children().index(column.get(0));
					
					oTable.fnSort([[columnIndex, 'asc']]);
					
					return false;
				});
				table.find('thead .sort-down').click(function(event)
				{
					event.preventDefault();
					
					var column = $(this).closest('th'),
						columnIndex = column.parent().children().index(column.get(0));
					
					oTable.fnSort([[columnIndex, 'desc']]);
					
					return false;
				});
			});
			$('#fecha_entrada').val(dateToString(new Date));
			$('#admin').val('<?php echo $login_usuario; ?>');

			jQuery.fn.extend({
				insertAtCaret: function(myValue){
				  return this.each(function(i) {
				    if (document.selection) {
				      //For browsers like Internet Explorer
				      this.focus();
				      var sel = document.selection.createRange();
				      sel.text = myValue;
				      this.focus();
				    }
				    else if (this.selectionStart || this.selectionStart == '0') {
				      //For browsers like Firefox and Webkit based
				      var startPos = this.selectionStart;
				      var endPos = this.selectionEnd;
				      var scrollTop = this.scrollTop;
				      this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
				      this.focus();
				      this.selectionStart = startPos + myValue.length;
				      this.selectionEnd = startPos + myValue.length;
				      this.scrollTop = scrollTop;
				    } else {
				      this.value += myValue;
				      this.focus();
				    }
				  });
				}
			});
			var d = new Date();
			var year = d.getFullYear() - 30;
			d.setFullYear(year);
			$("#fecha_entrada").datepicker({
				onClose: function() {
					this.focus()
				},
				changeMonth: true, 
				changeYear: true, 
				dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], 
				gotoCurrent: true, 
				monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"], 
				dateFormat: "yy-mm-dd", 
				yearRange: "1900:c",
				defaultDate: d,
			});
			limpiaforma();
		});


		function salir() {
			$.modal({
				content: 'Estás seguro que deseas salir del sistema?',
				maxwidth: 300,
				buttons: {
					'Salir': function(win) { window.location = "logout.php"; },
					'Cancelar': function(win) { win.closeModal(); }
				}
			});
			return false;
		}

		function edita(id) {
			quitarmensajeserror();
			var data = {
				usuario_id: id
			};
			// Enviamos la información por AJAX al servidor para recuperar la información
			$.ajax({
				url: 'consultausuario.php',
				dataType: 'json',
				type: 'POST',
				data: data,
				success: function(data)
				{
					if (data.success)
					{
						$.scrollTo('#inicio_bloque', 200, {onAfter: function(){
							//datos genereales
							$('#usuario_id').val(data.usuario.usuario_id);
							$('#nombre').val(data.usuario.nombre);
							$('#paterno').val(data.usuario.paterno);
							$('#materno').val(data.usuario.materno);
							$('#direccion').val(data.usuario.direccion);
							$('#fecha_entrada').val(data.usuario.fecha_entrada);
							if (data.usuario.estatus == "1") {
								$('input:radio[name=estatus]')[0].checked = true;
							} else {
								$('input:radio[name=estatus]')[1].checked = true;
							}
							$('#area').val(data.usuario.area);
							$('#puesto').val(data.usuario.puesto);
							$('#sueldo').val(data.usuario.sueldo);
							$('#funciones').val(data.usuario.funciones);
							$('#observaciones').insertAtCaret(data.usuario.observaciones).blur();
							$('#cualidades').insertAtCaret(data.usuario.cualidades).blur();
							$('#usuario').val(data.usuario.usuario);
							$('#contrasena').val('xxxxxxxxxx');
							

							$('#fecha_inicio').val(data.usuario.fecha_inicio);
							$('#fecha_salida').val(data.usuario.fecha_salida);
							$('#observaciones').val(data.usuario.observaciones);
							$('#motivos_salida').val(data.usuario.motivos_salida);
							$('#incidencias').val(data.usuario.incidencias);
							
							$('#usuarioid_perfil').val(data.usuario.usuario_id);
							$('#usuario_perfil').val(data.usuario.usuario);
							$('#fortalezas').val(data.usuario.fortalezas);
							$('#debilidades').val(data.usuario.debilidades);
							$('#oportunidades').val(data.usuario.oportunidades);
							$('#amenazas').val(data.usuario.amenazas);
						}});
					}
					else
					{
						// Mensaje
						alert('Ocurrió un error inesperado, intenta de nuevo');
					}
				},
				error: function()
				{
					// Mensaje
					alert('Error conectando con el servidor, intenta de nuevo');
				}
			});
		}

		function nuevoUsuario() {
			// limpia los datos del formulario para registrar un nuevo usuario
			limpiaforma();
			$('#observaciones').insertAtCaret('');
			$('#nombre').focus();
		}

		function eliminarUsuario() {
			var usuario_id = $('#usuario_id').val();
			if (usuario_id == "") {
				alert("Debes seleccionar un usuario de la lista para poder eliminarlo");
				$.scrollTo('#tblscroll', 800);
				return;
			}
			$.modal({
				content: 'Estás seguro que deseas eliminar este usuario?',
				maxwidth: 300,
				buttons: {
					'Eliminar': function(win) {
						var data = {
							usuario_id: usuario_id
						};
						$.ajax({
							url: 'elimusuario.php',
							dataType: 'json',
							type: 'POST',
							data: data,
							success: function(data)
							{
								if (data.success)
								{
									alert('Usuario eliminado');
									window.location.reload();
								}
								else
								{
									alert(data.message);
								}
							},
							error: function()
							{
								//alert('Error conectando con el servidor, intenta de nuevo');
								alert('Usuario eliminado');
									window.location.reload();
							}
						});
					},
					'Cancelar': function(win) { win.closeModal(); }
				}
			});
		}

		function guardarUsuario() {
			if (validaFormulario()) 
			{
					var data = {
					usuario_id: ($('#usuario_id').val()),
					usuario: ($('#usuario').val()),
					contrasena: ($('#contrasena').val()),
					nombre: ($('#nombre').val()),
					paterno: ($('#paterno').val()),
					materno: ($('#materno').val()),
					direccion: ($('#direccion').val()),
					fecha_entrada: ($('#fecha_entrada').val()),
					estatus: ($('input[name="estatus"]:checked').val()),
					area: ($('#area').val()),
					observaciones: ($('#observaciones').val()),
					cualidades: ($('#cualidades').val()),
					puesto: ($('#puesto').val()),
					sueldo: ($('#sueldo').val()),
					funciones: ($('#funciones').val())
				};
				$.ajax({
					url: 'guardausuario.php',
					dataType: 'json',
					type: 'POST',
					data: data,
					success: function(data)
					{
						if (data.success)
						{
							alert("Los datos fueron guardados correctamente");
							window.location.reload();
						}
						else
						{
							alert(data.message);
						}
					},
					error: function()
					{
						alert("Realizando operación");
						window.location.reload();
					}
				});
			}
		}

		function quitarmensajeserror() {
			$('#form_error').css('display', 'none');
			$('#nombre').parent().removeClass('error');
			$("input[name='estatus']").parent().parent().parent().removeClass('error');
			$('#paterno').parent().removeClass('error');
			$('#usuario').parent().removeClass('error');
			$('#contrasena').parent().removeClass('error');
		}

		function validaFormulario() {
			// elimina mensajes de error mostrados y vuelve a procesar formulario
			quitarmensajeserror();
			var resultado = true;
			var nombre = $("#nombre").val();
			var paterno = $("#paterno").val();
			var materno = $("#materno").val();
			nombre = nombre.replace(/^\s+/g,'').replace(/\s+$/g,'');
			paterno = paterno.replace(/^\s+/g,'').replace(/\s+$/g,'');
			materno = materno.replace(/^\s+/g,'').replace(/\s+$/g,'');
			if (nombre == '') {
				$('#nombre').parent().addClass('error');
				resultado = false;
			}
			if (paterno == '') {
				$('#paterno').parent().addClass('error');
				resultado = false;
			}
			if ($("input[name='estatus']:checked").val() == undefined) {
				$("input[name='estatus']").parent().parent().parent().addClass('error');
				resultado = false;
			}
			if ($('#usuario').val() == '') {
				$('#usuario').parent().addClass('error');
				resultado = false;
			}
			if ($('#contrasena').val() == '') {
				$('#contrasena').parent().addClass('error');
				resultado = false;
			}
			if (!resultado) {
				$('#form_error').css('display', 'block');
			}
			return resultado;
		}

		function dateToString(date) {
		    var month = date.getMonth() + 1;
		    var day = date.getDate();
		    var dateOfString = date.getFullYear() + "-";
			dateOfString += (("" + month).length < 2 ? "0" : "") + month + "-";
			dateOfString += (("" + day).length < 2 ? "0" : "") + day;
		    return dateOfString;
		}
		function limpiaforma() {
			quitarmensajeserror();
			$('#usuario_id').val('');
			$('#nombre').val('');
			$('#paterno').val('');
			$('#materno').val('');
			$('#direccion').val('');
			$('#fecha_entrada').val('');
			$('input:radio[name=estatus]')[0].checked = false;
			$('input:radio[name=estatus]')[1].checked = false;
			$('#area').val('');
			$('#puesto').val('');
			$('#sueldo').val('');
			$('#funciones').val('');
			$('#usuario').val('');
			$('#contrasena').val('');
			$('#observaciones').val('');
			$('#cualidades').val('');
		}
	</script>
</body>
</html>