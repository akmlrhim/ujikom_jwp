@if (session('sukses'))
  <div class="bg-green-50 p-3 rounded-md text-green-800 text-sm">{{ session('sukses') }}
  </div>
@endif

@if (session('gagal'))
  <div class="bg-red-50 p-3 rounded-md text-red-800 text-sm">{{ session('gagal') }}</div>
@endif
