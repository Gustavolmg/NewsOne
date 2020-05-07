@extends('layouts.app')

@section('titulo-h')
	NewsOne || {{$artigo['titulo']}}
@endsection

@section('titulo-art')
		<form action="{{ route('make_art') }} " method="POST" accept-charset="utf-8" enctype="multipart/form-data"> 

		@csrf

		<input type="text" name="artigo_titulo" class="form-control" value="{{$artigo['titulo']}}" placeholder="O titulo do seu artigo">
@endsection
				
@section('subtitulo-art')
		<input type="text" name="artigo_subtitulo" class="form-control form-control-sm small" value="{{$artigo['sub_titulo']}}" placeholder="Seu subtitulo">
@endsection
	
@section('img-art')
	<img src="{{ asset('img/test.png') }}" class="img-300-200" align="left">
	<input type="file" name="image" class="form-control col-md-6">
@endsection

@section('data-art')
	Data de criação do artigo || Seu nome
@endsection

@section('corpo-l')
	<textarea name="artigo_text" class="form-control" rows="100" cols="80"></textarea>
	Categoria:
	<select name="cat" class="custom-select">
		<option value="saude">Saúde</option>
		<option value="transito">Transito</option>
		<option value="tecnologia">Tecnologia</option>
		<option value="beleza">Beleza</option>
		<option value="economia">Economia</option>
		<option value="educacao">Educação</option>
		<option value="politica">Política</option>
	</select>
	<input type="submit" name="criar_art" class="btn btn-block btn-info">

	</form>
@endsection
	


