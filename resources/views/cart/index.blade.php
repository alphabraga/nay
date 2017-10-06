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


        <table id="carrinho" class="table table-bordered table-striped">
          <thead>
            <tr><th>#</th><th>Nome</th><th>Preço</th><th>Quant</th><th>Operação</th>
          </thead>
          <tbody>
            
          </tbody>
        </table>

        <div id="carrinho-vazio"></div>
        <div id="carrinho-quantidade"></div>
        <div id="carrinho-total"></div>
        <div id="carrinho-subtotal"></div>

      </div>
      <!-- /.box-body -->
    </div>
    <div id="info-text">
	  <p>Nessa tela vamos fazer o atendimento ao cliente</p>
    </div>
  </section>
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
                        clear : function()
                        {
                                $.ajax({
                                  type: "GET",
                                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                  url: "/carrinhoClear",
                                  success: function(data){ console.log(data); }
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
                        isEmpty : function()
                        {
                                $.ajax({
                                  type: "GET",
                                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                  url: "/carrinhoIsEmpty",
                                  success: function(data){ console.log(data); }
                                });
                        },
                        total : function()
                        {
                                $.ajax({
                                  type: "GET",
                                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                  url: "/carrinhoTotal",
                                  success: function(data){ console.log(data); }
                                });
                        },
                        subTotal : function()
                        {
                                $.ajax({
                                  type: "GET",
                                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                  url: "/carrinhoSubTotal",
                                  success: function(data){ console.log(data); }
                                });
                        },
                        totalQuantity : function()
                        {
                              $.ajax({
                                type: "GET",
                                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                url: "/carrinhoQuantity",
                                success: function(data){ console.log(data); }
                              });                          
                        }                                                     
                     };

                     var atualizarCarrinho = function()
                     {

                      $('table#carrinho tbody').empty();

                       carrinho.show(function(data)
                       {
                          $.each(data, function(id,item)
                          {
                            $('table#carrinho tbody').append('<tr><td>'+item.id+'</td><td>'+item.name+'</td><td>'+item.price+'</td><td>'+item.quantity+'</td><td><a href="#" data-id="'+item.id+'" class="btn btn-xs btn-danger remove-item"><i class="fa fa-ban"><i/> Remover</a></td><tr>');
                          });
                       });

                     }

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
