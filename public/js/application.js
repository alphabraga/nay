$(document).ready(function()
{
    var formato = { minimumFractionDigits: 2 , style: 'currency', currency: 'BRL' }


    $('a.logout').on('click', function(e)
    {
        e.preventDefault();

        $that = $(this);

        $.ajax(
        {
            url: $that.attr('href'),
            type: 'POST',
            data:{'_token':  $("meta[name=csrf-token]").attr('content')}, 
            success: function(result)
            {
                location.reload();
            },
            error: function(data){

                location.reload();
                //bootbox.alert( JSON.stringify(data));
            }
        });


    });

     atualizarCarrinho = function()
     {

      $('table#carrinho tbody').empty();

       carrinho.show(function(data)
       {
          $.each(data, function(id,item)
          {

            $('table#carrinho tbody').append('<tr><td>'+item.id+'</td><td>'+item.name+'</td><td>'+item.quantity.toLocaleString('pt-BR')+'</td><td><div class="float-right">'+item.price.toLocaleString('pt-BR')+'</div></td><td><a href="#" data-id="'+item.id+'" class="btn btn-xs btn-danger remove-item"><i class="fa fa-ban"><i/> Remover</a></td><tr>');
          });
       });


        carrinho.isEmpty(function(data)
        {
          $('span#carrinho-vazio').text(data.toLocaleString('pt-BR'));          
        });

        carrinho.totalQuantity(function(data)
        {
          $('span#carrinho-quantidade').text(data.toLocaleString('pt-BR'));          
        });

        carrinho.total(function(data)
        {
          $('span#carrinho-total').text(data.toLocaleString('pt-BR'));          
        });

        carrinho.subTotal(function(data)
        {
          $('span#carrinho-subtotal').text(data.toLocaleString('pt-BR'));          
        });
       

     }

     $('button#limpar').on('click', function()
    {
        bootbox.confirm("Você realmente deseja limpar o carrinho?", function(response)
        {
            if(response == true){

                console.log(response);

                carrinho.clear(function()
                {
                    bootbox.alert("Seu carrinho foi limpo com sucesso");

                    atualizarCarrinho();

                });
            }
        });
    });




	$('button.input-info').on('click', function(e)
	{
		e.preventDefault();

		bootbox.alert($(this).data('text'));

	});


	$('a#info-modal').on('click', function(e)
	{
		e.preventDefault();

		info_text = $('div#info-text').html();

		bootbox.alert(info_text);
	});

	$.getJSON('/system', function(data)
	{
		console.log(data);
	});



    $.getJSON('/configuration', function(data)
	{
      console.log(data);
	});  

    $('.select2').select2({});

    $('.select2-tags').select2({
		
		tags: true,
  		tokenSeparators: [',', ' ','    ']
	});


    $('.select2-ajax').select2({
        ajax:
        {
            url: '/productsSearchCart',
            dataType: 'json',
           
        },
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo,
        allowClear: true,
        multiple: true,
        maximumSelectionSize: 1,
        placeholder: "Clique aqui e comece a buscar"
    });

    $('.select2-ajax').on('select2:select', function (e)
    {
        var data = e.params.data;
        //{"id" : 17, "price" : 644.61 "text": "Mrs. Krystal Conn II"}
        var newProduct = { "product" : {id: data.id, name: data.text, price: data.sale_price, quantity: 1, atributes:[] }};

        carrinho.add(newProduct);

        atualizarCarrinho();

        $('.select2-ajax').val('').trigger("change"); // limpa o campo de busca

        carrinho.isEmpty(function(data)
        {
          $('span#carrinho-vazio').text(data.toLocaleString('pt-BR'));          
        });

        carrinho.totalQuantity(function(data)
        {
          $('span#carrinho-quantidade').text(data.toLocaleString('pt-BR'));          
        });

        carrinho.total(function(data)
        {
          $('span#carrinho-total').text(data.toLocaleString('pt-BR'));          
        });

        carrinho.subTotal(function(data)
        {
          $('span#carrinho-subtotal').text(data.toLocaleString('pt-BR'));          
        });



    });


        function formatRepo (repo) {

            if (repo.loading) {
                return repo.text;
            }

            var markup = "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'>" + repo.text + "</div>";

            if (repo.description) {
            markup += "<div class='select2-result-repository__description'>" + repo.text + "</div>";
            }

            markup += "<div class='select2-result-repository__statistics'>" +
            "<div class='select2-result-repository__forks'><i class='fa fa-money'></i> " + repo.sale_price + "</div>" +
            "</div>" +
            "</div></div>";

            return markup;
        }

});



function showHistory(guiaId)
{
        $.ajax(
        {
          url: baseUrl+'/guia/'+guiaId+'/history', 
          success: function(data)
          { 
            bootbox.alert(data);
          }
        });

}


function disableForm(formId)
{
    $('form#'+formId+' :input').prop("disabled", true);

    return false;    
}


function padLeft(nr, n, str){
    return Array(n-String(nr).length+1).join(str||'0')+nr;
}

function dateDiff(inicio, fim)
{
    var hoursDiff = ( new Date("1970-1-1 " + fim) - new Date("1970-1-1 " + inicio) ) / 1000 / 60 / 60; 

    var hora      = Math.abs(hoursDiff);                     

    var minutos   = (hoursDiff % 1) * 60;

    if(!isNaN(hora) || !isNaN(minutos))
    {

        //descontando hora do almoÃ§o
        if(hora>4)
        {
            hora = hora - 1;
        }

        var horasMinutos = padLeft(hora, 2) + ':' + padLeft(minutos, 2);

        return horasMinutos;
    }

}

$(document).ready(function()
{
        $('span.user-id').each(function(i,d)
        {
            that = $(this);

            $.getJSON(
            {
              url: baseUrl+'/getUSername/'+that.data('userid'), 
              success: function(data)
              { 
                that.html(data.name);                      
              }
          });

        });


        /**
            Ao clicar na no link de historico da 
            guia exibir um modal com o hsitorico
        */
        $('a.guia-history').on('click', function(e)
        {
            e.preventDefault();

            showHistory($(this).data('guiaid'));

            return false;

        });


        /**
            Sempre que o usuario clicar em um link ou botÃ£o
            que possuir a classe .input-info exibir em um modal
            o texto do parametro data-text
        */
        $('a.input-info,button.input-info').on('click', function(e)
        {
            e.preventDefault();

            bootbox.alert($(this).data('text'));            
        });




        function makeSearch()
        {

          $('table#modal-table thead tr').empty();
          $('table#modal-table tbody').empty();



          $.ajax(
          {
              url: baseUrl+'/home/modal?model='+ that.data('model')+'&term='+$('input[name=term]').val(), 
              success: function(data)
              { 

                  htmlHeader = '';

                  $(data.header).each(function(i, h)
                  {
                    htmlHeader += '<th>'+h+'</th>';                    

                  });

                  $('table#modal-table thead tr').append(htmlHeader);


                htmlTableRows = '';

                $.each(data.rows, function(i, d)
                {

                  var recordId = d.id;  

                  if(that.data('model') == 'pessoa')
                  {

                    var str      = '' + d.id;
                    var pad      = '000000';
                    var recordId = pad.substring(0, pad.length - str.length) + str;

                  }  

                  htmlTableRows = '<tr data-id="'+recordId+'" data-name="'+d.nome+'">';

                  $.each(data.header, function(i, h)
                  {
                    htmlTableRows += '<td>'+d[h]+'</td>';
                  });


                   htmlTableRows += '</tr>'; 

                    $("table#modal-table tbody:last-child").append(htmlTableRows);                   

                })
              }
          });


        }


     $('button.modal-link').on('click', function(e)
      {
          that = $(this);

          //pegar hidden
          inputHidden = that.parent().parent().children('input[type=hidden]');

          //pegar input text
          inputName = that.parent().parent().children('input[type=text]');


          makeSearch();

      });


      $('form#modal-form').on('submit', function(e)
      {
        e.preventDefault();

        makeSearch();


      });

$('div#modal-table-body').on('click', 'table#modal-table tbody tr', function(e)
  {
    e.preventDefault();

    $('div.modal-header button.close').trigger('click');


    inputHidden.val($(this).data('id'));
    inputName.val($(this).data('name')); 
  
  });


/*$(document).on('event', '.chosen-select', function(){
  $(this).chosen();
});*/

    /*
        Controla a aparencia do menu
    */
    if(localStorage.menuState == 'mini')
    {
        $('body').addClass('sidebar-collapse');
    }

    /*
        Controla a aparencia do menu
    */
    $('a.sidebar-toggle').on('click', function(e)
    {
        if(localStorage.menuState == 'mini')
        {
            localStorage.menuState = 'normal';            
        }
        else if(localStorage.menuState == 'normal')
        {

            localStorage.menuState = 'mini';               
        }
        else
        {
            localStorage.menuState = 'normal';
        }    

    });


    $('input#horas').val(dateDiff($('input#trabalho-inicio').val(), $('input#trabalho-fim').val()));

    $('input#trabalho-inicio, input#trabalho-fim').on('keyup', function(e)
    {
        if($(this).attr('id') == 'trabalho-inicio')
        {
            inicio = $(this).val(); 
        }
        else
        {
            fim = $(this).val();
        }

        $('input#horas').val(dateDiff(inicio, fim));

    });

    //iniciando o tooltip
    $('[data-toggle="tooltip"]').tooltip();

    $('a#info').on('click', function(e)
    {
        e.preventDefault();

        var info = $('div#info-text').html();

        if(info)
        {
            bootbox.alert({title:'<i class="fa fa-info fa-fw"></i>InformaÃ§Ãµes', message:info});            
        }
        else
        {
            bootbox.alert({title: '<i class="fa fa-info fa-fw"></i>InformaÃ§Ãµes', message:'Ainda nÃ£o existem informaÃ§Ãµes sobre essa tela.'});
        }    

        return false;
    });


    //$('select.chosen-select').chosen();

    if(currentRouteName != 'home' && currentRouteName.length>0)
    {

         //Abre o menu na pagina correspondente
        $('a[href^="'+currentBaseUrl+'"]').parent().parent().parent('li').children('a[href="#"]').trigger('click');
          
        $('a[href^="'+currentBaseUrl+'"]').parent('li:first').css('background-color', '#ddd');

    }

    var simpleTable = $('table#data-simple').DataTable( 
                                { 
                                    "language": { "url": baseUrl+'/assets/js/datatables-pt-br.json' },
                                    "bFilter": true,
                                    'bPaginate':false
                                } 
                            ); 

    $('div#table-painel, div.btn-group, table#data').on( 'click', 'a.delete-link', function (e)
    {

        console.log($(this).html());

        e.preventDefault();

        $that = $(this);


        var box = bootbox.prompt('Você tem certeza que deseja excluir o registro selecionado? Informe o motivo da exclusão.', function(motivo)
        {

            if(motivo == null){


                box.modal('hide');

            }


            if((typeof motivo) != 'string' )
            {   
                return false;
            }


            if((typeof motivo) == 'string' && motivo.length > 0)
            {
                $.ajax(
                {
                    url: $that.attr('href'),
                    type: 'DELETE',
                    data:{'_token': $that.data('token'), 'motivo_exclusao': motivo}, 
                    success: function(result)
                    {

                        if(result.error != null || result.afectedRows == undefined)
                        {
                            if(result.error == undefined)
                            {
                                bootbox.alert('Aparentemente houve um erro. Entre em contato com o administrador do sistema');
                            }

                            if(result.error == 2292)
                            {
                                bootbox.alert('Esse registro nÃ£o pode ser excluÃ­do, pois existem outros cadastros no sistema que utilizam esse registro (ORA:2292)');
                            }
                            else
                            {
                                bootbox.alert(result.error);
                            }
                        }
                        else
                        {
                            bootbox.alert('Registro excluido com sucesso.\n Um registro excluido');

                            console.log(typeof table); 

                            if(typeof table === 'undefined' || !table)
                            {

                                //depois de 5 segundos redirecionar par o inicio do modulo
                                window.setTimeout(function()
                                {
                                    window.location = 'http://'+window.location.host +'/' + window.location.pathname.split('/')[1];
                                },3000);

                            }
                            else
                            {
                                table.row( $that.parents('tr') ).remove().draw();

                                //depois de 3 segundos redirecionar par o inicio do modulo
                                window.setTimeout(function()
                                {
                                    window.location.reload();
                                },3000);


                            }  
                        }    
                    }
                });
            }
        });
    });

         
  atualizaCampo();
  
  upperText();
  
  $(".tooltipBtn").tooltip({
      placement:'top'
  });









  //link no tr da tada grid
  $('table#data').on( 'click', 'tbody tr', function ()
  {
    // NÃ£o sei por que mas essa rota nÃ£o tÃ¡ sendo passada para o front end?!!?!    
    if(currentRouteName == "")
    {
        currentRouteName = 'guia';
    }    

    window.location.href = baseUrl + '/' + currentRouteName + '/' + $(this).attr('id');
  });

});

//Funcao que faz o texto ficar em uppercase  
function upperText() {  
    // Para tratar o colar  
    jQuery(".up").bind('paste', function(e) {  
        var el = jQuery(this);  
        setTimeout(function() {  
            var text = jQuery(el).val();  
            el.val(text.toUpperCase());  
        }, 100);  
    });  

    // Para tratar quando Ã© digitado  
    jQuery(".up").keypress(function() {  
        var el = jQuery(this);  
        setTimeout(function() {  
            var text = jQuery(el).val();  
            el.val(text.toUpperCase());  
        }, 100);  
    });  
}  

function atualizaCampo(){
    
    $('.data').datepicker({
        language: 'pt-BR',
        pickTime: false,
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        }

    });
    
    $('.data-hora').datepicker({
        language: 'pt-BR',
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        }
    });

    $('.cnpj').mask("99.999.999/9999-99");
    $('.cpf').mask("999.999.999-99");
    
    $('.data input').mask("99/99/9999");
    $('.data-hora input').mask("99/99/9999 99:99");
    $('.hora input').mask("99:99");
    $('.ano').mask("9999");
    
    $(".quantidade").maskMoney({thousands:'', precision:0, allowZero:false});
    $(".dinheiro").maskMoney({thousands:'', precision:2, allowZero:true});
    $('.real').maskMoney('destroy');
    $('.decimal').maskMoney('destroy');
    
    $('.real').maskMoney({symbol:"R$", decimal:",", thousands:"."});
    $('.decimal').maskMoney({symbol:"", decimal:",", thousands:"."});
    
    
    $('input.hora').mask('99:99');

    $('input.numero').mask('9');

    
}