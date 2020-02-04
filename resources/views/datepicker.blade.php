<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />


<div>
<form method="POST" action="/viewdate">
<input class="form-control" id="date" name="date" type="text">
    @csrf
<button type="submit" class="btn btn-primary">Go</button>
</form>
</div>
<script>
$('input[name="date"]').daterangepicker();
$('#date').daterangepicker({
    locale:{
        format:'MM-DD-YYYY'
    }
});
</script>
