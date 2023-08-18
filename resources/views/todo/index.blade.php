@extends('layouts.app')

@section('content')
<center>
    @if(session('error'))
        <div class="alert danger">   
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert success">   
            {{ session('success') }}
        </div>
    @endif

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Todo Adı</th> 
            <td>Todo Durum</th>
            <th class="mobile-none">Todo Oluşturulma</th>
            <th>Todo İşlem</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 0; @endphp
        @foreach ($todolar as $todo)
        @php $i++ @endphp
        <tr>
            <td>{{$i}}</td>
            <td>
                @if ($todo->durum == 1)
                    <del>{{$todo->baslik}}</del>
                @else
                    {{$todo->baslik}}
                @endif
            </td>
            <td>
                <center>
                    @if ($todo->durum == 1)
                    <span class="w3-tag w3-round w3-green" style="padding:3px">
                        <span class="w3-tag w3-round w3-green w3-border w3-border-white">
                            Yapıldı
                        </span>
                    </span>
                    @else
                    <span class="w3-tag w3-round w3-red" style="padding:3px">
                        <span class="w3-tag w3-round w3-red w3-border w3-border-white">
                            Yapılmadı
                        </span>
                    </span>
                    @endif
                </center>
            </td> 
            <td class="mobile-none">
                {{$todo->created_at}}
            </td>
            <td>
                <center>
                    <form action="{{ route('guncelle', $todo->id) }}" method="POST" class="d-none">
                        @csrf 
                        @method('PUT')
                        <button class="w3-button w3-khaki" type="submit" value="{{$todo->id}}">Yaptım</button>
                    </form>
                    <form action="{{ route('sil', $todo->id) }}" method="POST" class="d-none">
                        @csrf 
                        @method('PUT')
                        <button class="w3-button w3-red" type="submit" value="{{$todo->id}}">Sil</button>
                    </form> 
                </center>
            </td>
        </tr>
        @endforeach 
    </tbody> 
</table>
</center>
@endsection