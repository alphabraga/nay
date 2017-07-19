<table id="data" class="table table-bordered table-hover" class="display" cellspacing="0" width="100%">
    <thead>
         <tr>
            @foreach ($grid['header'] as $col)
            <th>{{$col['title']}}</th>
            @endforeach
        </tr>
    </thead>
    <tfoot>
       <tr>
            @foreach ($grid['header'] as $col)
            <th>{{$col['title']}}</th>
            @endforeach
        </tr>
    </tfoot>
</table>

@section('javascript')

<script type="text/javascript">
    
    var table = $('table#data').DataTable(
    {
            "dom": 'Bfltip',
            "language": { "url": baseUrl+'/assets/js/datatables-pt-br.json' },
            "buttons": [ 
                            { extend: 'copyHtml5', className: 'btn btn-default', text: '<i class="fa fa-files-o"></i>', titleAttr: 'Copiar' }, 
                            { extend: 'excelHtml5', className: 'btn btn-default', text: '<i class="fa fa-file-excel-o"></i>', titleAttr: 'Excel' }, 
                            { extend: 'csvHtml5', className: 'btn btn-default', text: '<i class="fa fa-file-text-o"></i>', titleAttr: 'CSV' }, 
                            { extend: 'pdfHtml5', className: 'btn btn-default', text: '<i class="fa fa-file-pdf-o"></i>', titleAttr: 'PDF' } 
                        ],
        "processing": true,
        "serverSide": true,
        "ajax": '/'+currentRouteName+'Search',
        "type" : "GET",
        "order" : [[0, 'desc']],
        "columns": <?php echo json_encode($grid['header']) ?>
    } );


</script>
@endsection