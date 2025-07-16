@extends('layout.template')

@section('content')
  <div class="max-w-7xl mx-auto p-8 space-y-6">

    <div class="text-2xl font-medium">{{ $title }}</div>

    <div class="flex justify-start">
      <a class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded shadow"
        href="{{ route('kategori_penghasilan.create') }}">
        Tambah Data
      </a>
    </div>

    <x-alert></x-alert>

    @if (!$kategori_penghasilan)
      <div class="bg-red-50 p-3 rounded-md text-red-800 text-sm">Data kosong ! </div>
    @endif

    @if ($kategori_penghasilan)
      <div class="overflow-x-auto rounded border border-gray-300 shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
          <thead class="bg-gray-100">
            <tr class="text-left text-gray-800 font-semibold">
              <th class="px-4 py-3 whitespace-nowrap">#</th>
              <th class="px-4 py-3 whitespace-nowrap">Nama Kategori</th>
              <th class="px-4 py-3 whitespace-nowrap">Rentang</th>
              <th class="px-4 py-3 whitespace-nowrap">Aksi</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($kategori_penghasilan as $index => $row)
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 whitespace-nowrap font-medium">{{ $index + 1 }}</td>
                <td class="px-4 py-3 whitespace-nowrap">{{ $row['nama_kategori'] }}</td>
                <td class="px-4 py-3 whitespace-nowrap">
                  Rp{{ number_format($row['batas_minimal'], 0, ',', '.') }} -
                  Rp{{ number_format($row['batas_maksimal'], 0, ',', '.') }}
                </td>

                <td class="px-4 py-3 whitespace-nowrap">
                  <a href="{{ route('kategori_penghasilan.edit', $row['id']) }}"
                    class="text-yellow-600 hover:underline">Edit</a> |
                  <form method="POST"
                    action="{{ route('kategori_penghasilan.destroy', $row['id']) }}"
                    onsubmit="return confirm('Apakah anda yakin ?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                      class="text-red-600 hover:underline">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif

  </div>
@endsection
