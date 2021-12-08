<!DOCTYPE html>
<html lang=“ja”>

<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/css/password_register.css') }}">
  <title>新規登録</title>
</head>

<body>
<nav>
    <div class="container-fluid">
      <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col-6">
          <h1 class="page-title">新規登録</h1>
        </div>
        <div class="col-3 text-center text-lg-start">
          <button type="button" class="btn-back" onClick="history.back()">戻る</button>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-group col-md-6">
        <label for="email" class="mes_pos col-form-label">{{ __('メールアドレス') }}</label>
        <div>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="input-group">
          <span class="input-group-addon">
              <i class="fas fa-envelope-square"></i>
            </span>
          <input id="email" type="email" size=50 class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail Address">
        </div>
      </div>
      <div class="form-group col-md-6">
        <label for="password" class="mes_pos col-form-label">{{ __('パスワード') }}</label>
        <div>
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="input-group">
          <span class="input-group-addon">
              <i class="fas fa-lock"></i>
            </span>
          <input id="password" type="password" size=50 class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
        </div>
      </div>
      <div class="form-group col-md-6">
        <label for="password-confirm" class="mes_pos col-form-label">{{ __('パスワード(確認用)') }}</label>

        <div class="input-group">
          <input id="password-confirm" type="password" size=50 class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirmation">
        </div>
      </div>
      <div class="center">
        <button type="submit" class="btn-open">
          {{ __('登録') }}
        </button>
      </div>


      <!-- <div class="center">
      メールアドレス：
      <input type="text" id="msg" size="50" name="address">
      <p class="mb3"></p>
      パスワード：
      <input type="text" id="msg" size="50" name="pass">
    </div>

    <p class="mb10"></p>
    <f>
      <div class="center">
        <a href="#" class="btn-open" type="submit">登録</a>
        <input type="submit" value="登録" class="btn-open">
        <a onclick="location.href='./../Top.html'; return false;" type="sumit" class="btn-open">登録</a>
      </div> -->

    </form>
  </div>
</body>

</html>
