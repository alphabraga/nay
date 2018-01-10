@extends('layouts.main')
@section('title', 'Meu perfil')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-user"></i> Meu perfil</h1>
  <ol class="breadcrumb">
    <li><a href="{{action('UsersController@profile')}}"><i class="fa fa-user"></i>Meu perfil</a></li>
    <li class="active">Listagem</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">



      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="fa fa-user"></span> Meus Dados</h3>
        </div>
        <div class="panel-body">
           <table class="table table-striped table-bordered">
        <tr>
          <td>Nome</td><td>{{$object->name}}</td>
        </tr>
        <tr>
          <td>Usuário</td><td>{{$object->username}}</td>
        </tr>
        <tr>
          <td>Email</td><td>{{$object->email}}</td>
        </tr>
        <tr>
          <td>Validade</td></td><td>@if(!is_null($object->validity)){{$object->validity->format('d/m/Y')}} @endif</td>
        </tr>
        <tr>
        <tr>
          <td>Primeiro Acesso</td><td>{{$object->created_at->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
          <td>Ultimo Acesso</td><td>{{$object->updated_at->format('d/m/Y H:i:s')}}</td>
        </tr>
      </table>
        </div>
      </div>


      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="fa fa-lock fa-fw"></span> Alterar Foto</h3>
        </div>
        <div class="panel-body">
           <form class="form-inline" enctype="multipart/form-data" action="{{--action('UsuarioController@updatePhoto')--}}" method="post">
           <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="form-group">
          <label for="senha">Senha</label>
          <input name="file" type="file" class="form-control" id="file" placeholder="escolha uma foto" required="required">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
        </div>
      </div>


      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="fa fa-lock fa-fw"></span> Alterar Senha</h3>
        </div>
        <div class="panel-body">
           <form class="form-inline" action="{{--action('UsuarioController@updatePassword')--}}" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="form-group">
          <label for="senha">Senha</label>
          <input name="password" type="password" class="form-control" id="senha" placeholder="Digite sua nova senha">
        </div>
        <div class="form-group">
          <label for="confirme">Confirme</label>
          <input type="password" name="confirm" class="form-control" id="confirme" placeholder="Confirme">
        </div>
        <button type="submit" class="btn btn-primary">Alterar Senha</button>
      </form>
        </div>
      </div>

      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="fa fa-lock fa-fw"></span> Segurança</h3>
        </div>
        <div class="panel-body">
           <table class="table table-striped table-bordered">
        @foreach ($userRoles as $r)
        <tr>
          <td> <a class="class" href="#">{{$r->display_name}}</a></td>
          <td>{{$r->name}}</td>
          <td>{{$r->description}}</td>
        </tr>
        @endforeach
        
      </table>
        </div>
      </div>
     
      <!-- /.box-body -->
    </div>
    <div id="info-text">
      <p>Nessa tela são listados os dados sobre a conta do usuário do sistema.</p>    
      <p>Aqui é possivel verificar seu nivel de permissão e alterar a sua senha.</p>
    </div>
  </section>
  <!-- /.content -->
  @endsection
  @section('javascript')
  <script type="text/javascript">
  
  $(document).ready(function()
  {
  $('select[name="fk_id_pessoa"]').on('change', function(e)
  {
  e.preventDefault();
  $that = $(this);
  $.ajax(
  {
  url: "{{URL::to('adicionarPessoaAoPerfil')}}",
  type: 'POST',
  data: {'_token': "{{{ csrf_token() }}}", 'idPessoa': $that.val() },
  dataType:"json",
  success: function(result)
  {
  if(result.fk_pessoa_id == $('select[name="fk_id_pessoa"]').val())
  {
  bootbox.alert('Perfil acessociado com sucesso');
  }
  else
  {
  bootbox.alert('Erro ao realizar associação');
  }
  }
  });
  return false;
  });
  });
  </script>
  @endsection