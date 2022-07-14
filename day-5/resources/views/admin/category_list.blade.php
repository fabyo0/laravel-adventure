@extends('layouts.admin')
@section('title')
    Kategori Listesi
@endsection
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h5 class="card-title">Kategori Listesi</h5>
                    <!-- Modal Trigger -->
                    <a class="btn-floating waves-effect waves-light teal modal-trigger"
                       title="Yeni Kategori Ekle"
                       href="#modal1">
                        <i class="material-icons">add</i>
                    </a>
                    <!-- Modal Trigger -->
                    <table class="responsive-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kategori Adı</th>
                            <th>Açıklama</th>
                            <th>Kullanıcı Adı</th>
                            <th>Durum</th>
                            <th>Oluşturulma Tarihi</th>
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

<!-- Modal Structure -->

<div id="modal1" class="modal modal-fixed-footer">
    <div class="row">
        <div class="card">
            <div class="card-content">
                <h5 class="card-title activator">Kategori Ekle
                    <i class="material-icons right tooltipped"
                       data-position="left" data-delay="50"
                       data-tooltip="Get Code">more_vert</i>
                </h5>
                <form id="frmCategory" action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input name="name" id="name" type="text">
                            <label for="name">Kategori Adı</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input name="description" id="description" type="text">
                            <label for="description">Açıklama</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="switch">
                                <label for="status">
                                    Pasif
                                    <input name="status" id="status" type="checkbox">
                                    <span class="lever"></span>
                                    Aktif
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <button id="btnSave" class="btn green waves-effect btn-block" type="button">
                                Değişiklikleri Kaydet
                            </button>
                        </div>
                        <div class="input-field col s6">
                            <button class="btn red waves-effect btn-block modal-close" type="button">
                                Vazgeç
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Structure -->
@section('js')
    <script !src="">

        // category validate

        $('#btnSave').click(function () {

            let name = $('#name').val();

            if (name.trim() === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Uyarı',
                    text: 'Lütfen kategori adını boş bırakmayınız!',
                    confirmButtonText: 'Tamam'
                });

            } else {
                $('#frmCategory').submit();
            }
        });
    </script>
@endsection
