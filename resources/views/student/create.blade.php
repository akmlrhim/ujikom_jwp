@extends('layout.template')

@section('content')
  <div class="max-w-7xl mx-auto p-8 space-y-6 bg-white shadow-md">

    <form action="{{ route('student.store') }}" method="POST">
      @csrf
      <div class="space-y-8">
        <h2 class="text-3xl font-semibold text-gray-900">{{ $title }}</h2>

        <x-alert></x-alert>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">

          <div class="sm:col-span-4">
            <label for="name"
              class="block text-sm/6 mb-2 font-medium text-gray-900">Name</label>
            <div
              class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input type="text" name="name" id="name"
                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                placeholder="John Doe" autocomplete="off" value="{{ old('name') }}" />
            </div>
            @error('name')
              <small class="text-red-700 text-sm">{{ $message }}</small>
            @enderror
          </div>

          <div class="sm:col-span-4">
            <label for="nim"
              class="block text-sm/6 mb-2 font-medium text-gray-900">NIM</label>
            <div
              class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input type="text" name="nim" id="nim" inputmode="numeric"
                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                placeholder="2201XXXXX" autocomplete="off" value="{{ old('nim') }}" />
            </div>
            @error('nim')
              <small class="text-red-700 text-sm">{{ $message }}</small>
            @enderror
          </div>

          <div class="sm:col-span-4">
            <label for="email"
              class="block text-sm/6 mb-2 font-medium text-gray-900">Email</label>
            <div
              class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input type="email" name="email" id="email"
                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                placeholder="email@gmail.com" autocomplete="off"
                value="{{ old('email') }}" />
            </div>
            @error('email')
              <small class="text-red-700 text-sm">{{ $message }}</small>
            @enderror
          </div>

          <div class="sm:col-span-4">
            <label for="gender" class="block text-sm font-medium text-gray-900 mb-1">
              Gender
            </label>
            <div class="relative">
              <select name="gender" id="gender"
                class="block w-full rounded-md border border-gray-300 bg-white py-2 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                <option value="" {{ old('gender') == '' ? 'selected' : '' }}>Select
                  your gender</option>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                </option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                  Female</option>
              </select>
            </div>
            @error('gender')
              <small class="text-red-700 text-sm">{{ $message }}</small>
            @enderror
          </div>

          <div class="sm:col-span-4">
            <label for="study_program"
              class="block text-sm/6 font-medium mb-2 text-gray-900">Study Program</label>
            <div
              class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input type="text" name="study_program" id="study_program"
                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                placeholder="Enter your study program.." autocomplete="off"
                value="{{ old('study_program') }}" />
            </div>
            @error('study_program')
              <small class="text-red-700 text-sm">{{ $message }}</small>
            @enderror
          </div>

        </div>
      </div>
      <div class="mt-6 flex items-center justify-start gap-x-6">
        <a href="{{ route('student.index') }}"
          class="text-sm/6 font-semibold text-gray-900">Back</a>
        <button type="submit"
          class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </form>
  </div>
@endsection
