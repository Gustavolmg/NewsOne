@extends('layouts.app')

@section('titulo-h')
	NewsOne || {{$artigo['titulo']}}
@endsection


@section('corpo-l')
				
	
			@php
				$noticia =  (file(asset('artigos/'.$artigo['texto'])));
			@endphp

			@foreach ($noticia as $el)
				{{$el}} </br>
			@endforeach

@endsection

@section('img-art')
	<img src="{{ asset('img/'.$artigo['img_art']) }}" class="img-300-200">
@endsection

@section('titulo-art')
		{{$artigo['titulo']}}
@endsection

@section('subtitulo-art')
		<div class="small" >
		{{$artigo['sub_titulo']}}
		</div>
@endsection

@section('data-art')
	{{$artigo['created_at']}} || {{$usuario['name']}}
@endsection

@section('corpo-r')


@endsection


@section('rodape')
	Ola mundo, esta um grande dia hoje. As arveres estão glandes e o as nozes estão pastadas. E como dizia o grande filosofo piton, tudo na vida depende do quanto voce quer comer amendoim
@endsection
