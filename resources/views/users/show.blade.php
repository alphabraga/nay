@extends('layouts.main')
@section('title', $object->username)
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h2> <span class="fa fa-user fa-fw"></span>{{$object->name}}</h2>
  
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-home"></i> Página Inical</a></li>
    <li><a href="{{action('UsersController@index')}}" title="Perfil">Perfil de {{$object->name}}</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab">Dados Gerais</a></li>
      <li><a href="#tab_2" data-toggle="tab">Senha</a></li>
      <li><a href="#tab_3" data-toggle="tab">Permissões</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
        
        <div class="panel panel-primary">
          <div class="panel-heading">
          </div>
          <div class="panel-body">
            
            <form action="{{action('UsersController@update',[$object->id])}}" method="POST">
              <input type="hidden" name="_method" value="PUT" />
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              <table class="table table-striped table-bordered">
                <tr>
                  <td>Nome</td><td> <input class="col-md-6" name="name" value="{{$object->name}}" /></td>
                </tr>
                <tr>
                  <td>Email</td><td> <input class="col-md-6" name="email" value="{{$object->email}}" /></td>
                </tr>
                <tr>
                  <td>Usuário</td><td><input class="col-md-6" name="username" type="text" value="{{$object->username}}" /> </td>
                </tr>
                <tr>

                  <td>Validade</td><td>
                  <div class="input-group col-md-6">
                        <!-- /btn-group -->
                        <input class="form-control input-sm input-data" name="validity" type="text" value="@if(!is_null($object->validity)){{$object->validity->format('d/m/Y')}}@endif" />
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-info input-info" data-text="A validade determina uma data limite onde o usuario pode efetuar login"><i class="fa fa-info"></i></button>
                        </div>
                      </div> 
                      </td>
                </tr>
                 <tr>

                  <td>Ativo </td><td>
                  <div class="input-group">

                        <select name="activated">
                            <option value="on" @if($object->activated == 'on') selected="selected" @endif >SIM</option>
                            <option value="off" @if($object->activated == 'off') selected="selected" @endif >NÃO</option>          
                        </select>

                      </div> 
                      </td>
                </tr>
              <tr>
                <tr>
                  <td>Primeiro Acesso</td><td>{{$object->created_at->format('d/m/Y H:i:s')}}</td>
                </tr>
                <tr>
                  <td>Ultimo Acesso</td><td>{{$object->updated_at->format('d/m/Y H:i:s')}}</td>
                </tr>
              </table>
              <input type="submit" value="salvar" name="salvar" class="btn btn-info"></input>
            </form>
          </div>
        </div>
        
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="tab_2">
        
        <div class="panel panel-primary">
          <div class="panel-heading">
          </div>
          <div class="panel-body">
            <form class="form-inline" action="{{action('UsersController@updateAnotherPassword')}}" method="post">
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              <input type="hidden" name="user" value="{{$object->id}}" />
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
        
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="tab_3">
        
        
        <div class="panel panel-primary">
          <div class="panel-heading">
          </div>
          <div class="panel-body">
            <div class="well">
              <form id="permissoes" action="{{URL::to('/updateRole')}}" method="post">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <input type="hidden" name="usuario" id="usuario" value="{{$object->id}}">
                @foreach ($allRoles as $r)
                <input id="{{$r->name}}" type="checkbox" name="role[{{$r->name}}]" value="{{$r->id}}" @if(in_array($r->id, $userRoles)) checked="checked" @endif />
                <label for="{{$r->name}}"><span class="label label-info">{{mb_strtoupper($r->display_name)}}</span> </label><hr>
                @endforeach
              </form>
            </div>
          </div>
        </div>
        
        
      </div>
      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
  </div>
</section>
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function()
{
    $('input[type=checkbox]').on('click', function(e) {
        $.ajax({
            url: baseUrl + '/updateRole?' + $('form#permissoes').serialize(),
            type: 'POST',
            data: {
                '_token': $('input[name=_token]').val()
            },
            success: function(result) {
                console.log(result);
                if (result.error != null || result.afectedRows == undefined) {
                    if (result.error == undefined) {
                        bootbox.alert('Aparentemente houve um erro. Entre em contato com o administrador do sistema');
                    }
                    if (result.error == 2292) {
                        bootbox.alert('Esse registro não pode ser excluído, pois existem outros cadastros no sistema que utilizam esse registro (ORA:2292)');
                    } else {
                        bootbox.alert(result.error);
                    }
                } else {
                    bootbox.alert('Permissão atualizada com sucesso ( registros atualizados ' + result.afectedRows + ')');
                }
            }
        });
    });
});
</script>
@endsection