
<div id="mfp-build-tool" class="modal-mensaje">
	<form id="form-cliente-add" class="" enctype="multipart/form-data" action="" method="post">
		<input type="hidden" class="postid" name="postid" value="<?=$_GET['post']?>">
		<fieldset>
		<legend>Editar Comentario</legend> 
		<div class="row">
			<div class="col-12">
				<div class="col-12">
					<div class="form-group">
						<label class="col-12 no-padding">Nombre</label>
						<input type="text" class="form-control nombre" name="nombre" id="nombre" title="nombre" value="<?=$_POST['name']?>" tabindex="1">
						<div class="form-error" id="error_nombre"></div>
					</div>
				</div>
			
				<div class="col-12">
						<div class="form-group">
							<label class="col-12 no-padding">Email</label>
							<input type="text" class="form-control email" name="email" id="email" title="email" value="<?=$_POST['email']?>" tabindex="3">
							<div class="form-error" id="error_email"></div>
						</div>
				</div>

                <div class="col-12">
					<div class="form-group">
						<label class="col-12 no-padding">Comentario</label>
						<div class="form-group">
							<textarea  class="col-12 descripcion" name="descip" rows="5" tabindex="6"><?=$_POST['body']?></textarea>
						</div>
					</div>
				</div>

			</div>
			
		</div>
		<div class="col-12 put-btn">
			<button type="submit" class="btn btn-update"><i class="fas fa-plus-circle"></i> Actualizar</button>
			<button class="btn btn-cancel"><i class="fas fa-minus-circle"></i> Cancelar</button>
		</div>
		</fieldset>
	</form>
</div>