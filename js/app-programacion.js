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
									+"<th scope='row' id='prog_id'>"+programacion.prog_id+"</th>"
									+ "<td>"+programacion.nombre+"</td>"
									+ "<td>"+programacion.descripcion+"</td>"
									+ "<td>"+programacion.hora_inicio+"</th>"
									+ "<td>"+programacion.hora_fin+"</th>"
									+ "<td>"+programacion.conductores+"</td>"
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
/*
 * Inicia el proceso de insercion.
 * Verifica que los campos no esten vacios
 * Crea el objeto programacion y lo inserta con ajax
 */
function procesar_form(){
	if(validar_text()){
		var programacion = crearProgramacion();
		/*###############################*/
		console.log(JSON.stringify(programacion));
		/*###############################*/
		insertar(programacion);
	};
}
/*
 * Verifica que los campos no esten vacios.
 * @return boolean listo
 */
function validar_text(){
	var campos = obtenerCampos();
	var listo = true;
	for(var i=0 ; i<campos.length ; i++){
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
}
/**
 * Instancia un objeto programacion
 * utilizando los valores contenidos en los inputs
 * @return Programacion
 */
function crearProgramacion(){
	var campos = obtenerCampos();
	var programacion = new Programacion();
	programacion.nombre = campos[0].val();
	programacion.descripcion = campos[1].val();
	programacion.hora_inicio = campos[2].val();
	programacion.hora_fin = campos[3].val();
	programacion.conductores = campos[4].val();
	return programacion;
}
/**
 * Metodo para insertar una programacion por medio de ajax atraves de POST.
 * @param Programacion
 * @return boolean
 */
function insertar(programacion){
	$.ajax({
		data : programacion,
		type: 'POST',
		url:"../api/programacion/insert.php",
		dataType: 'json',
		success: function(data){
			var contenido =  "<tr id='fila'>"
								+"<th scope='row' id='prog_id'>"+data.prog_id+"</th>"
								+ "<td>"+data.nombre+"</td>"
								+ "<td>"+data.descripcion+"</td>"
								+ "<td>"+data.hora_inicio+"</th>"
								+ "<td>"+data.hora_fin+"</th>"
								+ "<td>"+data.conductores+"</td>"
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
			limpiarCampos();
		},
		error: function(){
			console.log("Error al enviar o recuperar datos de insert.php ");
		}
	});
}
/**
 * Borra el contenido de los campos
 */
function limpiarCampos(){
	var campos = obtenerCampos();
	for(var i=0 ; i<campos.length ; i++){
		campos[i].val("");	
	}
}
/**
 * Recupera la referencia de todos los campos del formulario
 * @return Array campos
 */
function obtenerCampos(){
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
 * 
 */
function modoEdisionProg(){
	var prog_id = $(this).parent().parent().find("#prog_id").text();
	console.log("pasa a modo edision -> id="+prog_id);	
}
/**
 * 
 */
function procesarEliminarProg(){
	var prog_id = $(this).parent().parent().find("#prog_id").text();
	console.log("procesar Eliminar -> id="+prog_id);	
}