@extends('layout.template')

@section('content')
  <div class="max-w-7xl mx-auto p-8 space-y-6">

    <div class="grid gap-4 lg:grid-cols-3">
      <div class="relative p-6 rounded-2xl bg-green-800 shadow-lg">
        <div class="space-y-2">
          <div
            class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-white">
            <span>Mahasiswa Aktif</span>
          </div>
          <div class="text-xl dark:text-gray-100 font-bold">
            {{ $count }}
          </div>
        </div>
      </div>
      <div class="relative p-6 rounded-2xl bg-white shadow-lg dark:bg-blue-800">
        <div class="space-y-2">
          <div
            class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-400">
            <span>Barang</span>
          </div>
          <div class="text-xl dark:text-gray-100 font-bold">
            19
          </div>
        </div>
      </div>
    </div>

    <div class="flex justify-start">
      <a class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded shadow"
        href="{{ route('student.create') }}">
        Add New
      </a>
    </div>

    <x-alert></x-alert>

    @if (!$student)
      <div class="bg-red-50 p-3 rounded-md text-red-800 text-sm">Student data is empty !
      </div>
    @endif

    @if ($student)
      <div class="overflow-x-auto rounded border border-gray-300 shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
          <thead class="bg-gray-100">
            <tr class="text-left text-gray-800 font-semibold">
              <th class="px-4 py-3 whitespace-nowrap">#</th>
              <th class="px-4 py-3 whitespace-nowrap">Name</th>
              <th class="px-4 py-3 whitespace-nowrap">NIM</th>
              <th class="px-4 py-3 whitespace-nowrap">Status</th>
              <th class="px-4 py-3 whitespace-nowrap">Email</th>
              <th class="px-4 py-3 whitespace-nowrap">Study Program</th>
              <th class="px-4 py-3 whitespace-nowrap">Action</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-100">
            @foreach ($student as $index => $row)
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 whitespace-nowrap font-medium">{{ $index + 1 }}</td>
                <td class="px-4 py-3 whitespace-nowrap">{{ $row['name'] }}</td>
                <td class="px-4 py-3 whitespace-nowrap">{{ $row['nim'] }}</td>
                <td class="px-4 py-3 whitespace-nowrap">{{ $row['status'] }}</td>
                <td class="px-4 py-3 whitespace-nowrap">{{ $row['email'] }}</td>
                <td class="px-4 py-3 whitespace-nowrap">{{ $row['study_program'] }}</td>
                <td class="px-4 py-3 whitespace-nowrap">
                  <a href="{{ route('student.edit', $row['id']) }}"
                    class="text-yellow-600 hover:underline">Edit</a> |
                  <form method="POST" action="{{ route('student.destroy', $row['id']) }}"
                    onsubmit="return confirm('Are you sure delete this student ?');"
                    class="inline">
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
