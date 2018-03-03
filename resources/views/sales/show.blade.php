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
          <h1> Atendimento  <span class="label label-default">{{__('messages.' . $object->saleCategoryName)}}  #{{$object->id}}</span></h1>            
          </div>


      </div>
      </div>

      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><i class="fa fa-tags fa-fw"></i> Principal</a></li>
          <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-money fa-fw"></i>Dados Financeiros</a></li>
          <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"><i class="fa fa-industry fa-fw"></i>Historico</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Cliente</label><input id="name" disabled="disabled" type="text" name="name" value="{{$object->entity->name}}" class="form-control input-sm name">
                    </div>
                  </div>
                 <div class="col-md-4">
                    <div class="form-group">
                      <label>Atendente</label><input id="name" disabled="disabled" type="text" name="name" value="{{$object->salesman->name}}" class="form-control input-sm name">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Operador</label><input id="name" disabled="disabled" type="text" name="name" value="{{$object->user->name}}" class="form-control input-sm name">
                    </div>
                  </div>

                </div>

                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Forma de Pagamento</label><input id="color" disabled="disabled" required="required" type="text" name="color" value="{{__('messages.' . $object->paymentMethodName)}}" class="form-control input-sm">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Data</label><input id="slug" type="text" name="slug" value="{{$object->created_at->format('d/m/Y H:i:s')}}" disabled="disabled" class="form-control input-sm name">
                    </div>
                  </div>

                   <div class="col-md-4">
                    <div class="form-group">
                      <label>Estado</label><input id="slug" type="text" name="slug" value="{{$object->status}}" disabled="disabled" class="form-control input-sm name">
                    </div>
                  </div>

                </div>
          
                <div class="row">
                  <div class="col-md-12">
                    
                    <div class="panel panel-default">
                      <div class="panel-heading"> <i class="fa fa-list fa-fw" ></i> Itens</div>
                      <div class="panel-body">
                    <table class="table table-striped table-condensed table-hover table-bordered">
                      <thead>
                        <th>#</th>
                        <th>Descrição</th>
                        <th>{{$configuracao->custom_field1_label}}</th>
                        <th>{{$configuracao->custom_field2_label}}</th>
                        <th>{{$configuracao->custom_field3_label}}</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Valor</th>
                      </thead>
                      <tbody>
                        @foreach($object->itens as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->product->name}}</td>
                            <td>{{$item->product->custom_field1}}</td>
                            <td>{{$item->product->custom_field2}}</td>
                            <td>{{$item->product->custom_field3}}</td>
                            <td align="right">{{number_format($item->quantity, 2, ',', '.')}}</td>
                            <td align="right">{{number_format($item->price, 2, ',', '.')}}</td>
                            <td align="right">{{number_format($item->price*$item->quantity, 2, ',', '.')}}</td>
                        </tr>
                        @endforeach
                        <tr class="info">
                          <td></td>
                          <td><b>Total</b></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td align="right"><b>{{number_format($object->total, 2, ',', '.')}}</b></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td><b>Desconto</b></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                           <td align="right"><b>{{number_format($object->discount, 2, ',', '.')}}</b></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td><b>Total Liquido</b></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td align="right"><b>{{number_format($object->liquid, 2, ',', '.')}}</b></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                    </div>


                    <div class="panel panel-default">
                      <div class="panel-heading"><i class="fa fa-file-o fa-fw"></i> Observaçao </div>
                      <div class="panel-body">
                          
                        @if(is_null($object->observation))
                          <div class="alert alert-info"> <i class="fa fa-exclamation-circle fa-fw"></i> <b>Nao existe observação para essa transação. Utilize esse campo para relatar dados adicionais a essa venda.</b></div>
                        @else
                        {{$object->observation}}
                        @endif                        
                      </div>
                    </div>



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