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
                            <th>Eylem</th>
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
                        {{-- kategori listesini table içerisine iterate ettik  --}}
                        @foreach($listCategory as $item)
                            <tr id="row{{ $item->id }}">
                                <td>
                                    <a href="javascript:void(0)" class="deleteCategory"
                                       data-id="{{ $item->id }}">
                                        <i class="fas fa-trash red-text"></i>
                                    </a>
                                    <a href="#editCategory" class="editCategory modal-trigger"
                                       data-id="{{ $item->id }}">
                                        <i class="fas fa-edit blue-text"></i>
                                    </a>
                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->getUser->name }}</td>

                                <td>
                                    @if($item->status)
                                        <a class="waves-effect waves-light btn green changeStatus"
                                           data-id="{{ $item->id }}">Aktif</a>
                                    @else
                                        <a class="waves-effect waves-light btn red changeStatus"
                                           data-id="{{ $item->id }}">Pasif</a>
                                    @endif

                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i:s') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        @endforeach
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

{{-- Edit Modal --}}
<div id="editCategory" class="modal modalEdit">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 l12">
                <div class="card">
                    <div class="card-content">
                        <h5 class="card-title activator">Kategori Düzenleme</h5>
                        <form id="editCategoryForm" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input name="name" id="nameEdit" type="text">
                                    <label for="nameEdit">Kategori Adı</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">email</i>
                                    <input name="description" id="descriptionEdit" type="text">
                                    <label for="descriptionEdit">Açıklama</label>
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
{{-- Edit Modal --}}

<!-- Modal Structure -->

@section('js')
    <script>
        $(document).ready(function ()
        {
            function inputValidation(inputArray, formID)
            {
                let validation = true;

                for (let i = 0; i < inputArray.length; i++)
                {
                    var inputInfo = inputArray[i];
                    var input = $('#' + inputInfo.id ).val();

                    console.log(inputInfo);

                    if (input.trim() === "")
                    {
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
            $('#btnSave').click(function ()
            {
                let inputArray = [
                    {
                        id: 'name',
                        alertTextAttr: 'Kategori Adı',
                        alertTitle: "Uyarı",
                    }
                ];
                inputValidation(inputArray, 'frmCategory');
            });
            //TODO: csrf token meta tag name değerine eşitleyerek tüm ajax işlemlerimizde kullanabilriz
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.changeStatus').click(function ()
            {
                let dataID = $(this).data('id');
                let self = $(this);

                $.ajax({
                    url: '{{route('admin.category.changeStatus')}}',
                    method: 'POST',
                    data: {
                        id: dataID,
                    },
                    async: false,
                    success: function (response)
                    {
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
                            text: dataID + " id'li kategorinin durumu şu anda " + self[0].innerText
                                + " olarak güncellendi.",
                            confirmButtonText: 'Tamam'
                        })
                    }
                });
            });
            $('.deleteCategory').click(function ()
            {
                let dataID = $(this).data('id');
                let self = $(this);
                Swal.fire({
                    title: 'Uyarı',
                    text: `${dataID} ID'li kategoriyi silmek istediğinize emin misiniz?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet',
                    cancelButtonText: 'Hayır'
                }).then((result) =>
                {
                    // onaylandığı durumda ilgi kategoriyi sildik
                    if (result.isConfirmed)
                    {
                        $.ajax({
                            url: '{{route('admin.category.delete')}}',
                            method: 'POST',
                            data: {
                                id: dataID,
                            },
                            success: function (response)
                            {
                                $('#row' + dataID).remove();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Uyarı',
                                    text: dataID + " id'li kategorinin silindi",
                                    confirmButtonText: 'Tamam'
                                })
                            }
                        })
                    }
                })
            });
            $('.editCategory').click(function ()
            {
                let dataID = $(this).data('id');
                let nameEdit = $('#nameEdit');
                let descriptionEdit = $('#descriptionEdit');
                let status = $('#statusEdit');
                let self = $(this);

                // TODO: route url de categoryEdit category ıD ile değiştirdik
                let route = '{{ route('category.edit', ['category' => 'categoryEdit']) }}';
                let routeUpdate = '{{ route('category.update', ['category' => 'categoryEdit']) }}';

                route = route.replace('categoryEdit', dataID);
                routeUpdate = routeUpdate.replace('categoryEdit', dataID);

                $('#editCategoryForm').attr('action', routeUpdate);
                $.ajax({
                    url: route,
                    method: 'GET',
                    data: {
                        id: dataID,
                    },
                    success: function (response)
                    {
                        $('label[for="nameEdit"]').addClass('active');
                        $('label[for="descriptionEdit"]').addClass('active');
                        let category = response.category;

                        nameEdit.val(category.name);
                        descriptionEdit.val(category.description);

                        category.status ? status.attr('checked', true) :  status.attr('checked', false);
                    }
                });
            });
            $('#btnEdit').click(function ()
            {
                let inputArray = [{
                    id: 'nameEdit',
                    alertTitle: 'Uyarı',
                    alertTextAttr: 'Kategori adı'
                }];
                inputValidation(inputArray, 'editCategoryForm');
            });
        });
    </script>
@endsection
