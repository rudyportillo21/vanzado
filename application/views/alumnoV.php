<?php $this->load->helper('alumno') ?>
<body class="container">
	<button type="button" class="btn btn-outline-success" id="nueAlumno">Nuevo Alumno</button>
	<table border="1" class="table table-dark table-hover">
		<thead>
			<tr>
				<td>N°</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Sexo</td>
				<td>Seccion</td>
				<td>Año</td>
				<td>Eliminar</td>
				<td>Editar</td>
			</tr>
		</thead>
		<tbody id="tabla_alumno">
		</tbody>
	</table>

	<div class="modal" tabindex="-1" role="dialog" id="modalBorrar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Esta seguro de eliminar este alumno?</p>
				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-danger" id="btnBorrar">Si, Eliminar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					
				</div>
			</div>
		</div>
	</div>

	<div class="modal" tabindex="-1" role="dialog" id="modalAlumno">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="formAlumno" action="" method="POST">
						<input type="hidden" name="id_alumno" id="id">
						<div>
							<label>Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre de alumno..." maxlength="30">
						</div>
						<div>
							<label>Apellido</label>
							<input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese nombre de alumno..." maxlength="30">
						</div>
						<div>
							<label>Sexo</label>
							<select id="sexo" name="sexo" class="form-control">
								
							</select>
						</div>
						<div>
							<label>Seccion</label>
							<select id="seccion" name="seccion" class="form-control">
								
							</select>
						</div>

						<div>
							<label>Año</label>
							<input type="number" name="anio" id="anio" class="form-control" placeholder="Ingrese el Año..">
						</div>
					</form>
				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					
				</div>
			</div>
		</div>
	</div>