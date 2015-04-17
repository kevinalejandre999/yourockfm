$(document).ready(function() {
    var panel_prog;
	$.get('../templates/programacionestmpt.html',function(dom){
		panel_prog = dom;
	});
	$.ajax({
		type:'GET',
		url:"../api/programacion",
		success: function(data){
			var panel = $(panel_prog);
			for (var i=0;i<data.length;i++){
				var programacion = data[i];
				var en_aire = programacion.en_aire ? "Si" : "No";
				var contenido =  "<tr><th scope='row'>"+programacion.prog_id+"</th>"
								+ "<td>"+programacion.nombre+"</td>"
								+ "<td>"+programacion.descripcion+"</td>"
								+ "<td>"+programacion.hora_inicio+"</th>"
								+ "<td>"+programacion.hora_fin+"</th>"
								+ "<td>"+en_aire+"</th>"
								+ "<td>"+programacion.conductores+"</td></tr>";
				panel.find('#contenido').append(contenido);	
			}
			$('#principal').append(panel);
		},
		error: function(){
			consule.log("Error al recuperar programaciontmpt.html");
		}
	});
});
function procesar(){
	var nombre = $('#nombre').val();	
	console.log(nombre);
}
