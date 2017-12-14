@extends('layouts.main')
@section('title', 'Clientes')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-group  fa-fw"></i>Clientes <small>Cadastro</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('ClientsController@index')}}"><i class="fa fa-group  fa-fw"></i> Clientes</a></li>
    <li class="active">Cadastro</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      @include('includes.menu-cadastro')
      <form id="update" name="update" method="post" action="{{action('ClientsController@store')}}" >
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="_method" value="POST" />
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Nome</label><input id="name" type="text" name="name" value="" class="form-control input-sm name">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Telefone</label><input id="phone" type="text" name="phone" value="" class="form-control input-sm phone">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Celular</label><input id="cellphone" type="text" name="cellphone" value="" class="form-control input-sm cellphone">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>CPF</label><input id="cpf" type="text" name="cpf" value="" class="form-control input-sm cpf">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Endereço de Entrega</label><input id="shipping_address" type="text" name="shipping_address" value="" class="form-control input-sm shipping_address">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Número de Entrega</label><input id="shipping_number" type="text" name="shipping_number" value="" class="form-control input-sm shipping_number">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Bairro de Entrega</label><input id="shipping_neighborhood" type="text" name="shipping_neighborhood" value="" class="form-control input-sm shipping_neighborhood">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>CEP de Entrega</label><input id="shipping_postalcode" type="text" name="shipping_postalcode" value="" class="form-control input-sm shipping_postalcode">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Cidade de Entrega</label><input id="shipping_city" type="text" name="shipping_city" value="" class="form-control input-sm shipping_city">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Estado de Entrega</label><input id="shipping_state" type="text" name="shipping_state" value="" class="form-control input-sm shipping_state">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>País de Entrega</label><input id="shipping_country" type="text" name="shipping_country" value="" class="form-control input-sm shipping_country">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Complemento de Entrega</label><input id="shipping_complement" type="text" name="shipping_complement" value="" class="form-control input-sm shipping_complement">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Endereço de Cobrança</label><input id="billing_address" type="text" name="billing_address" value="" class="form-control input-sm billing_address">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Número de Cobrança</label><input id="billing_number" type="text" name="billing_number" value="" class="form-control input-sm billing_number">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Bairro de Cobrança</label><input id="billing_neighborhood" type="text" name="billing_neighborhood" value="" class="form-control input-sm billing_neighborhood">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>CEP de Cobrança</label><input id="billing_postalcode" type="text" name="billing_postalcode" value="" class="form-control input-sm billing_postalcode">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Cidade de Cobrança</label><input id="billing_city" type="text" name="billing_city" value="" class="form-control input-sm billing_city">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Estado de Cobrança</label><input id="billing_state" type="text" name="billing_state" value="" class="form-control input-sm billing_state">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Paìs de Cobrança</label><input id="billing_country" type="text" name="billing_country" value="" class="form-control input-sm billing_country">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Complemtno de Cobrança</label><input id="billing_complement" type="text" name="billing_complement" value="" class="form-control input-sm billing_complement">
            </div>
          </div>
        </div>


        @include('includes.formbutons')
      </form>
      
    </div>
    <!-- /.box-body -->
  </div>
  {{-- @include('includes.timestamp') --}}
  <div id="info-text">
    <p>O cadastro das Clientes do sistema.</p>
  </div>
</section>
<!-- /.content -->
@endsection