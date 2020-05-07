@extends('layouts.layfull')

@section('titulo-h')
	NewsOne | Pesquisa: {{$pesquisa['search_nome']}}
@endsection

@section('corpo')

	<div class="font-italic h3">
					Pesquisas relacionadas á: {{$pesquisa['search_nome']}}
	</div>
	
	<div class="font-italic small">
					Teve um total de : {{ count($news) }} Relacionadas
	</div>

	<table class="table table-striped">

				@if (count($news) == 0)
            	
            		<tr>
            			<td>
            				Não existem artigos relacionados á: {{$pesquisa['search_nome']}}
            			</td>
            		</tr>
				
				@else

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
										{{$element['name']}}
									</div>

								</a>
							</td>
						</tr>
					@endforeach

				@endif			
		

	</table>
@endsection