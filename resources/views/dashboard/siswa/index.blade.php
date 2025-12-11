@extends('layouts.app')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Data Siswa</h1>
        <a href="{{ route('students.create') }}" class="px-4 py-2 bg-[#4cc9f0] rounded hover:bg-[#3bb0d6]">Tambah Siswa</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-[#1e1e2f] border border-gray-700 rounded-lg">
            <thead class="bg-[#13131f] text-gray-300">
                <tr>
                    <th class="px-4 py-3">NIS</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Kelas</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-200">
                @foreach ($students as $s)
                <tr class="border-t border-gray-700">
                    <td class="px-4 py-3">{{ $s->nis }}</td>
                    <td class="px-4 py-3">{{ $s->name }}</td>
                    <td class="px-4 py-3">{{ $s->tingkat }} {{ $s->jurusan }} {{ $s->kelas }}</td>

                    <td class="px-4 py-3 flex gap-2">
                        <a href="{{ route('students.show', $s->id) }}" class="text-[#4cc9f0] hover:underline">Detail</a>
                        <a href="{{ route('students.edit', $s->id) }}" class="text-yellow-400 hover:underline">Edit</a>

                        <form action="{{ route('students.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Hapus siswa ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-400 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $students->links() }}
    </div>
</div>
@endsection
