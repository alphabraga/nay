@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-gears fa-fw"></i>Configurações<small>Edição</small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-gears fa-fw"></i>Configurações</a></li>
    <li class="active">Edição</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      <form id="update" name="update" method="post" action="{{URL::to('configuration/1')}}">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="_method" value="PATCH" />
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nome Sistema</label>
              <input id="system_name" type="text" name="system_name" value="{{$object->system_name}}" class="form-control input-sm up">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nome Fantasia</label>
              <input id="fantasy_name" type="text" name="fantasy_name" value="{{$object->fantasy_name}}" class="form-control input-sm up">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Razão Social</label>
              <input id="social_name" type="text" name="social_name" value="{{$object->social_name}}" class="form-control input-sm up">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Descrição</label>
              <textarea id="descricao" name="description" class="form-control">{{$object->description}}</textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label>Tags</label>
              <select name="tags[]" class="form-control select2-tags" multiple >
              @foreach($object->tags as $t):
                <option value="{{$t}}" selected="selected">{{$t}}</option>
              @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input id="email" type="text" name="email" value="{{$object->email}}" class="form-control input-sm up">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>CNPJ</label>
              <input id="cnpj" type="text" name="cnpj" value="{{$object->cnpj}}" value="" class="form-control input-sm up">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Telefone</label>
              <input id="phone" type="text" name="phone" value="{{$object->phone}}" class="form-control input-sm up">
            </div>
          </div>
        </div>

         <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Celular</label>
              <input id="cellphone" type="text" name="cellphone" value="{{$object->cellphone}}" class="form-control input-sm up">
            </div>
          </div>
        </div>

         <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>PagSeguro API Key</label>
              <input id="pagseguro_api_key" type="text" name="pagseguro_api_key" value="{{$object->pagseguro_api_key}}" class="form-control input-sm up">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Email de Contato do Administrador</label>
              <div class="input-group">
              <input id="administrator_system_email" type="text" name="administrator_system_email" value="{{$object->administrator_system_email}}" class="form-control input-sm up">
              <div class="input-group-btn">
                  <button type="button" class="btn btn-info input-info" data-text="Esse email deve ser utilizado para que os usuários do sistema entrem em contato com os administradores do sistema "><i class="fa fa-info"></i></button>
                </div>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Endereço</label>
              <input id="address" type="text" name="address" value="{{$object->address}}" class="form-control input-sm up">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Estado</label>
              <input id="state_code" type="text" name="state_code" value="{{$object->state_code}}" class="form-control input-sm up">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>País</label>
              <input id="country_code" type="text" name="country_code" value="{{$object->country_code}}" class="form-control input-sm up">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>CEP</label>
              <input id="postal_code" type="text" name="postal_code" value="{{$object->postal_code}}" class="form-control input-sm up">
            </div>
          </div>
        </div>
     
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Latitude & Longitude</label>
              <input id="latitude" type="text" name="latitude" value="{{$object->latitude}}" class="form-control input-sm up">
              <input id="longitude" type="text" name="longitude" value="{{$object->longitude}}" class="form-control input-sm up">
            </div>
          </div>
        </div>


         <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Cliente Fixo</label>
              <input class="form-control input-sm up" type="textarea" name="default_client_id" disabled="disabled" value="{{$defaultClient->id}}">
              <input id="default_client" type="text" name="default_client" value="{{$defaultClient->name}}" disabled="disabled" class="form-control input-sm up">
            </div>
          </div>
        </div>


        <div class="botoes">
          <input id="btnSave" type="submit" name="btnSave" value="Salvar" class="btn btn-primary margin-right">
        </div>
      </form>
      <!-- /.box-body -->
    </div>
    <div id="info-text">
      <h4>Conifgurações</h4>
      <small>Alterando o comportamento do sistema</small>
      
      <p>Aqui é possivel realizar alterações nas configurações do sistema</p>
    </div>
  </section>
  <!-- /.content -->
@endsection



