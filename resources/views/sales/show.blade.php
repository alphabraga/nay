@extends('layouts.main')
@section('title', 'Transação')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-tags  fa-fw"></i>Transação <small>Visualizar</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{action('SalesController@index')}}"><i class="fa fa-shopping-cart  fa-fw"></i> Transações</a></li>
    <li class="active">Cadastro</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      
      @include('includes.painel')
      

      <div class="row">
        <div class="col-md-12">

          <div class="pull-right">
          <h1> Atendimento  <span class="label label-default">{{$object->transction_method}}  #{{$object->id}}</span></h1>            
          </div>


      </div>
      </div>

      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><i class="fa fa-tags fa-fw"></i> Principal</a></li>
          <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-image fa-fw"></i>Dados Financeiros</a></li>
          <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"><i class="fa fa-industry fa-fw"></i>Historico</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Cliente</label><input id="name" disabled="disabled" type="text" name="name" value="{{$object->client->name}}" class="form-control input-sm name">
                    </div>
                  </div>
                </div>

              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Atendente</label><input id="name" disabled="disabled" type="text" name="name" value="{{$object->salesman->name}}" class="form-control input-sm name">
                    </div>
                  </div>
                </div>

              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Operador</label><input id="name" disabled="disabled" type="text" name="name" value="{{$object->user->name}}" class="form-control input-sm name">
                    </div>
                  </div>
                </div>

                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Forma de Pagamento</label><input id="color" disabled="disabled" required="required" type="text" name="color" value="{{$object->payment_method}}" class="form-control input-sm">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Data</label><input id="slug" type="text" name="slug" value="{{$object->created_at->format('d/m/Y H:i:s')}}" disabled="disabled" class="form-control input-sm name">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tipo de Transação</label><input id="slug" type="text" name="slug" value="{{$object->transction_method}}" disabled="disabled" class="form-control input-sm name">
                    </div>
                  </div>
                </div>
          
                <div class="row">
                  <div class="col-md-12">
                    
                    <table class="table table-striped table-condensed table-hover">
                      <thead>
                        <th>#</th>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Valor</th>
                      </thead>
                      <tbody>
                        @foreach($object->itens as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->price*$item->quantity}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <p class="bg-danger">Aqui vai ficar o form de upload de imagem e a imagem</p>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                

                    @if(isset($object->provider))  

                  <table id="data-simple" class="table table-striped table-condensed table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Marca</th>
                    </tr>
                  </thead>                    
                  <tbody>
                  <tr><td>{{$object->provider->id}}</td><td>{{$object->provider->name}}</td> <td><a class="btn btn-info" href="{{action('ProvidersController@show', ['id' => $object->provider->id])}}">Detalhes</a></td> </tr>
                  </tbody>
                  </table>
                  @else
                  <div class="alert alert-info"><i class="fa fa-exclamation fa-fw"></i> Não existem registros </div>
                  @endif


              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
        </form>
        
      </div>
      <!-- /.box-body -->
    </div>
    {{-- @include('includes.timestamp') --}}
    <div id="info-text">
      ????????????????????????????????????????????????????????????</p>
    </div>
  </section>
  <!-- /.content -->
  @endsection
  @if(isset($showMode) && $showMode == true)
  @section('javascript')
  <script type="text/javascript">
  disableForm('update');
  </script>
  @endsection
  @endif