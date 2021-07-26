<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
  <title>ログイン画面</title>
</head>

<body>
  <div class="header">
    <a href="{{ url('/Top') }}" class="btn-back">戻る</a>
  </div>
  <h1 class="page-title">ログイン画面</h1>

  <p class="mb3"></p>

  <div class="center">
    <p class="pad5">
      <a href="{{ route('password.request') }}" target="_blank">パスワードを忘れた方へ</a>
    </p>
  </div>

  <!-- <div class="card-header">{{ __('Login') }}</div> -->
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="center">
      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

      <div class="col-md-6">
        <input id="email" type="email" size=50 class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="center">
      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}
      </label>
      <div class="col-md-6">
        <input id="password" type="password" size=50 class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <!-- <div class="center">
            メールアドレス：
            <input type="email" id="msg" size="50" name="address">
            <p class="mb3"></p>
            パスワード：
            <input type="password" id="msg" size="50" name="pass">
        </div> -->

    <p class="mb10"></p>

    <div class="center">
      <button type="submit" class="btn-open">
        {{ __('Login') }}
      </button>
      <!-- <input type="submit" value="ログイン" class="btn-open"> -->
      <!--<a onclick="location.href='./main.html'; return false;" type="submit" class="btn-open">ログイン</a>  -->
      <!--                    <a href="#" class="btn-open">ログイン</a>    -->
    </div>
  </form>
</body>

</html>
