<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style>
    body {
      width : 600px ;
      margin-left: auto;
      margin-right: auto;
    }
    .dropdown{
      margin-left: 340px;
    }
    a {
      margin-bottom: 100px;
    }
    .text-button {
      display: block;
      cursor: pointer;
      width: 160px;
      text-align: center;
      border: 1px solid #232323;
      padding: 10px;
    }

    .row {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    </style>
  </head>
  <body>
    <a href="{{ url('/home') }}">ランダムトーク</a>

    <?php
    $csrf = csrf_field();
    $csrf = "'" . $csrf . "'";
    ?>

    <script>
      const user  = @json($user);
      var csrf = <?php echo $csrf; ?>;
      document.write( '<div class="row">' +
                        '<div class="col">' +
                          '<form action="{{ url('/mypage')}}" method="POST" class="form-horizontal">' +
                            csrf);
      if(user[0]['is_wanting'] === 0){
              document.write('<input type="hidden" name="wanting" value="wanting">' +
                            '<button type="submit" class="btn btn-primary btn-lg btn-block">募集する</button>');
      }else{
              document.write('<input type="hidden" name="not_wanting" value="not_wanting">' +
                            '<button type="submit" class="btn btn-outline-primary btn-lg btn-block">募集中</button>');
      }
            document.write('</form>' +
                        '</div>' +
                      '</div>');
      if(user[0]['url'] !== ''){
        document.write('<p>ZOOMのURL：</p>');
        document.write('<p>' + user[0]['url'] + '</p>');
      }
    </script>
  </body>
</html>
