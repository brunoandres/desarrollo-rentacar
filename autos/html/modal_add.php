<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Auto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Categoria</label>
							<select name="categoria">
								<opton value="0">A</option>
								<opton value="1">B</option>
								<opton value="2">C</option>
								<opton value="3">D</option>
								<opton value="4">E</option>
								<opton value="5">F</option>
							</select>
							
						</div>					
						<div class="form-group">
							<label>Marca</label>
							<input type="text" name="marca"  id="marca" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Modelo</label>
							<input type="text" name="modelo" id="nammodeloe" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Patente</label>
							<input type="text" name="patente" id="patente" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Habilitado</label>
							<select name="habilitado">
								<opton value="1">A</option>
								<opton value="0">B</option>
							</select>
						</div>
						<div class="form-group">
							<label>Habilitado</label>
							<select name="viaja_chile">
								<opton value="1">Si</option>
								<opton value="0">No</option>
							</select>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>