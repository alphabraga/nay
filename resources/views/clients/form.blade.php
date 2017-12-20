@extends('layouts.main')
@section('title', 'Clientes')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-group fa-fw"></i>Clientes <small>Cadastro</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('ClientsController@index')}}"><i class="fa fa-group fa-fw"></i> Clientes</a></li>
    <li class="active">Cadastro</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
     @include('includes.painel')
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-group fa-fw"></i>Cadastro</a></a></li>
          <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-money fa-fw"></i>Transaçoes</a></li>
          <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-money fa-fw"></i>Contas em Aberto</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
              @if(is_null($object->id))
            <form id="update" name="update" method="post" action="{{action('ClientsController@store')}}" >
              <input type="hidden" name="_method" value="POST" />
              @else
              <form id="update" name="update" method="post" action="{{action('ClientsController@update', [$object->id])}}" >
                <input type="hidden" name="_method" value="PATCH" />
                @endif
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Nome</label><input id="name" type="text" name="name" value="{{old('name', $object->name)}}" class="form-control input-sm name">
            </div>
          </div>
        </div>
              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Telefone</label><input id="phone" type="text" name="phone" value="{{old('phone', $object->phone)}}" class="form-control input-sm phone">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Celular</label><input id="cellphone" type="text" name="cellphone" value="{{old('cellphone', $object->cellphone)}}" class="form-control input-sm cellphone">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>CPF</label><input id="cpf" type="text" name="cpf" value="{{old('cpf', $object->cpf)}}" class="form-control input-sm cpf">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Endereço de Entrega</label><input id="shipping_address" type="text" name="shipping_address" value="{{old('shipping_address', $object->shipping_address)}}" class="form-control input-sm shipping_address">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Número de Entrega</label><input id="shipping_number" type="text" name="shipping_number" value="{{old('shipping_number', $object->shipping_number)}}" class="form-control input-sm shipping_number">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Bairro de Entrega</label><input id="shipping_neighborhood" type="text" name="shipping_neighborhood" value="{{old('shipping_neighborhood',$object->shipping_neighborhood)}}" class="form-control input-sm shipping_neighborhood">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>CEP de Entrega</label><input id="shipping_postalcode" type="text" name="shipping_postalcode" value="{{old('shipping_postalcode', $object->shipping_number)}}" class="form-control input-sm shipping_postalcode">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Cidade de Entrega</label><input id="shipping_city" type="text" name="shipping_city" value="{{old('shipping_city', $object->shipping_city)}}" class="form-control input-sm shipping_city">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Estado de Entrega</label><input id="shipping_state" type="text" name="shipping_state" value="{{old('shipping_state', $object->shipping_state)}}" class="form-control input-sm shipping_state">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>País de Entrega</label><input id="shipping_country" type="text" name="shipping_country" value="{{old('shipping_country', $object->shipping_country)}}" class="form-control input-sm shipping_country">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Complemento de Entrega</label><input id="shipping_complement" type="text" name="shipping_complement" value="{{old('shipping_complement',$object->shipping_complement)}}" class="form-control input-sm shipping_complement">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Endereço de Cobrança</label><input id="billing_address" type="text" name="billing_address" value="{{old('billing_address', $object->billing_address)}}" class="form-control input-sm billing_address">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Número de Cobrança</label><input id="billing_number" type="text" name="billing_number" value="{{old('billing_number', $object->billing_number)}}" class="form-control input-sm billing_number">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Bairro de Cobrança</label><input id="billing_neighborhood" type="text" name="billing_neighborhood" value="{{old('billing_neighborhood', $object->billing_neighborhood)}}" class="form-control input-sm billing_neighborhood">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>CEP de Cobrança</label><input id="billing_postalcode" type="text" name="billing_postalcode" value="{{old('billing_postalcode', $object->billing_postalcode)}}" class="form-control input-sm billing_postalcode">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Cidade de Cobrança</label><input id="billing_city" type="text" name="billing_city" value="{{old('billing_city', $object->billing_city)}}" class="form-control input-sm billing_city">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Estado de Cobrança</label><input id="billing_state" type="text" name="billing_state" value="{{old('billing_state', $object->billing_state)}}" class="form-control input-sm billing_state">
            </div>
          </div>
        </div>

                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Paìs de Cobrança</label><input id="billing_country" type="text" name="billing_country" value="{{old('billing_country', $object->billing_country)}}" class="form-control input-sm billing_country">
            </div>
          </div>
        </div>
      

              <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Complemtno de Cobrança</label><input id="billing_complement" type="text" name="billing_complement" value="{{old('billing_complement', $object->billing_complement)}}" class="form-control input-sm billing_complement">
            </div>
          </div>
        </div>


          @if($showMode == false)
            @include('includes.formbutons')
          @endif
      </form>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
              <p class="bg-danger">Colocar dados financeiros</p>
            </div>
            <div class="tab-pane" id="tab_3">
              <p class="bg-danger">Colocar dados financeiros pendentes</p>
            </div>
            <!-- /.tab-pane -->
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        
      </div>
      <!-- /.box-body -->
    </div>
    {{-- @include('includes.timestamp') --}}
    <div id="info-text">
      <p>O cadastro das Categorias no sistema tem como o objetivo o controle de todos os funcionÃ¡rias das mesmas que serÃ£o cadatrados no sistema.</p>
    </div>
  </section>
  <!-- /.content -->
  @endsection
  @if(isset($showMode) && $showMode == true)
  @section('javascript')
  <script type="text/javascript">
  disableForm('update');
  </script>
  @endsection
  @endif