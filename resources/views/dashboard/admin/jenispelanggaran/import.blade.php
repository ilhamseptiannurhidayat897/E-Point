@extends('dashboard.admin.main')

@section('content')
<h3>Import Jenis Pelanggaran</h3>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="POST"
      action="{{ route('jenispelanggaran.import.store') }}"
      enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <input type="file" name="file" class="form-control" required>
    </div>

    <button class="btn btn-danger">
        Import
    </button>
</form>
@endsection
