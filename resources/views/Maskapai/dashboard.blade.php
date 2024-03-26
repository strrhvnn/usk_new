<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-center">Daftar Penerbangan Maskapai {{ auth()->user()->name }}</h2>
                    <a href="{{ route('Maskapai.add.flight') }}" class="btn btn-success my-5">Tambah Penerbangan</a>
                    <div class="overflow-x-auto">

                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No.Penerbangan</th>
                                    <th>Departure City</th>
                                    <th>Arrival City</th>
                                    <th>Departure Date</th>
                                    <th>Arrival Date</th>
                                    <th>Departure Time</th>
                                    <th>Arrival Time</th>
                                    <th>Price</th>
                                    <th>Seat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($flights as $flight)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $flight->no_flight }}</td>
                                        <td>{{ $flight->departure_city }}</td>
                                        <td>{{ $flight->arrival_city }}</td>
                                        <td>{{ $flight->departure_date }}</td>
                                        <td>{{ $flight->arrival_date }}</td>
                                        <td>{{ $flight->departure_time }}</td>
                                        <td>{{ $flight->arrival_time }}</td>
                                        <td>{{ $flight->price }}</td>
                                        <td>{{ $flight->seat }}</td>
                                        <td class="flex">
                                            <a href="{{ route('Maskapai.edit.flight', $flight->id) }}"class="btn btn-warning mx-2">Edit</a>
                                            <form action="{{ route('Maskapai.flight.delete', ['id' => $flight->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this flight?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-error">Delete</button>
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
    </div>
</x-app-layout>
