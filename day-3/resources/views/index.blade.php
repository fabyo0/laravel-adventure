<form action="{{route('guncelle')}}" method="post">
    @csrf
    {{-- Tüm yöntemler aynı işlevi yapmaktadır  --}}
    {{-- TODO: put directive oluşturuyor --}}
    {{-- @method('PUT')--}}

    {{-- 2. yöntem  --}}
    {{--{{method_field('PUT')}}--}}

    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="name" value="Test">

    {{-- 3. yöntem  --}}
    <input type="hidden" name="name" value="test">
    <input type="hidden" value="PUT">


    <button type="submit">Update</button>
</form>

<br><br>

<form action="{{route('sil')}}" method="post">
    @csrf
    @method('DELETE')
    <input type="text" name="name" value="sil">
    <button type="submit">Sil</button>
</form>

