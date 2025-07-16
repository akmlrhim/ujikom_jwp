@extends('layout.template')

@section('content')
  <div class="max-w-7xl mx-auto p-8 space-y-6 bg-white shadow-md">

    <form action="{{ route('penghasilan.update', $penghasilan['id']) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="space-y-8">
        <h2 class="text-3xl font-semibold text-gray-900">{{ $title }}</h2>

        <x-alert></x-alert>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">

          <div class="sm:col-span-4">
            <label for="nama_lengkap"
              class="block text-sm/6 mb-2 font-medium text-gray-900">Nama lengkap</label>
            <div
              class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input type="text" name="nama_lengkap" id="nama_lengkap"
                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                autocomplete="off"
                value="{{ old('nama_lengkap', $penghasilan['nama_lengkap']) }}" />
            </div>
            @error('nama_lengkap')
              <small class="text-red-700 text-sm">{{ $message }}</small>
            @enderror
          </div>

          <div class="sm:col-span-4">
            <label for="nik"
              class="block text-sm/6 mb-2 font-medium text-gray-900">NIK</label>
            <div
              class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input type="text" name="nik" id="nik" inputmode="numeric"
                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                autocomplete="off" value="{{ old('nik', $penghasilan['nik']) }}" />
            </div>
            @error('nik')
              <small class="text-red-700 text-sm">{{ $message }}</small>
            @enderror
          </div>

          <div class="sm:col-span-4">
            <label for="penghasilan_bulanan"
              class="block text-sm/6 mb-2 font-medium text-gray-900">Penghasilan
              Bulanan</label>
            <div
              class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input type="text" name="penghasilan_bulanan" id="penghasilan_bulanan"
                inputmode="numeric"
                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                autocomplete="off"
                value="{{ old('penghasilan_bulanan', $penghasilan['penghasilan_bulanan']) }}" />
            </div>
            @error('penghasilan_bulanan')
              <small class="text-red-700 text-sm">{{ $message }}</small>
            @enderror
          </div>

        </div>
      </div>
      <div class="mt-6 flex items-center justify-start gap-x-6">
        <a href="{{ route('penghasilan.index') }}"
          class="text-sm/6 font-semibold text-gray-900">Kembali</a>
        <button type="submit"
          class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
      </div>
    </form>
  </div>
@endsection
