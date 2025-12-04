@extends('layouts.app')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Data Pelanggaran</h1>
        <a href="{{ route('violations.create') }}" class="px-4 py-2 bg-[#f72585] rounded hover:bg-[#d81f73]">
            Catat Pelanggaran
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-[#1e1e2f] border border-gray-700 rounded-lg">
            <thead class="bg-[#13131f] text-gray-300">
                <tr>
                    <th class="px-4 py-3">Siswa</th>
                    <th class="px-4 py-3">Pelanggaran</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-200">
                @foreach ($violations as $v)
                <tr class="border-t border-gray-700">
                    <td class="px-4 py-3">{{ $v->student->name }}</td>
                    <td class="px-4 py-3 text-[#f72585]">{{ $v->type->name }}</td>
                    <td class="px-4 py-3">{{ $v->violation_date }}</td>

                    <td class="px-4 py-3">
                        <form action="{{ route('violations.destroy', $v->id) }}" method="POST"
                            onsubmit="return confirm('Hapus pelanggaran ini?')">
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
        {{ $violations->links() }}
    </div>
</div>
@endsection
