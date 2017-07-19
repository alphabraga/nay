@extends('main')
@section('title', 'Categoria')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-square fa-fw"></i>Categoria <small>Listagem</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{action('CategoriaController@index')}}"><i class="fa fa-square fa-fw"></i> Categoria</a></li>
      <li class="active">Listagem</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">
        @include('includes.menu')
        <div class="ui-datatable ui-widget">
          @include('grid.comon')
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <div id="info-text">
	  <p>Nessa tela vocÃª controla as categorias de serviÃ§os</p>
    </div>
  </section>
  <!-- /.content -->
@endsection