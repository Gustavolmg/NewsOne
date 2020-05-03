	

    <form action="<?php echo $_POST['upload']; ?>" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="<?php  echo $_POST['csrf']; ?>">

            <div class="form-group">
                Sua foto de perfil:
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
                Seu nome:
                <input type="text" name="name" class="form-control" value="<?php echo $_POST['usuario']['name']; ?>" placeholder="Seu nome de usuario">
            </div>

            <div class="form-group">
                Qual(is) área(s) você atua:
                <select name="cetegorias[]" class="custom-select" multiple>
                    <option value="saude">Saúde</option>
                    <option value="beleza">Beleza</option>
                    <option value="transito">Tránsito</option>
                    <option value="tecnologia">Tecnologia</option>
                    <option value="educacao">Educação</option>
                    <option value="politica">Política</option>
                </select>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-success">Confirmar edição</button>
            </div>
   

        </form>