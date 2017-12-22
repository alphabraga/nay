@extends('layouts.main')
@section('title', 'Usuários')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-user fa-fw"></i>Usuários <small>Listagem</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{action('CategoriesController@index')}}"><i class="fa fa-user fa-fw"></i>Usuários</a></li>
      <li class="active">Listagem</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">

        @include('includes.menu-basico')

        {{-- @include('includes.menu') --}}
        <div class="ui-datatable ui-widget">
          @include('grid.comon')
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <div id="info-text">
	  <p>Nessa tela você busca e manipula os usuários do sistema</p>
    </div>
  </section>
  <!-- /.content -->
@endsection
