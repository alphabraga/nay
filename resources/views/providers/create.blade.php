@extends('layouts.main')
@section('title', 'Fornecedores')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-square fa-fw"></i>Fornecedores <small>Cadastro</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('ProvidersController@index')}}"><i class="fa fa-square fa-fw"></i> Fornecedores</a></li>
    <li class="active">Cadastro</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      @include('includes.menu-cadastro')
      <form id="update" name="update" method="post" action="{{action('ProvidersController@store')}}" >
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
              <label>Slug</label><input id="slug" type="text" name="slug" value="" disabled="disabled" class="form-control input-sm name">
            </div>
          </div>
        </div>
        

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Descrição</label> 
              <textarea class="form-control input-sm name" name="description" id="description" >
              </textarea> 
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Tags</label> 
              <select name="tags[]" class="form-control select2-tags" multiple >

              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Contato</label> 
                <input id="personal_contact" type="text" name="personal_contact" value="" class="form-control input-sm personal_contact">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>CEP</label> 
                <input id="postal_code" type="text" name="postal_code" value="" class="form-control input-sm postal_code">
            </div>
          </div>
        </div>
                <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Endereço</label> 
                <input id="address" type="text" name="address" value="" class="form-control input-sm address">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Numero</label> 
                <input id="address_number" type="text" name="address_number" value="" class="form-control input-sm address_number">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Complemento</label> 
                <input id="address_complement" type="text" name="address_complement" value="" class="form-control input-sm address_complement">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Fone</label> 
                <input id="phone" type="text" name="phone" value="" class="form-control input-sm phone">
            </div>
          </div>
        </div>        

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Celular</label> 
                <input id="cellphone" type="text" name="cellphone" value="" class="form-control input-sm cellphone">
            </div>
          </div>
        </div>        

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Email</label> 
                <input id="email" type="text" name="email" value="" class="form-control input-sm email">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Site</label> 
                <input id="site" type="text" name="site" value="" class="form-control input-sm site">
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
    <p>O cadastro das Fornecedores no sistema tem como o objetivo o controle de todos os funcionarios das mesmas que serão cadatrados no sistema.</p>
  </div>
</section>
<!-- /.content -->
@endsection