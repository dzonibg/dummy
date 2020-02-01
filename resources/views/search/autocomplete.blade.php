
<!DOCTYPE html>
<html>
<head>
    <title>Ajax Autocomplete Textbox in Laravel using JQuery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
        }
    </style>
</head>
<body>
<br />
<div class="container box">
    <h3 align="center">Ajax Autocomplete Textbox in Laravel using JQuery</h3><br />

    <form class="form-inline" method="POST" action="/contract/show">
    <div class="form-group">
        <input type="text" name="contract_id" id="country_name" autocomplete="off" class="form-control" placeholder="Contract ID" />
        <div id="countryList">
        </div>
    </div>
        <div class="form-group">
            <input type="text" name="mac" id="mac" autocomplete="off" class="form-control" placeholder="Mac address" />
            <div id="macList">
            </div>
        </div>
        @csrf
        <button class="btn btn-primary" type="submit">Go</button>
    {{ csrf_field() }}
</form>
</div>
</body>
</html>

<script>
    $(document).ready(function(){

        $('#country_name').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete.fetch') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#countryList').fadeIn();
                        $('#countryList').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'li', function(){
            $('#country_name').val($(this).text());
            $('#countryList').fadeOut();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"/search/getmac",
                method:"POST",
                data:{contract_id:$('#country_name').val(), _token:_token},
                success:function (data) {
                    $('#mac').val(data);

                }
            });
        });

        $('#country_name').select(function () {

        });

    });
</script>

