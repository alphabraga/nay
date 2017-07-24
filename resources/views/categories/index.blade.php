@extends('layouts.main')
@section('title', 'Categorias')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-square fa-fw"></i>Categorias <small>Listagem</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{action('CategoriesController@index')}}"><i class="fa fa-square fa-fw"></i>Categorias</a></li>
      <li class="active">Listagem</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">

        <a class="btn btn-info" href="{{URL::to('/categories/create')}}"> <i class="fa fa-plus-o fa-fw"></i> Nova Categoria</a>

        {{-- @include('includes.menu') --}}
        <div class="ui-datatable ui-widget">
          @include('grid.comon')
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <div id="info-text">
	  <p>Nessa tela você controla as categorias do sistema</p>
    </div>
  </section>
  <!-- /.content -->
@endsection
