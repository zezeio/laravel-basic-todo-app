@extends('layouts.app')

@section('content')
<div class="w3-container w3-teal">
    <h2>Kayıt Ol</h2>
  </div>
  
  <form class="w3-container" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-control">
        <label class="w3-text-teal"><b>Adınız</b></label>
        <input class="w3-input w3-border w3-light-grey @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <div class="w3-panel w3-pink">
                    <strong>{{ $message }}</strong>
                </div> 
            </span><br>
        @enderror
    </div>

    <div class="form-control">
        <label class="w3-text-teal"><b>Mail Adresiniz</b></label>
        <input class="w3-input w3-border w3-light-grey @error('mail') is-invalid @enderror" type="mail" name="email" value="{{ old('email') }}" required autocomplete="email">
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
        <input class="w3-input w3-border w3-light-grey @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <div class="w3-panel w3-pink">
                    <strong>{{ $message }}</strong>
                </div> 
            </span><br>
        @enderror
    </div>

    <div class="form-control">
        <label class="w3-text-teal"><b>Şifrenizi Onaylayın</b></label>
        <input class="w3-input w3-border w3-light-grey" type="password" name="password_confirmation" required autocomplete="new-password">
    </div>

     

    <button type="submit" class="w3-btn right btnAuth w3-teal">Kayıt Ol</button>
  </form>
@endsection 