<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      }
      
      body {
        width : 1300px ;
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
          <div class="register"><a href="{{ url('/register') }}">登録</a></div>
          <div class="register"><a href="{{ url('/login') }}">ログイン</a></div>
        </div>

        <p class="title">ランダムトーク</p>

        <p>
        暇な時に誰かとテレビ電話をするサービスです。完全に知らない人との会話もできますが、
        自分の知り合いの人に限定して電話を掛けることもできます
        </p>
      </div>
    </div>
  </body>
</html>

<!-- 
  div{
    font-size:120%;
  }
  <div class="row justify-content-between">
    <div class="col-4">
      <a href="{{ url('/home') }}">Event Holder</a>
    </div>
    <div class="col-4">
      <div class="row">
        <div class="col6">
          <a href="{{ url('/register_login') }}">Register</a>
        </div>
        <div class="col-6">
          <a href="{{ url('/register_login') }}">Login</a>
        </div>
      </div>
    </div>
  </div>

  <div class="middle">

  </div>
-->

