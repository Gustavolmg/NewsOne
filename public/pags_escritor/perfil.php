


 	
	<img src="<?php echo $_POST['usuario']['img']; ?> " class="img-thumbnail" align="left" width="150" height="150">

 	 <div class="h5">
 	 	Nome: <i><?php echo $_POST['usuario']['name']; ?></i><br>


 	 </div>

 	 <div class="h6 text-muted">
 	 	<p>Especialidade: <?php echo $_POST['usuario']['area']; ?></p>
 	 	<p>Email: <i><?php echo $_POST['usuario']['email']; ?> </i></p>
 	 	<p>Quantidade de artigos: <?php echo $_POST['usuario']['art_feitos']; ?> </p>
 	 	<p>registrou-se em: <?php echo $_POST['entrou']; ?> <br></p>
 	 </div>


 	 <button class="btn btn-info btn-block"  onclick=" select_page('edt_perfil') ; ">Editar Perfil</button>




	

 