<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script language="JavaScript">
    $(document).ready(function(){
        $('#dTable').DataTable({
        "paging":   true,
        "ordering": true,
        "info":     false
    } );
    });
</script>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
{{ HTML::style('css/style.css')}}
<link rel="styplesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">