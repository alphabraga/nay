<div class="pull-right">
	<small>Criado por <b>{{$object->created_by}}</b> em <b>{{date('d/m/Y H:i:s',strtotime($object->created_at))}}</b></small>
	@if(strlen($object->updated_by))
	.<small>atualizado por <b>{{$object->updated_by}}</b> em <b>{{date('d/m/Y H:i:s',strtotime($object->updated_at))}}</b></small>
	@endif
</div>