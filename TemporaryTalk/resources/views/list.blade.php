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
    .container{
      margin-bottom: 100px;
    }
    </style>
  </head>
  <body>
  <div class="container">
      <div class="column">
        <div class="row">
          <div class="home"><a href="{{ url('/') }}">ランダムトーク</a></div>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown button
            </button>
            
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <button type="button" onclick="location.href='/join'">グループに参加</button>
              <button type="button" onclick="location.href='/create'">グループを作成する</button>
              <button type="button" onclick="location.href='/join'">ミーティングを催す</button>
              <button type="button" onclick="location.href='/join'">設定</button>
              <button type="button" onclick="location.href='/join'">グループに招待する</button>
            </div>
          </div>
        </div>
      </div>
  </div>
  
    <?php
    $csrf = csrf_field();
    $csrf = "'" . $csrf . "'";
    ?>
                      
    <script>
      const friends  = @json($friends);
      var csrf = <?php echo $csrf; ?>;
      for(var i = 0; i < friends.length; i++){
          document.write( '<div class="row">' +
                            '<div class="col">' + 
                              friends[i]['friend_name'] +
                            '</div>' +
                            '<div class="col">' +
                              '<form action="{{ url('/list')}}" method="POST" class="form-horizontal">' +
                                csrf);
                                if(friends[i]['is_favorite'] === 0){
                  document.write('<input type="hidden" name="favorite" value="' + friends[i]['friend_id'] + '">' +
                                '<button type="submit" class="btn btn-primary">お気に入り</button>');
                                }else{
                  document.write('<input type="hidden" name="unfavorite" value="' + friends[i]['friend_id'] + '">' +
                                '<button type="submit" class="btn btn-outline-primary">お気に入り</button>');
                                }
                document.write('</form>' +
                            '</div>' +
                            '<div class="col">' +
                              '<form action="{{ url('/list')}}" method="POST" class="form-horizontal">' +
                                csrf);
                                if(friends[i]['is_blocked'] === 0){
                  document.write('<input type="hidden" name="block" value="' + friends[i]['friend_id'] + '">' +
                                '<button type="submit" class="btn btn-success">フレンド</button>');
                                }else{
                  document.write('<input type="hidden" name="unblock" value="' + friends[i]['friend_id'] + '">' +
                                '<button type="submit" class="btn btn-outline-success">フレンド</button>');
                                }
                document.write('</form>' +
                            '</div>' +
                            '<div　class="col">' +
                              '<form action="{{ url('/list')}}" method="POST" class="form-horizontal">' +
                                csrf +
                                '<input type="hidden" name="delete" value="' + friends[i]['friend_id'] + '">' +
                                '<button type="submit" class="btn btn-danger">削除</button>' +
                              '</form>' +
                            '</div>' +
                          '</div>');
      }
    </script>
  </body>
</html>

<!--
'<div class="col">' +
                                '<input type="hidden" name="block" value="' + friends[i]['friend_id'] + '">' +
                                '<button type="submit" class="btn btn-success">ブロック</button>' +
                              '</div>' +
                              '<div>' +
                                '<input type="hidden" name="delete" value="' + friends[i]['friend_id'] + '">' +
                                '<button type="submit" class="btn btn-danger">削除</button>' +
                              '</div>' +


                              '<div class="col">' +
                              '<input type="hidden" name="' + friends[i]['friend_id'] + '" value="blocked">' +
                              '<button type="submit" class="btn btn-success">ブロック</button>' +
                            '</div>' +
                            '<div>' +
                              '<input type="hidden" name="' + friends[i]['friend_id'] + '" value="delete">' +
                              '<button type="submit" class="btn btn-danger">知らない人</button>' +
                            '</div>' +
-->