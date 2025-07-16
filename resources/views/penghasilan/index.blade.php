@extends('layout.template')

@section('content')
  <div class="max-w-7xl mx-auto p-8 space-y-6">

    <div class="text-2xl font-medium">{{ $title }}</div>

    <div class="flex justify-start gap-2">
      <a class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded shadow"
        href="{{ route('penghasilan.create') }}">
        Tambah Data
      </a>

      <a class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded shadow"
        href="{{ route('penghasilan.export') }}">
        Export data
      </a>
    </div>

    <x-alert></x-alert>

    <div class="2-full sm:w-1/2">
      <div
        class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
        <form action="{{ route('penghasilan.index') }}" method="get">
          <input type="text" name="search" id="name"
            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
            placeholder="Masukkan kata kunci" autocomplete="off"
            value="{{ request('search') }}" />
        </form>
      </div>
    </div>

    @if (!$penghasilan)
      <div class="bg-red-50 p-3 rounded-md text-red-800 text-sm">Data kosong !
      </div>
    @endif

    @if ($penghasilan)
      <div class="overflow-x-auto rounded border border-gray-300 shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
          <thead class="bg-gray-100">
            <tr class="text-left text-gray-800 font-semibold">
              <th class="px-4 py-3 whitespace-nowrap">#</th>
              <th class="px-4 py-3 whitespace-nowrap">Nama Lengkap</th>
              <th class="px-4 py-3 whitespace-nowrap">NIK</th>
              <th class="px-4 py-3 whitespace-nowrap">Penghasilan Bulanan</th>
              <th class="px-4 py-3 whitespace-nowrap">Kategori Penghasilan</th>
              <th class="px-4 py-3 whitespace-nowrap">Aksi</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($penghasilan as $index => $row)
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 whitespace-nowrap font-medium">{{ $index + 1 }}</td>
                <td class="px-4 py-3 whitespace-nowrap">{{ $row['nama_lengkap'] }}</td>
                <td class="px-4 py-3 whitespace-nowrap">{{ $row['nik'] }}</td>
                <td class="px-4 py-3 whitespace-nowrap">
                  Rp. {{ number_format($row['penghasilan_bulanan'], 0, ',', '.') }}

                </td>
                <td class="px-4 py-3 whitespace-nowrap">{{ $row['kategori_penghasilan'] }}
                </td>
                <td class="px-4 py-3 whitespace-nowrap">
                  <a href="{{ route('penghasilan.edit', $row['id']) }}"
                    class="text-yellow-600 hover:underline">Edit</a> |
                  <form method="POST"
                    action="{{ route('penghasilan.destroy', $row['id']) }}"
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
