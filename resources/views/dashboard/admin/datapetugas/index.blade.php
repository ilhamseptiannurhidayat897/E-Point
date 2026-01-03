@extends('dashboard.admin.main')

@section('content')
<h1 class="text-xl font-bold mb-4">Data Petugas</h1>

<a href="{{ route('datapetugas.create') }}"
   class="px-4 py-2 bg-purple-600 text-white rounded">+ Tambah</a>

<table class="w-full mt-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-3 py-2">No</th>
            <th class="border px-3 py-2">NK</th>
            <th class="border px-3 py-2">Nama</th>
            <th class="border px-3 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($petugas as $p)
        <tr>
            <td class="border px-3 py-2">{{ $loop->iteration }}</td>
            <td class="border px-3 py-2">{{ $p->nk }}</td>
            <td class="border px-3 py-2">{{ $p->nama }}</td>
            <td class="border px-3 py-2">
                <a href="{{ route('datapetugas.edit',$p->id) }}"
                   class="text-blue-600">Edit</a>

                <form action="{{ route('datapetugas.destroy',$p->id) }}"
                      method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Hapus data?')"
                            class="text-red-600 ml-2">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
