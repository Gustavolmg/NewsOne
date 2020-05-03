<form action="<?php echo$_POST['criar']; ?>" method="GET" accept-charset="utf-8">

    <input type="hidden" name="_token" value="<?php  echo $_POST['csrf']; ?>">

	<div class="form-group">
		<label for="titulo">Titulo:</label>
		<input type="text" class="form-control" name="art_nome" placeholder="Ex: Coronga" id="titulo" required>
	</div>

	<div class="form-group">
		<label for="descricao">Sub-Titulo:</label>
		<input type="text" class="form-control" name="art_descricao" placeholder="Ex: É um virus que atingil nivel de pandemia global e assustas varias pessoas ao redor do mundo" id="descricao" required>
	</div>

	<div class="form-group">
		<label for="categoria">Categoria:</label>
		<input type="text" class="form-control" name="art_cat" placeholder="Ex: Drama" id="categoria" required>
	</div>

	<div class="form-group">
		<input type="submit" class="form-control btn-info" name="ver_make_art" value="Iniciar Artigo">
	</div>

</form>