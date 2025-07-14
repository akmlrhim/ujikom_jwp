@if (session('success'))
  <div class="bg-green-50 p-3 rounded-md text-green-800 text-sm">{{ session('success') }}
  </div>
@endif

@if (session('error'))
  <div class="bg-red-50 p-3 rounded-md text-red-800 text-sm">{{ session('error') }}</div>
@endif
