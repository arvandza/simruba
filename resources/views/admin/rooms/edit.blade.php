@extends('layout.app')

@section('title', 'SIMRUBA | Buat Ruangan')

@section('content')
    @section('current_menu')Menu Ruangan @endsection
    @section('current_page')Edit Data Ruangan @endsection

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center">
                        <a href="{{ url()->previous() }}" class="me-2">
                            <i data-feather="arrow-left" class="icon-md"></i>
                        </a>
                        <h4 class="card-title mb-0">Edit Data Ruangan</h4>
                    </div>
                    <p class="text-muted mb-3 mt-3">Silahkan isi data yang ingin diubah dibawah ini</p>
                    <form action="{{ route('rooms.update', $room->id) }}') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input id="name" class="form-control" name="name" type="text"
                                value="{{ $room->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea id="maxlength-textarea" class="form-control" id="defaultconfig-4" maxlength="100" rows="8"
                                name="description" placeholder="Buat deskripsi mengenai ruangan max 100 karakter"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="capacity" class="form-label">Kapasitas</label>
                            <input id="capacity" class="form-control" name="capacity" type="number" min="1"
                                max="100" value="{{ $room->capacity }}">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Ruangan</label>
                            <input type="file" id="dropify" name="image" accept="image/*"
                                data-default-file="{{ asset('storage/' . $room->image) }}" />
                        </div>
                        <button class="btn btn-primary mt-3" type="submit" value="Submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>

    <script src="{{ asset('assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/dropify/dist/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/tags-input.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/timepicker.js') }}"></script>

@endsection
