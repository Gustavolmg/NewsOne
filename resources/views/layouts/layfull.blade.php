<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('titulo-h', 'Sem titulo')</title>
	
	    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer>
    	@stack('javascript')
    </script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
    	.img-300-200{
    		height: 300px;
    	}
    	.slide{
    		height: 300px;
    	}
    </style>

</head>
<body>

	{{-- Barra de navegação --}}
		<nav class="navbar navbar-expand-lg navbar-light bg-white alert">

			<a href="{{ route('home') }}" class="navbar-brand font-weight-bold font-italic"><h1>NewsOne</h1></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#noticias" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	   				 <span class="navbar-toggler-icon"></span>
	  			</button>
	  		<div class="collapse navbar-collapse" id="noticias">
			
		 	<ul class="navbar-nav">

		 		<li class="nav-item h5"> <a href="{{ route('destaque') }}" class="nav-link">Destaques</a></li>

		 		<li class="nav-item h5"> <a href="{{ route('categoria', ['cat' => 'saude']) }}" class="nav-link">Saúde</a></li>

		 		<li class="nav-item h5 dropdown">

			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Catégorias
			        </a>

		 		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="{{ route('categoria', ['cat' => 'beleza']) }}">Beleza</a>
		          <a class="dropdown-item" href="{{ route('categoria', ['cat' => 'transito']) }}">Trânsito</a>
		          <a class="dropdown-item" href="{{ route('categoria', ['cat' => 'economia' ]) }}">Economia</a>
		          <a class="dropdown-item" href="{{ route('categoria', ['cat' => 'educacao' ]) }}">Educação</a>
		          <a class="dropdown-item" href="{{ route('categoria', ['cat' => 'tecnologia' ]) }}">Tecnologia</a>
		          <a class="dropdown-item" href="{{ route('categoria', ['cat' => 'politica' ]) }}">Politica</a>
		        </div>

		   		 </li>

		 		<li  class="nav-item h5"> <a href="{{ route('sobre_nos') }}" class="nav-link">Sobre nós</a></li>

		 		<li class="nav-item h5"> <a href="{{ route('apoie') }}" class="nav-link">Apoie </a></li>

		 		<li class="nav-item h5"><a href="{{ route('escritor') }}" class="nav-link">Área do escritor </a></li>
		 	
		 	</ul>

		 	<form method="POST" action="{{ route('busca') }}" class="form-inline ml-auto">
		 		{{ csrf_field() }}
			  <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="search_nome">
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar manchete</button>
			</form>

		</div>
			

		</nav>
 	{{-- Fim da barra de navegação --}}

 	{{--  Slides --}}
	
 		<div class="container  ">

	 		<div class="row justify-content-center">

	 			<div class="col-10 my-3">

			 		<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
					  <ol class="carousel-indicators">
					    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					  </ol>
					  <div class="carousel-inner">
					  	
					  	@php
					  		$list = 1;
					  	@endphp

					  	@foreach ($corousel as $element)
						    <div class="carousel-item <?php if($list == 1){ echo 'active';} ?>">
						      <img class="d-block w-100 slide" src="{{ asset('img/'.$element['img_art']) }}" alt="{{$element['titulo']}} Slide">
						     	 <div class="carousel-caption d-none d-md-block">
								    <h5>{{$element['titulo']}}</h5>
								    <p>{{$element['sub_titulo']}}</p>
							 	</div>
						    </div>
						    @php
						    	$list++;
						    @endphp
					  	@endforeach

					  	
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Anterior</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Próximo</span>
					  </a>
					</div>
	 				

	 			</div>
	 			
	 		</div>
 			
 		</div>

 	{{-- Fim dos Slides --}}
		

 	{{-- Corpo do sistema --}}
	<div class="container bg-white">

		{{-- Inicio da primeira linha --}}
		<div class="row p-3">

			{{-- Inicio da primeira coluna --}}
			<div class="col-12">

				@yield('corpo', 'Pagina indisponivel no momento. Por favor aguarde até que o moderador corriga o problema. Tente novamente amanhã.')

			{{-- Fim da primeira coluna --}}
			</div>

		{{-- Fim da primeira linha --}}
		</div>

	</div>
	{{-- Fim do corpo --}}


	{{-- Rodapé --}}
	<div class="container bg-white ">
		<div class="row align-items-center my-2 py-2">
			<div class="col-12">

				

				<table class="table h4">
					
					<thead>
						<th class="text-center" colspan="3">Contribua conosco</th>
					</thead>

					<tbody>
						{{-- Inicio fa primeira linha da tebela --}}
						<tr>

							{{-- Primeira parte da lista --}}
							<td>
								<ul>
									<li>Ajuda</li>
									<li>Reporte</li>
								</ul>
							</td>

							{{-- Segunda parte da lista --}}
							<td>
								<ul>
									<li><a class="text-dark" href="{{ route('sobre_nos') }}">Sobre nós </a></li>
									<li><a class="text-dark" href="{{ route('sobre_nos') }}"> Contatos </a></li>
								</ul>
							</td>

							{{-- Terceira parte da lista --}}
							<td>
								<ul>
									<li><a class="text-dark" href="{{ route('apoie') }}">Apoie </a></li>
									<li><a class="text-dark" href="{{ route('escritor') }}">Seja um escritor </a></li>
								</ul>
							</td>

							{{-- Fim da primeira linha da tabela --}}
						</tr>

						<tr>
							{{-- Marketing --}}
							<td colspan="3" class="h5 text-muted">
								Site criado interiamente por GunisInc, Se quiser um site para você também, venha nos procurar, fazemos o trabalho com velocidade e eficiencia.<br>
								Contato: <a href="mailto:GuniInc@gmail.com.br?subject=feedback" "email me">GuniInc@gmail.com.br</a> 
							</td>

						</tr>

					</tbody>

				</table>
				

			</div>
		</div>
	</div>
	{{-- Fim do rodapé --}}
	
</body>
</html>