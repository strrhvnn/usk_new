<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Airline') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-center">Daftar Airline</h2>
                    <a href="{{ route('Admin.add_airline') }}" class="btn btn-success my-5">Add Airline</a>
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($airlines as $airline)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $airline->name }}</td>
                                        <td class="flex">
                                            <a href="{{ route('Admin.edit_airline', $airline->id) }}"class="btn btn-warning mx-3">Edit Airline</a>
                                            <form action="{{ route('Admin.airline.delete', ['id' => $airline->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this airline?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-error">Delete Airline</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
