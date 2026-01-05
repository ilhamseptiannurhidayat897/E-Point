@extends('dashboard.admin.main')

@section('content')
<div class="p-6">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Data Siswa</h1>
        <a href="{{ route('datasiswa.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah Siswa
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">No</th>
                <th class="border p-2">NIS</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">JK</th>
                <th class="border p-2">Kelas</th>
                <th class="border p-2">Wali Kelas</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $item)
            <tr>
                <td class="border p-2">{{ $loop->iteration }}</td>
                <td class="border p-2">{{ $item->nis }}</td>
                <td class="border p-2">{{ $item->nama }}</td>
                <td class="border p-2">{{ $item->jk }}</td>
                <td class="border p-2">{{ $item->kelas->nama_kelas }}</td>
                <td class="border p-2">
                    {{ $item->kelas->waliKelas->nama ?? '-' }}
                </td>
                <td class="border p-2 flex gap-2">
                    <a href="{{ route('datasiswa.edit', $item->id) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <form action="{{ route('datasiswa.destroy', $item->id) }}"
                          method="POST"
                          onsubmit="return confirm('Hapus data siswa?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-3 py-1 rounded">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
