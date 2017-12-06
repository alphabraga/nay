@extends('layouts.main')
@section('title', 'Categorias')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-square fa-fw"></i>Categorias <small>Atualização</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('BrandsController@index')}}"><i class="fa fa-square fa-fw"></i> Categorias</a></li>
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
              <label>Telefone</label><input id="phone" type="text" name="phone" value="{{$object->name}}" class="form-control input-sm phone">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Celular</label><input id="cellphone" type="text" name="cellphone" value="{{$object->name}}" class="form-control input-sm cellphone">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>CPF</label><input id="cpf" type="text" name="cpf" value="{{$object->name}}" class="form-control input-sm cpf">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Endereço de Entrega</label><input id="shipping_address" type="text" name="shipping_address" value="{{$object->name}}" class="form-control input-sm shipping_address">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Número de Entrega</label><input id="shipping_number" type="text" name="shipping_number" value="{{$object->name}}" class="form-control input-sm shipping_number">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Bairro de Entrega</label><input id="shipping_neighborhood" type="text" name="shipping_neighborhood" value="{{$object->name}}" class="form-control input-sm shipping_neighborhood">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>CEP de Entrega</label><input id="shipping_postalcode" type="text" name="shipping_postalcode" value="{{$object->name}}" class="form-control input-sm shipping_postalcode">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Cidade de Entrega</label><input id="shipping_city" type="text" name="shipping_city" value="{{$object->name}}" class="form-control input-sm shipping_city">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Estado de Entrega</label><input id="shipping_state" type="text" name="shipping_state" value="{{$object->name}}" class="form-control input-sm shipping_state">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Estado de Entrega</label><input id="shipping_country" type="text" name="shipping_country" value="{{$object->name}}" class="form-control input-sm shipping_country">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Complemento de Entrega</label><input id="shipping_complement" type="text" name="shipping_complement" value="{{$object->name}}" class="form-control input-sm shipping_complement">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Endereço de Cobrança</label><input id="billing_address" type="text" name="billing_address" value="{{$object->name}}" class="form-control input-sm billing_address">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>billing_number</label><input id="billing_number" type="text" name="billing_number" value="{{$object->name}}" class="form-control input-sm billing_number">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>billing_neighborhood</label><input id="billing_neighborhood" type="text" name="billing_neighborhood" value="{{$object->name}}" class="form-control input-sm billing_neighborhood">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>billing_postalcode</label><input id="billing_postalcode" type="text" name="billing_postalcode" value="{{$object->name}}" class="form-control input-sm billing_postalcode">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>billing_city</label><input id="billing_city" type="text" name="billing_city" value="{{$object->name}}" class="form-control input-sm billing_city">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>billing_state</label><input id="billing_state" type="text" name="billing_state" value="{{$object->name}}" class="form-control input-sm billing_state">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>billing_country</label><input id="billing_country" type="text" name="billing_country" value="{{$object->name}}" class="form-control input-sm billing_country">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>billing_complement</label><input id="billing_complement" type="text" name="billing_complement" value="{{$object->name}}" class="form-control input-sm billing_complement">
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
@endsection
@endif
@endsection