@extends('layouts.main')
@section('title', 'Produtos')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-money fa-fw"></i>Produtos <small>Cadastro</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('ProvidersController@index')}}"><i class="fa fa-money fa-fw"></i> Produtos</a></li>
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
              <label>Código Externo</label><input id="external_code" type="text" name="external_code" value="" class="form-control input-sm external_code">
            </div>
          </div>
        </div>
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
              <label>Quantidade Limite</label>
              <input id="quantity_limit" type="text" name="quantity_limit" value="" class="form-control input-sm quantity_limit">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Quantidade</label>
              <input id="quantity" type="text" name="quantity" value="" class="form-control input-sm quantity">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Preço de Compra</label>
              <input id="purchase_price" type="text" name="purchase_price" value="" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Preço de Venda</label>
              <input id="sale_price" type="text" name="sale_price" value="" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>{{$configuracao->custom_field1_label}}</label>
              <input id="sale_price" type="text" name="custom_field1" value="" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>{{$configuracao->custom_field2_label}}</label>
              <input id="sale_price" type="text" name="custom_field2" value="" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>{{$configuracao->custom_field3_label}}</label>
              <input id="sale_price" type="text" name="custom_field3" value="" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>{{$configuracao->custom_field4_label}}</label>
              <input id="sale_price" type="text" name="custom_field4" value="" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>{{$configuracao->custom_field5_label}}</label>
              <input id="sale_price" type="text" name="custom_field5" value="" class="form-control input-sm price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>{{$configuracao->custom_field6_label}}</label>
              <input id="sale_price" type="text" name="custom_field6" value="" class="form-control input-sm price">
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
    <p>O cadastro dos Produtos no sistema tem como o objetivo o controle dos mesmos que serão cadatrados no sistema.</p>
  </div>
</section>
<!-- /.content -->
@endsection