@extends('layouts.main')
@section('title', 'Usuário')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-square fa-fw"></i>Usuários <small>Atualização</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('UsersController@index')}}"><i class="fa fa-square fa-fw"></i> Usuários</a></li>
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
              <label>Username</label><input id="userame" type="text" name="username" value="{{$object->username}}" class="form-control input-sm email">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Email</label><input id="email" type="text" name="email" value="{{$object->email}}" class="form-control input-sm email">
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