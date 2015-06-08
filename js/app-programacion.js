/*Al cargar la pagina*/
$(document).ready(function() {
    var panel_prog;
	/*Recupera el dom del template y lo guarda en una variable para usarlo depues*/
	$.get('../templates/programacionestmpt.html',function(dom){
		panel_prog = dom;
	});
	/*
	 * Se llama a funcion ajax de jquery.
	 * @param Object{type:[String GET,POST,DELETE], url:[String url], dataType:[String json,html,etc], success:[function(Object data)], error:[function()]}
	 */
	$.ajax({
		type:'GET',
		url:"../api/programacion",
		success: function(data){
			/*El dom recuperado es convertido a un objeto jquery*/
			var panel = $(panel_prog);
			/*se recorre los datos recuperados de la consulta*/
			for (var i=0;i<data.length;i++){
				var programacion = data[i];
				/*se prepara la fila con los datos recuperados*/
				var contenido =  "<tr id='fila'>"
									+"<td id='prog_id'>"+programacion.prog_id+"</td>"
									+ "<td id='td_nombre'>"
										+"<img id='img_prog' src='../img/prog-img/"+programacion.prog_img+"' with='28' height='28' class='img-circle'></img>"
										+programacion.nombre
									+"</td>"
									+ "<td id='td_descripcion'>"+programacion.descripcion+"</td>"
									+ "<td id='td_hora_inicio'>"+programacion.hora_inicio+"</th>"
									+ "<td id='td_hora_fin'>"+programacion.hora_fin+"</th>"
									+ "<td id='td_conductores'>"
										+"<img id='img_cond' src='../img/prog-img/"+programacion.cond_img+"' with='28' height='28' class='img-circle'></img>"
										+programacion.conductores
									+ "</td>"
									+ "<td id='botones'>"
										+"<button id='btn_update' type='button' class='btn btn-warning btn-xs'>"
											+ "<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
										+"</button>"
										+"<button id='btn_delete' type='button' class='btn btn-danger btn-xs'>"
											+"<span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span>"
										+"</button>"
									+"</td>"
								+"</tr>";
				/*la fila se agrega a la tabla del template*/			
				panel.find('#contenido').append(contenido);	
				panel.find('#botones').hide();
				panel.find('#fila').on('click',mostrarBtn);
				panel.find('#fila').on('dblclick',ocultarBtn);
			}
			/*el template se agrega al documento principal*/
			$('#principal').append(panel);
		},
		error: function(){
			console.log("Error al recuperar programaciontmpt.html");
		}
	});
});

/*#####- Variables Globales -#####*/
/*Id de la programacion a modificar o eliminar*/
var prog_id;
/*Bandera para insert o update*/
var isNew = true;
/*Fila seleccionada para eliminar o modificar*/
var fila;

/*
 * Verifica que los campos no esten vacios
 * Crea el objeto programacion y lo envia para insertar o modificar
 */
function procesar_form(){
	if(validar_text()){
		if(isNew){
			var programacion = crearProgramacion();
			//###########
			//console.log(JSON.stringify(programacion));
			//###########
			insertarProg(programacion);
		} else {
			var programacion = crearProgramacion();
			modificarProg(programacion);
			//###########
			console.log(JSON.stringify(programacion));
			//###########
			isNew = true;
		}
	};
}
/*
 * Verifica que los campos no esten vacios.
 * @return boolean listo
 */
function validar_text(){
	var campos = obtenerCamposProg();
	var listo = true;
	for(var i=0 ; i<(campos.length-2) ; i++){
		if(campos[i].val().length==0){
			campos[i].addClass('pintarborde'); 
			listo=false;
		} else {
			campos[i].removeClass('pintarborde');
		}
	}	
	if(!listo){
		alert("Completá todos los campos antes de Guardar :-P");
		$('input.pintarborde:first').focus();
	} 
	return listo
}
/**
 * Representacion de un objeto programacion 
 * se utiliza para instanciar el objeto
 */
function Programacion(){
	this.prog_id = 0;
	this.nombre = "";
	this.descripcion = "";
	this.hora_inicio = "";
	this.hora_fin = "";
	this.conductores = "";
	this.prog_img = "";
	this.cond_img = "";
}
/**
 * Instancia un objeto programacion
 * utilizando los valores contenidos en los inputs
 * @return Programacion
 */
function crearProgramacion(){
	var campos = obtenerCamposProg();
	var programacion = new Programacion();
	if(!isNew) programacion.prog_id = prog_id;
	programacion.nombre = campos[0].val();
	programacion.descripcion = campos[1].val();
	programacion.hora_inicio = campos[2].val();
	programacion.hora_fin = campos[3].val();
	programacion.conductores = campos[4].val();
	programacion.prog_img = nombre_archivo(campos[5].val());
	programacion.cond_img = nombre_archivo(campos[6].val());

	return programacion;
}
/**
 * Controla que los archivos de imagen esten seleccionados.
 * si estan llama al metodo para cargar los archivos y luego al metodo para guardar los datos
 * @param Programacion
 */
function insertarProg(programacion){
	var prog_img = $('#prog_img');
	var cond_img = $('#cond_img');
	if(prog_img.val().length > 0 || cond_img.val().length > 0){
		$('#progress').show('fast');
		subirArchivosProg(prog_img);
		subirArchivosProg(cond_img);
		$('#progress').hide('fast');
	}
	insertDataProg(programacion);
}
/**
 * Sube un archivo al servidor. Utiliza metodos de upload.js
 * @param Programacion
 */
function subirArchivosProg(archivo){
	archivo.upload('../api/programacion/subir_archivo.php',
		function(respuesta) {
			//##########
			//console.log("respuesta = "+respuesta);
			//##########
			//Subida finalizada.
			if (respuesta === 1) {
				//##########
				//console.log('El archivo ha sido subido correctamente: '+respuesta, true);
				//##########
			} else {
				//##########
				console.log('El archivo NO se ha podido subir: '+respuesta, false);
				//##########
			}
		}, 
		function(progreso, valor) {
			//Barra de progreso.
			$('#progress').find('div').attr('style','width:'+valor+'%');
			$('#progress').find('div').html(valor+"%");
		});
} 
/**
 * Inserta los datos en la db por medio de  ajax atraves de POST.
 * @param Programacion
 */
function insertDataProg(programacion){
	$.ajax({
		data : programacion,
		type: 'POST',
		url:"../api/programacion/insert.php",
		dataType: 'json',
		success: function(data){
			var contenido =  "<tr id='fila'>"
								+"<td id='prog_id'>"+data.prog_id+"</td>"								
								+ "<td id='td_nombre'>"
									+"<img id='img_prog' src='../img/prog-img/"+programacion.prog_img+"' with='28' height='28' class='img-circle'></img>"
									+data.nombre
								+ "</td>"
								+ "<td id='td_descripcion'>"+data.descripcion+"</td>"
								+ "<td id='td_hora_inicio'>"+data.hora_inicio+"</th>"
								+ "<td id='td_hora_fin'>"+data.hora_fin+"</th>"
								+ "<td id='td_conductores'>"
									+"<img id='img_cond' src='../img/prog-img/"+programacion.cond_img+"' with='28' height='28' class='img-circle'></img>"
									+data.conductores
								+ "</td>"
								+ "<td id='botones'>"
									+"<button id='btn_update' type='button' class='btn btn-warning btn-xs'>"
										+ "<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
									+"</button>"
									+"<button id='btn_delete' type='button' class='btn btn-danger btn-xs'>"
										+"<span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span>"
									+"</button>"
								+"</td>"
							+"</tr>";
			$('#contenido').prepend(contenido);
			$('#botones').hide();
			$('#fila').on('click',mostrarBtn);
			$('#fila').on('dblclick',ocultarBtn);
			limpiarCamposProg();
		},
		error: function(){
			//##########
			console.log("Error al enviar o recuperar datos de insert.php ");
			//##########
		}
	});
}
/**
 * Controla que los archivos de imagen esten seleccionados.
 * si estan llama al metodo para cargar los archivos y luego al metodo para actualizar los datos
 * @param Programacion
 */
function modificarProg(programacion){
	var prog_img = $('#prog_img');
	var cond_img = $('#cond_img');
	if(prog_img.val().length > 0 || cond_img.val().length > 0){
		$('#progress').show('fast');
		subirArchivosProg(prog_img);
		subirArchivosProg(cond_img);
		$('#progress').hide('fast');
	}
	modificarDataProg(programacion);	
}
/**
 * Actualiza los datos de una programacion atraves de POST.
 * @param Programacion
 */
function modificarDataProg(programacion){
	$.ajax({
		data : programacion,
		type: 'POST',
		url:"../api/programacion/update.php",
		dataType: 'json',
		success: function(data){
			console.log(data);
			fila.find("#td_nombre").html("<img id='img_prog' src='../img/prog-img/"+data.prog_img+"' with='28' height='28' class='img-circle'/>"+data.nombre);
			fila.find("#td_descripcion").text(data.descripcion);
			fila.find("#td_hora_inicio").text(data.hora_inicio);
			fila.find("#td_hora_fin").text(data.hora_fin);
			fila.find("#td_conductores").html("<img id='img_cond' src='../img/prog-img/"+data.cond_img+"' with='28' height='28' class='img-circle'/>"+data.conductores);		

			limpiarCamposProg();
		},
		error: function(){
			//##########
			console.log("Error al enviar o recuperar datos de update.php ");
			//##########
		}
	});
}
/**
 * Metodo para eliminar una programacion por medio de ajax atraves de POST.
 * @param Prog_id
 */
function eliminarProg(prog_id){
	var id={'prog_id':prog_id};
	$.ajax({
		data : id,
		type: 'POST',
		url:"../api/programacion/delete.php",
		success: function(data){
			if(data['delete']){
				$(fila).remove();
			}
		},
		error: function(){
			//##########
			console.log("Error al enviar o recuperar datos de delete.php");
			//##########
		}
	});
}
/**
 * Borra el contenido de los campos
 */
function limpiarCamposProg(){
	var campos = obtenerCamposProg();
	for(var i=0 ; i<campos.length ; i++){
		campos[i].val("");	
	}
	$('#btn_clear').hide('slow');
	isNew = true;
}
/**
 * Recupera la referencia de todos los campos del formulario
 * @return Array campos
 */
function obtenerCamposProg(){
	var campos=[];
	var inputs = $('input')
	inputs.each(function(index, element) {
        if(index < inputs.length-1){
			campos.push($(element));
		}
    });
	return campos
}
/**
 * Muestra los botones modificar y eliminar de la fila que se presiona el clic
 */
function mostrarBtn(){
	var	botones = $(this).find('#botones');
	if(botones.is(':hidden')){
		botones.show("slow");
		botones.find("#btn_update").bind('click',modoEdisionProg);
		botones.find("#btn_delete").bind('click',procesarEliminarProg);
	}
}	
/**
 * Oculta los botones modificar y eliminar de la fila que se presiona doble clic
 */
function ocultarBtn(){
	var	botones = $(this).find('#botones');
	if(botones.is(':visible')){
		botones.hide("slow");	
		botones.find("#btn_update").unbind('click');
		botones.find("#btn_delete").unbind('click');
	}
}	
/**
 * LLena los campos con los datos seleccionados para su modificacion
 * Oculta los botones de modigicar y eliminar y muestra el boton de cancelar o limpiar campos
 */
function modoEdisionProg(){
	isNew = false;
	fila = $(this).parent().parent();
	var campos = obtenerCamposProg();
	prog_id = fila.find("#prog_id").text();	
	campos[0].val(fila.find("#td_nombre").text());
	campos[1].val(fila.find("#td_descripcion").text());
	campos[2].val(fila.find("#td_hora_inicio").text());
	campos[3].val(fila.find("#td_hora_fin").text());
	campos[4].val(fila.find("#td_conductores").text());	
	$("#btn_clear").show('slow');
	fila.find("#botones").hide('slow');
	fila.find("#botones").each(function(index, element) {
        $(element).unbind('click');
    });
}
/**
 * Procesa la eliminacion de un registro
 */
function procesarEliminarProg(){
	fila = $(this).parent().parent();
	prog_id = fila.find("#prog_id").text();	
	eliminarProg(prog_id);
}
/**
 * Devuelve el nombre de un archivo
 * seleccionado desde un input file
 */
function nombre_archivo(archivo) {
  arch = archivo.split('\\');
  return arch[arch.length-1];
}
function src_name(archivo) {
  arch = archivo.split('/');
  return arch[arch.length-1];
}