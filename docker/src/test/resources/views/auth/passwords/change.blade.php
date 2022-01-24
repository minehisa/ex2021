<!DOCTYPE html>
<html lang=“ja”>

<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/css/password_register.css') }}">
  <title>パスワード変更</title>
</head>

<body>
<nav>
    <div class="container-fluid">
      <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col-6">
          <h1 class="page-title">{{__('Change Password') }}</h1>
        </div>
        <div class="col-3 text-center text-lg-start">
          <button type="button" class="btn-back" onClick="history.back()">戻る</button>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <form method="POST" action="{{ route('password.change') }}">
      @csrf
      <!-- current_password -->
      <div class="form-group col-md-6">
        <label for="current_password" class="mes_pos col-form-label">{{ __('Current Password') }}</label>
        <div class="input-group">
          <span class="input-group-addon">
              <i class="fas fa-lock-open"></i>
            </span>
          <input id="current_password" type="password" size=50 class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="{{ old('current_password') }}" required autocomplete="new-password" placeholder="Current Password">
          @error('current_password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <!-- New Password -->
      <div class="form-group col-md-6">
        <label for="password" class="mes_pos col-form-label">{{ __('New Password') }}</label>
        <div class="input-group">
          <span class="input-group-addon">
              <i class="fas fa-lock"></i>
          </span>
          <input id="password" type="password" size=50 class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <!-- password-confirm -->
      <div class="form-group col-md-6">
        <label for="password-confirm" class="mes_pos col-form-label">{{ __('Confirm New Password') }}</label>

        <div class="input-group">
          <span class="input-group-addon">
            <i class="fas fa-check-double"></i>
          </span>
          <input id="password-confirm" type="password" size=50 class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Password Confirm">
        </div>
      </div>

      <div class="center">
        <button type="submit" class="btn-open">
          {{ __('Change Password') }}
        </button>
      </div>

    </form>
  </div>
</body>

</html>
