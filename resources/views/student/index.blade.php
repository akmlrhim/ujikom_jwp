@extends('layout.template')

@section('content')
  <div class="max-w-7xl mx-auto p-8 space-y-6">
    <div class="flex justify-start">
      <a class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded shadow"
        href="{{ route('student.create') }}">
        Add New
      </a>
    </div>

    <x-alert></x-alert>

    <div class="overflow-x-auto rounded border border-gray-300 shadow">
      <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-100">
          <tr class="text-left text-gray-800 font-semibold">
            <th class="px-4 py-3 whitespace-nowrap">#</th>
            <th class="px-4 py-3 whitespace-nowrap">Name</th>
            <th class="px-4 py-3 whitespace-nowrap">NIM</th>
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
                  <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
