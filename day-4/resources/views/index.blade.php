<form action="">
    @csrf
    {{-- Custom directive oluşturduk --}}
    {{-- @mymethod('PUT')--}}
    @method('PUT')
    <input type="text" name="id" value="" placeholder="ID">
    <button type="submit">Gönder</button>
</form>

<hr>

{{-- request gönderilen isteklleri alabiliriz --}}
Id= {{ request('id') }}
<br>
{{-- contoller gelen veriyi bastırdık --}}
Fullname : {{ $name . ' ' . $lastName }}
<hr>

{{--Swich directive--}}
{{--@switch($id)
    @case(5)
        <p>id: 5</p>
        @break
    @case(7)
        <p>id : 7</p>
        @break
    @default
        <p>id bulunmadı...</p>
        @break
@endswitch--}}

{{-- if directive --}}

@if($id == 5)
    <p>Id: 5</p>
@elseif($id == 7)
    <p>Id: 7 </p>
@else
    <p>Id bulunamadı...</p>
@endif

<br><br>
{{-- Route data gönderme --}}
<a href="{{ route('test', ['id' => 7]) }}">Kayıt 7 </a> <br>
<a href="{{ route('test', ['id' => 5, 'name' => $name]) }}">Kayıt 5</a>
