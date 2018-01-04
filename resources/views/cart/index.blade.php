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
              <button id="limpar" type="button" class="btn btn-warning btn-lg"><i class="fa fa-eraser fa-lg"></i> Limpar</button>
              <button id="registrar" type="submit" class="btn btn-success btn-lg" data-toggle="modal" data-target="#finalizar-compra" ><i class="fa fa-save fa-lg"></i> Registrar</button>
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


        <form action="{{@action('CartController@checkout')}}" method="post">
          

          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="_method" value="POST" />

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Tipo de Transação</label> <br>
                <select style="width : 100%;" id="transaction_type" name="transaction_type" class="form-control input-sm select2">
                  @foreach($clients as $c)
                      <option value="{{$c->id}}">{{$c->name}}</option>
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
                    @if($c->id == $configuracao->default_client_id) 
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
                <select style="width : 100%;" id="salesman_id" name="category_id" class="form-control input-sm select2">
                  @foreach($users as $u)
                    @if($usuarioLogado->id == $u->id) 
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
                <select style="width : 100%;" id="payment_type" name="payment_type" class="form-control input-sm select2">
                  @foreach($clients as $c)
                    @if($c->id == $configuracao->default_client_id) 
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
              <label>Nome</label><input id="name" type="text" name="name" value="" class="form-control input-sm name">
            </div>
          </div>
        </div>



          <ul>
            <li>Cliente (Deixar preselecionado o cliente padrão)</li>
            <li>Vendedor (preselecionado o que esta logado na maquina)</li>
            <li>
              Forma de Pagamento
                <ul>
                  <li>Avista</li>
                  <li>Cartao Credito Debito</li>
                  <li>Cartao Credito Credito (Escolher numero de parcelas)</li>
                  <li>Fléxivel</li>  
                </ul>
            </li>

          </ul>


        </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-success"><i class="fa fa-save fa-fw"></i>Registrar</button>
      </div>
    </div>
  </div>
</div>

  @section('javascript')

<script type="text/javascript">
    
    $(document).ready(function()
    {




      //{product : {id:1223233223, name:'Alfredo Braga', price:100, quantity: 1, atributes:[] }}

      carrinho = {
                        add : function(productData)
                        {
                                $.ajax({
                                  type: "POST",
                                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                  url: "/carrinho",
                                  data: productData
                                });
                        },
                        update : function(id, productData)
                        {

                                $.ajax({
                                  type: "PATCH",
                                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                  url: "/carrinho/" + id,
                                  data: productData
                                });

                        },
                        delete : function(id, callBackFunction)
                        {
                                $.ajax({
                                  type: "DELETE",
                                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                  url: "/carrinho/"+id,
                                  success: function(data){ callBackFunction(data); }
                                });


                        },
                        clear : function(callBackFunction)
                        {
                                $.ajax({
                                  type: "GET",
                                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                  url: "/carrinhoClear",
                                  success: function(data){ callBackFunction(data); }
                                });


                        },
                        show : function(callBackFunction)
                        {
                                $.ajax({
                                  type: "GET",
                                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                  url: "/carrinho/1",
                                  success: function(data){ callBackFunction(data); }
                                });
                        },
                        isEmpty : function(callBackFunction)
                        {
                                $.ajax({
                                  type: "GET",
                                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                  url: "/carrinhoIsEmpty",
                                  success: function(data){ callBackFunction(data); }
                                });
                        },
                        total : function(callBackFunction)
                        {
                                $.ajax({
                                  type: "GET",
                                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                  url: "/carrinhoTotal",
                                  success: function(data){ callBackFunction(data); }
                                });
                        },
                        subTotal : function(callBackFunction)
                        {
                                $.ajax({
                                  type: "GET",
                                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                  url: "/carrinhoSubTotal",
                                  success: function(data){ callBackFunction(data); }
                                });
                        },
                        totalQuantity : function(callBackFunction)
                        {
                              $.ajax({
                                type: "GET",
                                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                url: "/carrinhoQuantity",
                                success: function(data){ callBackFunction(data); }
                              });                          
                        }                                                     
                     };

                    atualizarCarrinho(); 

                    $(document).on("click","a.remove-item", function(e)
                     {
                        e.preventDefault();

                        itemId = $(this).data('id');

                        bootbox.confirm('E ai vai querer excluir isso mesmo', function(confirmation)
                        {

                          if(confirmation == true){

                              carrinho.delete(itemId, function(){});

                              atualizarCarrinho();
                          }

                        });

                        

                    });


      });

  </script>

  @endsection
  <!-- /.content -->
@endsection
