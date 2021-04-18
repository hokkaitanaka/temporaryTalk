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
      .row{
        width : 600px ;
        margin-left: auto;
        margin-right: auto;
      }
      
      .title{
        text-align: center;
      }
      .home{
        margin-left: 00px;
      }
      .register{
        margin-left: 350px;
      }
      .login{
        margin: 0 0 0 auto;
      }
      p{
        width : 600px ;
        margin-left: auto;
        margin-right: auto;
        color:red;
      }
      
      body {
        width : 600px ;
        margin-left: auto;
        margin-right: auto;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="column">
        <div class="row">
          <div class="home"><a href="{{ url('/') }}">ランダムトーク</a></div>
        </div>
      </div>
    </div>
    <p>このメールアドレスは既に登録されています。</p>
    <form action="{{ url('/register')}}" method="POST" class="form-horizontal">
      @csrf
      <div class="form-group">
        <label for="name">名前</label>
        <input name="name" type="name" class="form-control" id="name" placeholder="Name">
      </div>
      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="password">パスワード</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>