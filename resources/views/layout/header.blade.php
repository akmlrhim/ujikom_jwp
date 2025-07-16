  <header class="bg-blue-700">
    <div
      class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4 mb-3 sm:px-6 lg:px-8">

      {{-- <x-icon></x-icon> --}}

      <div class="flex flex-1 items-center justify-end md:justify-between font-medium">
        <nav aria-label="Global" class="hidden md:block">

          <ul class="flex items-center gap-6 text-sm">
            <li>
              <a class="text-white transition hover:text-white/75"
                href="{{ route('beranda') }}">
                Beranda </a>
            </li>

            <li>
              <a class="text-white transition hover:text-white/75"
                href="{{ route('penghasilan.index') }}">
                Penghasilan </a>
            </li>

            <li>
              <a class="text-white transition hover:text-white/75"
                href="{{ route('kategori_penghasilan.index') }}">
                Kategori Penghasilan </a>
            </li>
          </ul>
        </nav>

      </div>
    </div>
  </header>
