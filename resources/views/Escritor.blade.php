@extends('layouts.layfull')

@section('titulo-h')
	NewsOne | Sua pagina
@endsection


@section('corpo')


	<div class="row">
			{{-- Validaçãp dp usuario --}}
	@if ($usuario == null)

	    	<div class="col-6 offset-3 rounded p-2" id="case_login">
	
 
	    		<div class="h3 font-italic p-2">Login: </div>

	    		<form action="{{ route('login') }}" method="POST" accept-charset="utf-8">
	    		
	    			@csrf

	    			<div class="form-group">
	    				<label for="usuario_E">Usuário:</label>
	    				<input type="text" name="usuario" placeholder="Seu usuario" id="usuario_E" class="form-control">
	    			</div>

	    			<div class="form-group">
	    				<label for="senha_E">Senha:</label>
	    				<input type="password" name="senha" placeholder="Sua senha" id="senha_E" class="form-control">
	    			</div>


	    			<input type="submit" name="confirmação" class="btn btn-block btn-light">

	    		</form>

	    			<div class="small">
	    				<a href="{{ route('register') }}" class="btn btn-link btn-sm">Não está registrado?Clique aqui para Fazer cadastro!</a>
	    			</div> 

	    	</div>



	@else

	{{-- Começo da barra lateral --}}

	<div class="col-3">
		
		<ul class="list-group">
			<div class="list-group-item h4 font-italic active "> Bem vindo, {{ $usuario['name'] }}</div>
			<button class="btn list-group-item text-left" onclick=" select_page('perfil') ; "> Perfil </button>
			<button class="btn list-group-item text-left" onclick=" select_page('my_art') ; ">Meus Artigos</button>
			<button class="btn list-group-item text-left" onclick=" select_page('make_art') ; ">Criar Artigo</button>
			<button class="btn list-group-item text-left" onclick=" select_page('edt_art') ; ">Editar Artigo</button>
			<a href="{{ route('logout') }}" class="btn list-group-item text-left">Sair</a>
		</ul>


	</div>
	{{-- Fim da barra lateral --}}


	{{-- Começo da Área de escritor --}}
	<div class="col-9" id="text_escritor">
 	
	 	 <img src="{{ asset($usuario['img']) }} " class="img-thumbnail" align="left" width="150" height="150">

	 	 <div class="h5">
	 	 	Nome: <i> {{$usuario['name'] }}</i><br>
	 	 </div>

	 	 <div class="h6 text-muted">
	 	 	<p>Especialidade: {{ $usuario['area'] }}</p>
	 	 	<p>Email: <i>{{ $usuario['email'] }} </i></p>
	 	 	<p>Quantidade de artigos: {{ $usuario['art_feitos'] }} </p>
	 	 	<p>registrou-se em: {{ $usuario['entrou'] }} <br></p>
	 	 </div>


	 	 <button class="btn btn-info btn-block" onclick=" select_page('edt_perfil') ; ">Editar Perfil</button>

	</div>
	{{-- Fim da Área do escritor --}}

	<script>
		
		function select_page( qual = 'perfil' ){
			 var local = '{{ asset('pags_escritor') }}/' + qual + '.php';
			 var ar = <?php echo json_encode($artigos);  ?>;
			 var usuario =  <?php echo json_encode($usuario);  ?>;

		$.ajax({
			type: 'GET',
			dataType: 'json',
		})
		.always(function() {

			switch (qual) {
				case 'perfil':
					// statements_1
					$("#text_escritor").load( local , { 'usuario' : usuario, 'entrou' : '{{$usuario['entrou']}}' } );
				break;

				case 'my_art':
					// statements_1
					$("#text_escritor").load( local , { 'ar' : ar, 'upload' : '{{route('artigo_re')}}', 'csrf' : '{{ csrf_token() }}' } );
				break;

				case 'make_art':
					// statements_1
					$("#text_escritor").load( local, { 'criar' : '{{ route('ver_make_art') }}', 'csrf' : '{{ csrf_token() }}' } );
				break;

				case 'edt_art':
					// statements_1
					$("#text_escritor").load( local , { 'ar' : ar }  );
				break;

				case 'edt_perfil':
					// statements_1
					$("#text_escritor").load( local , { 'usuario' : usuario, 'csrf' : '{{ csrf_token() }}', 'upload' : '{{ route('edt_perfil') }}' } );
				break;

				default:
					$("#text_escritor").load( "{{asset('pags_escritor')}}/perfil.php", { 'usuario' : usuario});
			}



		});

		}

	</script>

 	@csrf



	@endif

	</div>

	@endsection


 	@csrf
 	