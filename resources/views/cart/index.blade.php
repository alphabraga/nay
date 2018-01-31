@extends('layouts.main')
@section('title', 'Tela de Atendimento ao Cliente')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-square fa-fw"></i>Atendimento ao Cliente <small>Carrinho</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{action('CartController@index')}}"><i class="fa fa-square fa-fw"></i>Atendimento ao Cliente</a></li>
      <li class="active">Listagem</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">


        <form class="form">
          <select class="select2-ajax form-control"></select>
        </form>

         <hr>

        <table id="carrinho" class="table table-bordered table-striped">
          <thead>
            <tr><th>#</th><th>Nome</th><th>Quant</th><th>Preço</th><th>Operação</th>
          </thead>
          <tbody>
            
          </tbody>
        </table>

   <hr>     

    <div class="row">
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total itens</span>
              <span id="carrinho-quantidade" class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Valor Total</span>
              <span id="carrinho-total" class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-minus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Descontos</span>
              <span id="carrinho-desconto" class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Subtotal</span>
              <span id="carrinho-subtotal" class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
       
        <div class="col-md-12">

          <div class="well">
          
            <div class="btn-group" role="group" >
              <button id="limpar" type="button" class="btn btn-warning btn-lg" ><i class="fa fa-eraser fa-lg"></i> Limpar</button>
              <button id="registrar" type="submit" class="btn btn-success btn-lg" data-toggle="modal" data-target="#finalizar-compra" disabled="disabled" ><i class="fa fa-save fa-lg"></i> Registrar</button>
            </div>             

          </div>


        </div> 


      </div>

      </div>
      <!-- /.box-body -->
    </div>
    <div id="info-text">
	  <p>Nessa tela vamos fazer o atendimento ao cliente</p>
    </div>
  </section>


<!-- Modal -->
<div class="modal fade" id="finalizar-compra" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registrar Atendimento</h4>
      </div>
      <div class="modal-body">


        <form id="checkout" action="{{@action('CartController@checkout')}}" method="post">
          

          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="_method" value="POST" />

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Tipo de Transação</label> <br>
                <select style="width : 100%;" id="transction_method" name="transction_method" class="form-control input-sm select2">
                  @foreach($saleCategories as $scKey=> $scValue)
                      <option value="{{$scValue}}">{{ __('messages.' . $scKey) }}</option>
                  @endforeach
                </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Comprador</label> <br>
                <select style="width : 100%;" id="client_id" name="client_id" class="form-control input-sm select2">
                  @foreach($clients as $c)
                    @if($object->client_id ==  $c->id || $c->id == $configuracao->default_client_id) 
                      <option value="{{$c->id}}" selected="selected">{{$c->name}}</option>
                    @else
                      <option value="{{$c->id}}">{{$c->name}}</option>
                    @endif
                  @endforeach
                </select>
            </div>
          </div>
        </div>

  <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Vendedor</label> <br>
                <select style="width : 100%;" id="salesman_id" name="salesman_id" class="form-control input-sm select2">
                  @foreach($users as $u)
                    @if($object->created_by ==  $u->id || $usuarioLogado->id == $u->id) 
                      <option value="{{$u->id}}" selected="selected">{{$u->name}}</option>
                    @else
                      <option value="{{$u->id}}">{{$u->name}}</option>
                    @endif
                  @endforeach
                </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Forma de Pagamento</label> <br>
                <select style="width : 100%;" id="payment_method" name="payment_method" class="form-control input-sm select2">
                  @foreach($paymentMethods as $pmKey => $pmValue)
                    @if($object->payment_method == $pmValue) 
                      <option selected="selected" value="{{$pmValue}}">{{__('messages.' . $pmKey)}}</option>
                    @else
                      <option value="{{$pmValue}}">{{__('messages.' . $pmKey)}}</option>
                    @endif
                  @endforeach
                </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Total</label><input id="total" disabled="disabled" type="text" name="total" value=""  class="form-control input-sm name">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Desconto Percentual</label>
              <div class="input-group">
                  <input id="desconto_percentual" type="text" name="desconto_percentual" value="0.00"  class="form-control input-sm name">
                <span class="input-group-addon">%</span>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Desconto Valor</label><input id="discount" type="text" name="discount" value="0.00"  class="form-control input-sm name">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Total Liquido</label><input id="liquido" type="text"  disabled="disabled" name="liquido" value="0.00"  class="form-control input-sm name">
            </div>
          </div>
        </div>        



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-fw"></i>Registrar</button>
      </form>
      </div>
    </div>
  </div>
</div>

  @section('javascript')

<script type="text/javascript">
    
    $(document).ready(function()
    {

      $('form#checkout').on('submit', function(e)
      {

        console.log("Vamos registrar");
        e.preventDefault();

        $that = $(this);

        $.ajax(
        {
            url: $that.attr('action'),
            type: 'POST',
            data: $that.serialize(), 
            success: function(result)
            {
              console.log(result);

              //$('div#finalizar-compra button').trigger('click');

              bootbox.alert('Compra realizada com sucesso', function(){ 

                window.location = baseUrl + '/sales';

               });



              return false;


            },
            error: function(data){

              bootbox.alert('Houve algum tipo de erro ao finalizar a sua compra', function(){


              window.location = baseUrl + '/carrinho';

              });



            }
        });


      });


    


    });

  </script>

  @endsection
  <!-- /.content -->
@endsection
