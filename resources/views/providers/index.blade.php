@extends('layouts.main')
@section('title', 'Fornecedores')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-square fa-fw"></i>Fornecedores <small>Listagem</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{action('ProvidersController@index')}}"><i class="fa fa-square fa-fw"></i>Fornecedores</a></li>
      <li class="active">Listagem</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">

        <a class="btn btn-info" href="{{URL::to('/providers/create')}}"> <i class="fa fa-plus-o fa-fw"></i> Novo Fornecedor</a>

        {{-- @include('includes.menu') --}}
        <div class="ui-datatable ui-widget">
          @include('grid.comon')
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <div id="info-text">
	  <p>Nessa tela você controla as Fornecedores do sistema</p>
    </div>
  </section>
  <!-- /.content -->
@endsection
