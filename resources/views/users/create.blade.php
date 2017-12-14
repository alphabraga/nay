@extends('layouts.main')
@section('title', 'Usuário')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-user fa-fw"></i>Usuário <small>Cadastro</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('UsersController@index')}}"><i class="fa fa-user fa-fw"></i> Usuário</a></li>
    <li class="active">Cadastro</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      
      <form id="frmSave" name="frmSave" method="post" action="{{action('UsersController@store')}}" >
        <input type="hidden" name="_method" value="POST" />
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Nome</label>
              <input id="name" type="text" name="name" value="" class="form-control input-sm" required="required">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>Username</label>
              <input id="username" type="text" name="username" value="" class="form-control input-sm" required="required">
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group">
              <label>Email</label><input id="email" type="email" name="email" value="" class="form-control input-sm"  required="required">
            </div>
          </div>
          
          <div class="col-md-2">
            <div class="form-group">
              <label>Senha</label>
              <input id="password" type="password" name="password" value="" class="form-control input-sm"  required="required">
            </div>
          </div>

        </div>
        
        @include('includes.formbutons')
      </form>
    </div>
    <!-- /.box-body -->
  </div>
  <div id="info-text">
    <p>O cadastre usuários no sistema.</p>
  </div>
</section>
<!-- /.content -->
@endsection
@section('javascript')
@endsection