@extends('layouts.app')

@section('titulo-h')
	NewsOne | {{$cat}}
@endsection

@section('corpo-l')


	<table class="table">

		<div class="bg-info rounded p-1 pl-2">

			<div class="font-italic h3">
				@if (!empty($busca['date_cat']))
					Pesquisas de:
					<h6>{{$busca['date_cat']}}</h6>
				@else
					Hoje:</br>
					<h6>{{date('Y-m-d')}}</h6>
				@endif
			</div>
		</div>

				@foreach ($news as $element)
					<tr >
						<td class="bg-light col-1" >
							<a href="{{ route('artigo', ['num' => $element['id_art']]) }}" class=" text-dark" style="text-decoration: none;">
								<img src="{{ asset('img/'.$element['img_art']) }}" class="img-thumbnail" align="left" width="100" height="100">

								<div class="font-italic font-weight-bold"> {{$element['titulo']}} </div>

								<div class="small text-truncate" style="max-width: 600px;">
									{{ nl2br($element['sub_titulo']) }}
								</div>

							</a>
							<a href="#" class=" text-dark" style="text-decoration: none;">
								
								<div class="blockquote-footer text-right">
									{{$element['name']}}
								</div>

							</a>
						</td>
					</tr>
				@endforeach

	</table>
@endsection

@section('corpo-r')

	<table class="table">

		{{-- Formulario --}}
		<tr>

			<td>

				<form  method="GET">

					<div class="form-group ">
						<label for="text">O que você procura? </label>
						<input type="text" name="tex_cat" value="{{$busca['tex_cat']}}" placeholder="Algo em mente?" id="text" class="form-control">
					</div>

						Deseja usar a datação para pesquisa?
						<div class="form-check">
							<label><input type="radio" name="date_v" value="sim" @if (isset($busca['date_v']) AND $busca['date_v'] == 'sim')checked @endif>Sim</label>
						</div>
						<div class="form-check">
							<label><input type="radio" name="date_v" value="nao"@if ($busca['date_v'] == 'nao' OR !isset($busca['date_v']))checked @endif >Não</label>
						</div>

					</div>

					<div class="form-group">
						<label for="date">Quando? </label>
						<input type="date" name="date_cat" value="{{date('Y-m-d') }}" placeholder="De que dia voce quer essa pesquisa?" id="date" class="form-control">
					</div>

						Em qual ordem:

					<div class="form-check">
						<label><input type="radio" name="ordem_cat" value="ASC" placeholder="Crescente" @if ($busca['ordem_cat'] == 'ASC' OR !isset($busca['ordem_cat']))checked @endif>Crescente</label>
					</div>

					<div class="form-check">
						<label><input type="radio" name="ordem_cat" value="DESC" placeholder="Decrescente" @if ($busca['ordem_cat'] == 'DESC' OR !isset($busca['ordem_cat']))checked @endif>Decrescente</label>
					</div>

					<div class="form-group">
						<input type="submit" name="sub_cat" value="Buscar" class="btn btn-info">
						<a href="{{ route('categoria', ['cat' => $cat]) }}" class="btn btn-warning">Limpar</a>
					</div>

				</form>


			</td>

		{{-- Fim do Formulario --}}
		</tr>


	</table>

@endsection