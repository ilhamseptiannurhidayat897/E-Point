@extends('dashboard.admin.main')

@section('content')
<div class="p-6">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Data Wali Kelas</h1>

        <a href="{{ route('walikelas.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Wali Kelas
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">NIP</th>
                    <th class="border px-4 py-2">Kelas</th>
                    <th class="border px-4 py-2">Username</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($walikelas as $item)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>

                    <td class="border px-4 py-2">
                        {{ $item->nama }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $item->nip }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $item->kelas->nama_kelas ?? '-' }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $item->user->username ?? '-' }}
                    </td>

                    <td class="border px-4 py-2 space-x-2">
                        <a href="{{ route('walikelas.edit', $item->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            Edit
                        </a>

                        <form action="{{ route('walikelas.destroy', $item->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Yakin hapus data?')">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">
                        Data wali kelas belum ada
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
