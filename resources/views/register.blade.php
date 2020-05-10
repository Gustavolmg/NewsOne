@extends('layouts.layfull')

@section('titulo-h')
	NewsOne | Sua pagina
@endsection


@section('corpo')


	<div class="row">
			{{-- Validaçãp dp usuario --}}
	@if ($usuario == null)

	    	<div class="col-6 offset-3 rounded p-2" id="case_login">

	    		<div class="h3 font-italic p-2">Resgrite-se: </div>

	    		<form action="{{ route('register_m') }}" method="POST" accept-charset="utf-8">
	    		
	    			<input type='hidden' name='_token' value='{{csrf_token()}}'>

					@if ($errors->any())

						<h4>{{dd($errors)}}</h4>

					@endif
			
	    			<div class="form-group">
	    				<label for="usuario_E">Usuário:</label>
	    				<input type="text" name="usuario" placeholder="Seu usuario" id="usuario_E" class="form-control">
	    			</div>

	    			<div class="form-group">
	    				<label for="email_E">Email:</label>
	    				<input type="text" name="email" placeholder="Seu Email" id="email_E" class="form-control">
	    			</div>

	    			<div class="form-group">
	    				<label for="senha_E">Senha:</label>
	    				<input type="password" name="senha" placeholder="Sua senha" id="senha_E" class="form-control">
	    			</div>


	    			<input type="submit" value="Casdatrar-se" name="confirmação" class="btn btn-block btn-light">

	    		</form>

	    			<div class="small">
	    				<a href="{{ route('escritor') }}" class="btn btn-link btn-sm">Já tem conta? Fazer Login!</a>
	    			</div>


	    	</div>
	    @else

	    		<div class="h3 font-italic p-2">Você já está logado</div>


	    		<div class="small">
	    			<a href="{{ route('escritor') }}" class="btn btn-link btn-sm">Clique aqui para voltar para a pagina do escritor!</a>
	    		</div>


	@endif

	</div>

	@endsection


 	@csrf
 	