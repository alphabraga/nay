@extends('layouts.main')
@section('title', 'Marcas')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-tags  fa-fw"></i>Marcas <small>Cadastro</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('BrandsController@index')}}"><i class="fa fa-tags  fa-fw"></i> Marcas</a></li>
    <li class="active">Cadastro</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      @include('includes.menu-cadastro')
      <form id="update" name="update" method="post" action="{{action('BrandsController@store')}}" >
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

        @include('includes.formbutons')
      </form>
      
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