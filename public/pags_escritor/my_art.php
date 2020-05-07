<form action="<?php echo $_POST['upload']; ?>" method="post" accept-charset="utf-8">

    <input type="hidden" name="_token" value="<?php  echo $_POST['csrf']; ?>">

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
		<input type="submit" name="ver_my_art" value="Vizualizar Artigo" class="form-control btn btn-block btn-info">
	</div>
</form>