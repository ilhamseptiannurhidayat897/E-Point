@extends('dashboard.admin.main')

@section('content')
<h1>Import Data Kelas</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('datakelas.import.store') }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf

    <input type="file" name="file" class="form-control mb-3" required>

    <button class="btn btn-primary">
        Import Excel
    </button>
</form>
@endsection
