@extends('layouts.main')
@section('title', 'Produtos')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-square fa-fw"></i>Produtos <small>Atualização</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('ProductsController@index')}}"><i class="fa fa-square fa-fw"></i> Produtos</a></li>
    <li class="active">Atualização</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      @include('includes.painel')
      <form id="update" name="update" method="post" action="{{action('ProductsController@update', [$object->id])}}" >
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="_method" value="PATCH" />
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Nome</label><input id="name" type="text" name="name" value="{{$object->name}}" class="form-control input-sm name">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Slug</label><input id="slug" type="text" name="slug" value="{{$object->slug}}" disabled="disabled" class="form-control input-sm name">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Descrição</label>
              <textarea class="form-control input-sm name" name="description" id="description" >
              {{$object->description}}
              </textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Tags</label>
              <select name="tags[]" class="form-control select2-tags" multiple >
                @foreach($object->tags as $t)
                <option value="{{$t}}" selected="selected">{{$t}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Quantidade Limite</label> 
                <input id="quantity_limit" type="text" name="quantity_limit" value="{{$object->quantity_limit}}" class="form-control input-sm quantity_limit">
            </div>
          </div>
        </div>
      <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Quantidade</label> 
                <input id="quantity" type="text" name="quantity" value="{{$object->quantity}}" class="form-control input-sm quantity">
            </div>
          </div>
        </div>

      <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Preço</label> 
                <input id="price" type="text" name="price" value="{{$object->price}}" class="form-control input-sm price">
            </div>
          </div>
        </div>
        @include('includes.formbutons')
      </form>
      
    </div>
    <!-- /.box-body -->
  </div>
  @include('includes.timestamp')
  <div id="info-text">
    <p>O cadastro dos Produtos no sistema tem como o objetivo o controle dos mesmos que serão cadatrados no sistema.</p>
  </div>
</section>
<!-- /.content -->
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function()
{
$('div#select-estado').on('change', function(e)
{
var id_estado = $('select#estado').val();
$('select#municipio option').remove();
$.getJSON('{{URL::to('/pegarCidades')}}/'+id_estado, function(data)
{
$.each(data, function(i, item)
{
var cidade = {{(strlen($object->fk_cidade_id))? $object->fk_cidade_id:'undefined'}};
if(item.id == cidade )
{
$('select#municipio').append($('<option selected="selected" value="'+item.id+'">'+item.nome+'</option>'));
}
else
{
$('select#municipio').append($('<option>', { value: item.id, text : item.nome }));
  }
  });
  });
  });
  $('select#estado').trigger('change');
  });
  </script>
  @if(isset($showMode) && $showMode == true)
  @section('javascript')
  <script type="text/javascript">
  disableForm('update');
  </script>
  @endsection
  @endif
  @endsection