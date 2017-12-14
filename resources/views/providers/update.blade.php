@extends('layouts.main')
@section('title', 'Fornecedores')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-industry fa-fw"></i>Fornecedores <small>Atualização</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('ProvidersController@index')}}"><i class="fa fa-industry fa-fw"></i> Fornecedores</a></li>
    <li class="active">Atualização</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      @include('includes.painel')
      <form id="update" name="update" method="post" action="{{action('ProvidersController@update', [$object->id])}}" >
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
              <label>Contato</label> 
                <input id="personal_contact" type="text" name="personal_contact" value="{{$object->personal_contact}}" class="form-control input-sm personal_contact">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>CEP</label> 
                <input id="postal_code" type="text" name="postal_code" value="{{$object->postal_code}}" class="form-control input-sm postal_code">
            </div>
          </div>
        </div>
                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Endereço</label> 
                <input id="address" type="text" name="address" value="{{$object->address}}" class="form-control input-sm address">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Numero</label> 
                <input id="address_number" type="text" name="address_number" value="{{$object->address_number}}" class="form-control input-sm address_number">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Complemento</label> 
                <input id="address_complement" type="text" name="address_complement" value="{{$object->address_complement}}" class="form-control input-sm address_complement">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Fone</label> 
                <input id="phone" type="text" name="phone" value="{{$object->phone}}" class="form-control input-sm phone">
            </div>
          </div>
        </div>        

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Celular</label> 
                <input id="cellphone" type="text" name="cellphone" value="{{$object->cellphone}}" class="form-control input-sm cellphone">
            </div>
          </div>
        </div>        

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Email</label> 
                <input id="email" type="text" name="email" value="{{$object->email}}" class="form-control input-sm email">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Site</label> 
                <input id="site" type="text" name="site" value="{{$object->site}}" class="form-control input-sm site">
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
    <p>O cadastro das Fornecedores no sistema tem como o objetivo o controle de todos os funcionarios das mesmas que serão cadatrados no sistema.</p>
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