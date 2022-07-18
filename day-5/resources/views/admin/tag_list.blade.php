@extends('layouts.admin')
@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h5 class="card-title">Etiket Listesi</h5>
                    <a class="btn-floating waves-effect waves-light teal modal-trigger"
                       title="Yeni Etiket Ekle"
                       href="#newTag">
                        <i class="material-icons">add</i>
                    </a>
                    <table class="responsive-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Etiket Adı</th>
                            <th>Durum</th>
                            <th>Kullanıcı Adı</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listTags as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    @if($item->status == 1)
                                        <a class="waves-effect waves-light btn green changeStatus"
                                           data-id="{{ $item->id }}" href="javascript:void(0);">Aktif</a>
                                    @else
                                        <a class="waves-effect waves-light btn red changeStatus"
                                           data-id="{{ $item->id }}" href="javascript:void(0);">Pasif</a>
                                    @endif
                                </td>
                                <td>{{ $item->getUser->name }}</td>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-y H:i:s') }}</td>
                                <td>{{\Carbon\Carbon::parse($item->updated_at)->format('d-m-y H:i:s') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--add tag modal --}}
    <div id="newTag" class="modal modal-fixed-footer">
        <div class="row">
            <div class="card">
                <div class="card-content">
                    <h5 class="card-title activator">Etiket Ekle
                        <i class="material-icons right tooltipped"
                           data-position="left" data-delay="50"
                           data-tooltip="Get Code">more_vert</i>
                    </h5>
                    <form id="frmTags" action="{{ route('tag.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input name="name" id="name" type="text">
                                <label for="name">Etiket Adı</label>
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
    {{--add tag modal --}}

@endsection

@section('js')

    <script !src="">

        function inputValidation(inputArray, formID) {
            let validation = true;

            for (let i = 0; i < inputArray.length; i++) {
                var inputInfo = inputArray[i];
                var input = $('#' + inputInfo.id).val();

                if (input.trim() === "") {
                    Swal.fire({
                        icon: 'error',
                        title: inputInfo.alertTitle,
                        text: inputInfo.alertTextAttr + ' boş bırakılamaz!',
                        confirmButtonText: 'Tamam'
                    });
                    validation = false;
                }
            }
            validation ? $('#' + formID).submit() : '';
        }

        $(document).ready(function () {

            $('#btnSave').click(function () {
                let inputArray = [
                    {
                        id: 'name',
                        alertTextAttr: 'Etiket Adı',
                        alertTitle: "Uyarı",
                    }
                ];
                inputValidation(inputArray, 'frmTags');
            });
        });

    </script>

@endsection
