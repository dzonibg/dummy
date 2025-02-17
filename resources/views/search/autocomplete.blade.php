
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
        .form-control {
            border-radius: 25px;
        }
        .btn-primary {
            border-radius: 25px;
        }

        .form-control:focus {
            width: 100%;
        }
        .form-inline .form-group { vertical-align: top; }
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
            <div id="macList"></div>
        </div>
        @csrf
        <button class="btn btn-primary" type="submit">Go</button>
    {{ csrf_field() }}
</form>
</div>
</body>
</html>

<script>
    //jquery start
    $(document).ready(function(){
//jquery enter contract id
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

        //jquery enter mac

        $('#mac').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete.fetchMac') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#macList').fadeIn();
                        $('#macList').html(data);
                    }
                });
            }
        });


//jquery click contract id
        $(document).on('click', '#countryl', function(){
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
//jquery click mac
        $(document).on('click', '#macl', function(){
            $('#mac').val($(this).text());
            $('#macList').fadeOut();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"/search/getcontractid",
                method:"POST",
                data:{mac:$('#mac').val(), _token:_token},
                success:function (data) {
                    $('#country_name').val(data);

                }
            });
        });

    });
</script>

