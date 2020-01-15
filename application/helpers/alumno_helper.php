<script >
	$(document).ready(function(){
		mostrarAlumnos();

		function mostrarAlumnos(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('alumnoC/get_alumno') ?>',
				dataType: 'json',

				success: function(datos){
					var tabla ='';
					var i;
					var n=1;

					for (i = 0; i<datos.length; i++) {
						tabla+=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].nombre+'</td>'+
						'<td>'+datos[i].apellido+'</td>'+
						'<td>'+datos[i].sexo+'</td>'+
						'<td>'+datos[i].seccion+'</td>'+
						'<td>'+datos[i].anio+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-danger borrar" data="'+datos[i].id_alumno+'">ELIMINAR</a>'+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-primary editar" data="'+datos[i].id_alumno+'">EDITAR</a>'+'</td>'+
						'</tr>';
						n++;
					}

					$('#tabla_alumno').html(tabla);
				}
			});
		};

		$('#tabla_alumno').on('click','.borrar',function(){
			$id = $(this).attr('data');
			$('#modalBorrar').modal('show');
			$('#modalBorrar').find('.modal-title').text('Eliminar Alumno');

			$('#btnBorrar').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: '<?= base_url('alumnoC/eliminar') ?>',
					data:{id:$id},
					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal('hide');
						
						if(respuesta==true){
							alertify.notify('Eliminado exitosamente','success',10,null);
						}else{
							alertify.notify('Error al eliminar','error',10,null);
						}
						mostrarAlumnos();						
					}
				});
			});
		});

		get_sexo();

		function get_sexo(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('alumnoC/get_sexo') ?>',
				dataType: 'json',

				success: function(datos){
					var op ='';
					var i;
					op+="<option value=''>Seleccione un sexo</option>";
					for (i = 0; i<datos.length; i++) {
						op+="<option value='"+datos[i].id_sexo+"'>"+datos[i].sexo+"</option>";	
					}

					$('#sexo').html(op);
				}
			});
		};

		get_seccion();

		function get_seccion(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('alumnoC/get_seccion') ?>',
				dataType: 'json',

				success: function(datos){
					var op ='';
					var i;

					op+="<option value=''>Seleccione un seccion</option>";

					for (i = 0; i<datos.length; i++) {
						op+="<option value='"+datos[i].id_seccion+"'>"+datos[i].seccion+"</option>";	
					}

					$('#seccion').html(op);
				}
			});
		};

		$('#nueAlumno').click(function(){
			$('#formAlumno')[0].reset();
			$('#modalAlumno').modal('show');
			$('#modalAlumno').find('.modal-title').text('Ingresar Alumno');
			$('#formAlumno').attr('action','<?= base_url('alumnoC/ingresar') ?>');
		});

		$('#btnGuardar').click(function(){
			$res= validar();

			if($res==true){
				$url = $('#formAlumno').attr('action');
				$data = $('#formAlumno').serialize();

				$.ajax({
					type: 'ajax',
					method: 'post',
					url: $url,
					data: $data,
					dataType: 'json',

					success: function(respuesta){
						$('#modalAlumno').modal('hide');

						if(respuesta=='add'){
							alertify.notify('Ingresado exitosamente','success',10,null);
						}else if(respuesta=='adi'){
							
							alertify.notify('Actualizado exitosamente','success',10,null);
							
						}else{
							alertify.notify('Error al eliminar','error',10,null);
						}
						$('#formAlumno')[0].reset();
						mostrarAlumnos();						
					}
				});
			}
		});

		$('#tabla_alumno').on('click','.editar',function(){
			$id = $(this).attr('data');

			$('#modalAlumno').modal('show');
			$('#modalAlumno').find('.modal-title').text('Editar Alumno');
			$('#formAlumno').attr('action','<?= base_url('alumnoC/ingresar') ?>');

			$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?= base_url('alumnoC/get_datos') ?>',
				data:{id:$id},
				dataType: 'json',

				success: function(datos){
					$('#id').val(datos.id_alumno);
					$('#nombre').val(datos.nombre);
					$('#apellido').val(datos.apellido);
					$('#sexo').val(datos.id_sexo);
					$('#seccion').val(datos.id_seccion);
					$('#anio').val(datos.anio);
				}
			});
			
		});

		function validar(){
			$nombre= $('#nombre').val();
			$apellido= $('#apellido').val();
			$sexo= $('#sexo').val();
			$seccion= $('#seccion').val();
			$anio= $('#anio').val();

			if($nombre==0 || $nombre>30){
				$('#nombre').css('borderColor','red');
				$('#nombre').css('placeholdeer','Campo obligatorio');
				$('#nombre').css('boxShadow','0 0 5px red');
				return false;
			}else{
				$('#nombre').css('borderColor','green');
				$('#nombre').css('boxShadow','0 0 5px green');
			}


			if($apellido==0 || $apellido>30){
				$('#apellido').css('borderColor','red');
				$('#apellido').css('placeholdeer','Campo obligatorio');
				$('#apellido').css('boxShadow','0 0 5px red');
				return false;
			}else{
				$('#apellido').css('borderColor','green');
				$('#apellido').css('boxShadow','0 0 5px green');
			}


			if($sexo==''){
				$('#sexo').css('borderColor','red');
				$('#sexo').css('boxShadow','0 0 5px red');
				return false;
			}else{
				$('#sexo').css('borderColor','green');
				$('#sexo').css('boxShadow','0 0 5px green');
			}


			if($seccion==''){
				$('#seccion').css('borderColor','red');
				$('#seccion').css('boxShadow','0 0 5px red');
				return false;
			}else{
				$('#seccion').css('borderColor','green');
				$('#seccion').css('boxShadow','0 0 5px green');
			}


			if($anio==''){
				$('#anio').css('borderColor','red');
				$('#anio').css('placeholdeer','Campo obligatorio');
				$('#anio').css('boxShadow','0 0 5px red');
				return false;
			}else{
				$('#anio').css('borderColor','green');
				$('#anio').css('boxShadow','0 0 5px green');
			}

			return true;
		}

	});
</script>