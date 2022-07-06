@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 m-auto">

            <form action="{{route('showAddPost')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Makale başlığı</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="başlık">
                </div>
                <div class="form-group">
                    <label for="content">Makel içeriği</label>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="10"
                              placeholder="içerik"></textarea>
                </div>

                <div class="form-group">
                    <label for="status"></label>
                    <input type="checkbox" name="status" id="status"> Status
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Makale Ekle</button>
                </div>
            </form>
        </div>
    </div>

@endsection

