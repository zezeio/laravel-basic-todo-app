@extends('layouts.app')

@section('content')
<div class="w3-container w3-teal">
    <h2>Giriş Yap</h2>
  </div>
  
  <form class="w3-container" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-control">
        <label class="w3-text-teal @error('email') is-invalid @enderror"><b>Mail Adresi</b></label>
        <input class="w3-input w3-border w3-light-grey" type="mail" name="email" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <div class="w3-panel w3-pink">
                    <strong>{{ $message }}</strong>
                </div> 
            </span><br>
        @enderror
    </div>

    <div class="form-control">
        <label class="w3-text-teal"><b>Şifreniz</b></label>
        <input class="w3-input w3-border w3-light-grey @error('password') is-invalid  @enderror" type="password" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <div class="w3-panel w3-pink">
                    <strong>{{ $message }}</strong>
                </div> 
            </span><br>
        @enderror
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label class="form-check-label" for="remember">
            Beni Hatırla
        </label>
    </div>
    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            Şifremi Unuttum
        </a>
    @endif

    <button type="submit" class="w3-btn right btnAuth w3-teal">Giriş Yap</button>
  </form>
@endsection
