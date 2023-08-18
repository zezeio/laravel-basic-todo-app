@extends('layouts.app')

@section('content')
<form class="w3-container" method="POST" action="{{ route('ekle') }}">
    @csrf
    <div class="form-control">
        <label class="w3-text-teal"><b>Todo Başlık</b></label>
        <input class="w3-input w3-border w3-light-grey" type="text" name="baslik" required autofocus>
    </div>

    <div class="form-control">
        <label class="w3-text-teal"><b>Durum</b></label>
        <select class="w3-select w3-border w3-text-blue" name="durum">
            <option value="0" style="color:red;">Yapılmadı</option>
            <option value="1" style="color:rgb(3, 155, 16);">Yapıldı</option>
        </select>
    </div>

    <button type="submit" class="w3-btn right btnAuth w3-teal">Ekle</button>
  </form>
@endsection