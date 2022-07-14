@extends('layouts.admin');

@section('title')
    Makale Listesi
@endsection

@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h5 class="card-title">Makale Listesi</h5>

                    <a class="btn-floating waves-effect waves-light teal" title="Yeni Makale Ekle"
                       href="{{route('admin.post.add')}}">
                        <i class="material-icons">add</i>
                    </a>

                    <table class="responsive-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>İşlem</th>
                            <th>Başlık</th>
                            <th>Kullanıcı Adı</th>
                            <th>Aktif/Pasif</th>
                            <th>Slug</th>
                            <th>Kategori</th>
                            <th>Resim</th>
                            <th>Paylaşım Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Alvin</td>
                            <td>Eclair</td>
                            <td>$0.87</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
