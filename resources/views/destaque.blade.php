@extends('layouts.app')

@section('titulo-h')
	NewsOne | Destaques
@endsection

@section('corpo-l')


	<table class="table">

		<div class="bg-info rounded p-1 pl-2">

			<div class="font-italic h3">
				Hoje:</br>
				<h6>{{ date('d m Y') }}</h6>
			</div>
		</div>
		<div class="row">

			<div class="col-2 text-truncate">

				@foreach ($news as $element)
					<tr >
						<td class="bg-light col-1" >
							<a href="{{ route('artigo').'/'.$element['id_art'] }}" class=" text-dark" style="text-decoration: none;">
								<img src="{{ asset('img/'.$element['img_art']) }}" class="img-thumbnail" align="left" width="100" height="100">

								<div class="font-italic font-weight-bold"> {{$element['titulo']}} </div>

								<div class="small text-truncate" style="max-width: 600px;">
									{{ nl2br($element['sub_titulo']) }}
								</div>

							</a>
							<a href="#" class=" text-dark" style="text-decoration: none;">
								
								<div class="blockquote-footer text-right">
									NOME DO AUTOR
								</div>
								
							</a>
						</td>
					</tr>
				@endforeach

			</div>
			
		</div>
		

	</table>
@endsection