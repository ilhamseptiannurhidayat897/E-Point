@extends('layouts.app')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Data Poin Kebaikan</h1>
        <a href="{{ route('good-points.create') }}" class="px-4 py-2 bg-[#4cc9f0] rounded hover:bg-[#3bb0d6]">
            Catat Poin Baik
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-[#1e1e2f] border border-gray-700 rounded-lg">
            <thead class="bg-[#13131f] text-gray-300">
                <tr>
                    <th class="px-4 py-3">Siswa</th>
                    <th class="px-4 py-3">Jenis</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-200">
                @foreach ($points as $p)
                <tr class="border-t border-gray-700">
                    <td class="px-4 py-3">{{ $p->student->name }}</td>
                    <td class="px-4 py-3 text-[#4cc9f0]">{{ $p->type->name }}</td>
                    <td class="px-4 py-3">{{ $p->given_at }}</td>

                    <td class="px-4 py-3">
                        <form action="{{ route('good-points.destroy', $p->id) }}" method="POST"
                            onsubmit="return confirm('Hapus poin ini?')">
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
        {{ $points->links() }}
    </div>
</div>
@endsection
