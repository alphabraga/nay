<div id="painel" class="btn-group pull-right" role="group" style="padding:5px">
	<a class="btn btn-info" href="{{URL::to('/' . $currentRouteName )}}"> <i class="fa fa-arrow-left fa-fw"></i> Voltar para Pesquisa</a>
	
	@if(!is_null($object->id))
		<a href="{{action("$controller@edit", ['id' => $object->id])}}" name="update" class="btn btn-default"><span class="fa fa-retweet"></span> Atualizar</a>
		<a href="{{action("$controller@destroy", ['id' => $object->id])}}" data-token="{{ csrf_token() }}" data-redirect="redirect-to-index" name="delete" class="btn btn-danger delete-link"><span class="fa fa-times"></span> Excluir</a>
	@endif
</div>