<table id="data" class="table table-bordered table-hover display" cellspacing="0" width="100%">
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
            "responsive": true,
            "dom": '<lf<t>ip>',
            "language": { "url": '//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json' },
            "buttons": [ 
                            { extend: 'copyHtml5', className: 'btn btn-default', text: '<i class="fa fa-files-o"></i>', titleAttr: 'Copiar' }, 
                            { extend: 'excelHtml5', className: 'btn btn-default', text: '<i class="fa fa-file-excel-o"></i>', titleAttr: 'Excel' }, 
                            { extend: 'csvHtml5', className: 'btn btn-default', text: '<i class="fa fa-file-text-o"></i>', titleAttr: 'CSV' }, 
                            { extend: 'pdfHtml5', className: 'btn btn-default', text: '<i class="fa fa-file-pdf-o"></i>', titleAttr: 'PDF' } 
                        ],
        "processing": true,
        "serverSide": true,
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "Todos"] ],
        "ajax": '/'+currentRouteName+'Search',
        "type" : "GET",
        "order" : [[0, 'desc']],
        "columns": <?php echo json_encode($grid['header']) ?>
    } );



</script>

@endsection