@extends('layouts.main')
@section('title', 'Marcas')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-square fa-fw"></i>Marcas <small>Atualização</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('BrandsController@index')}}"><i class="fa fa-square fa-fw"></i> Marcas</a></li>
    <li class="active">Atualização</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      @include('includes.painel')
      <form id="update" name="update" method="post" action="{{action('CategoriesController@update', [$object->id])}}" >
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
              <label>Categpria Mãe</label> <br>
                <select id="category_id" name="category_id" class="form-control input-sm select2" required="required">
                  <option value="">EScolha uma Categoria...</option>
                  @foreach($categories as $c)
                    <option value="{{$c->id}}" @if($object->category_id == $c->id) selected="selected" @endif>{{$c->name}}</option>
                  @endforeach
                </select>
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
    <p>O cadastro das Categorias no sistema tem como o objetivo o controle de todos os funcionarios das mesmas que serÃ£o cadatrados no sistema.</p>
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