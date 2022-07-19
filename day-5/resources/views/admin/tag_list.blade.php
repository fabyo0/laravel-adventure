@extends('layouts.admin')

@section('title')
    Etiket Listesi
@endsection

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
                            <th>Eylem</th>
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
                            <tr id="tag{{$item->id}}">
                                <td>
                                    <a href="javascript:void(0)" class="deleteTag" data-id="{{ $item->id }}">
                                        <i class="fas fa-trash  red-text"></i>
                                    </a>
                                    <a href="#editTag" class="editTag modal-trigger"
                                       data-id="{{ $item->id }}">
                                        <i class="fas fa-edit  blue-text"></i>
                                    </a>
                                </td>
                                <td>{{ $item->id }}</td>
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


    {{-- Edit Tag Modal --}}
    <div id="editTag" class="modal modalEdit">
        <div class="modal-content">
            <div class="row">
                <div class="col s12 l12">
                    <div class="card">
                        <div class="card-content">
                            <h5 class="card-title activator">Etiket Düzenleme</h5>
                            <form id="editTagForm" action="" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input name="name" id="nameEdit" type="text">
                                        <label for="nameEdit">Etiket Adı</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <div class="switch">
                                            <label for="statusEdit">
                                                Pasif
                                                <input name="status" id="statusEdit" type="checkbox">
                                                <span class="lever"></span>
                                                Aktif
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <button id="btnEdit" class="btn green waves-effect btn-block" type="button">
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
        </div>
    </div>
    {{-- Edit Tag Modal --}}

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

            // kategori ekleme
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

            // csrf
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // change status

            $('.changeStatus').click(function ()
            {
                let dataID = $(this).data('id');
                let self = $(this);

                $.ajax({
                    url: '{{route('admin.tag.changeStatus')}}',
                    method: 'POST',
                    data: {
                        id: dataID,
                    },
                    success: function (response)
                    {
                        console.log(response);
                        if (response.status === 1)
                        {
                            self[0].classList.remove('red');
                            self[0].classList.add('green');
                            self[0].innerText = "Aktif";
                        }
                        else
                        {
                            self[0].classList.remove('green');
                            self[0].classList.add('red');
                            self[0].innerText = "Pasif";
                        }
                        Swal.fire({
                            icon: 'success',
                            title: 'Uyarı',
                            text: "Status başarıyla güncellendi...",
                            confirmButtonText: 'Tamam'
                        })
                    }
                });
            });

            // etiket silme

            $('.deleteTag').click(function () {
                let dataID = $(this).data('id');

                let route = '{{route('tag.destroy', 'tagID')}}';
                route = route.replace('tagID', dataID);

                Swal.fire({
                    title: 'Uyarı',
                    text: `${dataID} ID'li etiketi silmek istediğinize emin misiniz?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet',
                    cancelButtonText: 'Hayır'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: route,
                            method: 'POST',
                            data: {
                                '_method': 'DELETE'
                            },
                            success: function (response) {
                                document.getElementById("tag" + dataID).remove();
                            }
                        });
                    }
                });
            });

            // etiket düzenleme

            $('.editTag').click(function () {
                let dataID = $(this).data('id');
                let nameEdit = $('#nameEdit');
                let status = $('#statusEdit');
                let self = $(this);

                // TODO: route url de tagEdit category ıD ile değiştirdik
                let route = '{{ route('tag.edit', ['tag' => 'tagEdit']) }}';
                let routeUpdate = '{{ route('tag.update', ['tag' => 'tagEdit']) }}';

                route = route.replace('tagEdit', dataID);
                routeUpdate = routeUpdate.replace('tagEdit', dataID);

                $('#editTagForm').attr('action', routeUpdate);

                $.ajax({
                    url: route,
                    method: 'GET',
                    data: {
                        id: dataID,
                    },
                    success: function (response) {

                        $('label[for="nameEdit"]').addClass('active');

                        let tag = response.tag;
                        nameEdit.val(tag.name);
                        tag.status ? status.attr('checked', true) : status.attr('checked', false);
                    }
                });
            });

            $('#btnEdit').click(function () {

                let inputArray = [{
                    id: 'nameEdit',
                    alertTitle: 'Uyarı',
                    alertTextAttr: 'Etiket adı'
                }];
                inputValidation(inputArray, 'editTagForm');
            });

        });


    </script>
@endsection
