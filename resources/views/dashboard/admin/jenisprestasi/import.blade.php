@extends('dashboard.admin.main')

@section('content')
<h3>Import Jenis Prestasi</h3>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="POST"
      action="{{ route('jenisprestasi.import.store') }}"
      enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <input type="file" name="file" class="form-control" required>
    </div>

    <button class="btn btn-primary">
        Import
    </button>
</form>
@endsection
