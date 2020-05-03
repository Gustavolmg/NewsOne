<form action="#" method="POST" accept-charset="utf-8">
	<div class="form-group">
		<label for="sel_art" class="h5">Seus artigos | Vizualizações</label>
		<select name="artigos_teus" class="form-control" id="sel_art" multiple required>
			<?php 
				foreach ($_POST['ar'] as $value) {
					echo "<option value='{$value['id_art']}'>{$value['titulo']} | {$value['views']} views</option>";
				}
			 ?>
			

		</select>
	</div>
	<div class="form-group">
		<input type="submit" name="ver_edt_art" value="Editar Artigo" class="form-control btn btn-block btn-info">
	</div>
</form>