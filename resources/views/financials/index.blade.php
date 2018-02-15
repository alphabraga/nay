@extends('layouts.main')
@section('title', 'Financeiro')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-tags  fa-fw"></i>Financeiro <small>Listagem</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{action('FinancialsController@index')}}"><i class="fa fa-tags  fa-fw"></i>Financeiro</a></li>
      <li class="active">Listagem</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">

        @include('includes.menu-basico')
        <div class="ui-datatable ui-widget">
          @include('grid.comon')
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <div id="info-text">
	  <p>Nessa tela você controla os pagamentos do sistema</p>
    </div>
  </section>
  <!-- /.content -->
@endsection
