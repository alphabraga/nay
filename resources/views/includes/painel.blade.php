<div id="painel" class="btn-group pull-right" role="group" style="padding:5px">
	<a href="{{action("$controller@edit", ['id' => $object->id])}}" name="update" class="btn btn-default"><span class="fa fa-retweet"></span> Atualizar</a>
	<a href="{{action("$controller@destroy", ['id' => $object->id])}}" data-token="{{ csrf_token() }}" data-redirect="redirect-to-index" name="delete" class="btn btn-danger delete-link"><span class="fa fa-times"></span> Excluir</a>
</div>