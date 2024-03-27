<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="" method="GET">
                    <div class="form-control my-5">
                        <input type="text" class="input input-bordered w-full max-w-xs my-3 mx-3"
                            value="{{ isset($search) ? $search : '' }}" placeholder="Search..." name="keyword"
                            id="keyword">
                        <input type="submit" class="btn btn-success w-full max-w-xs my-3 mx-3">
                    </div>
                </form>
                <div class="p-6 text-gray-900">
                    <h2 class="text-center">Daftar Konfirmasi Ticket</h2>
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>No.Booking</th>
                                    <th>Nama Pemesan</th>
                                    <th>Nama Penumpang</th>
                                    <th>Departure City</th>
                                    <th>Arrival City</th>
                                    <th>Departure Date</th>
                                    <th>Arrival Date</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($transactions as $transaction)
                                    @if ($transaction->payment_status == 'not_confirmed')
                                        <tr>
                                            <td>{{ $transaction->no_booking }}</td>
                                            <td>{{ $transaction->customer_name }}</td>
                                            <td>{{ $transaction->passanger_name }}</td>
                                            <td>{{ $transaction->flight->departure_city }}</td>
                                            <td>{{ $transaction->flight->arrival_city }}</td>
                                            <td>{{ $transaction->flight->departure_date }}</td>
                                            <td>{{ $transaction->flight->arrival_date }}</td>
                                            <td>{{ $transaction->total_price }}</td>
                                            <td>
                                                <div class="" style="display: flex ;flex-direction:row">
                                                    <form
                                                        action="{{ route('Admin.laporan.confirm', $transaction->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-success mr-2">Konfirmasi</button>
                                                    </form>
                                                    <form
                                                        action="{{ route('Admin.laporan.cancel', $transaction->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-error mr-2">Cancel</button>
                                                    </form>
                                                    <form
                                                        action="{{ route('Admin.tiket.delete', ['id' => $transaction->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        {{-- @method('DELETE') --}}
                                                        <button type="submit"
                                                            class="btn btn-error">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 my-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="" method="GET">
                    <div class="form-control my-5">
                        <input type="text" class="input input-bordered w-full max-w-xs my-3 mx-3"
                            value="{{ isset($search) ? $search : '' }}" placeholder="Search..." name="keyword"
                            id="keyword">
                        <input type="submit" class="btn btn-success w-full max-w-xs my-3 mx-3">
                    </div>
                </form>
                <div class="p-6 text-gray-900">
                    <h2 class="text-center">Daftar Ticket Terkonfirmasi</h2>
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>No.Booking</th>
                                    <th>Nama Pemesan</th>
                                    <th>Nama Penumpang</th>
                                    <th>Departure City</th>
                                    <th>Arrival City</th>
                                    <th>Departure Date</th>
                                    <th>Arrival Date</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($transactions as $transaction)
                                    @if ($transaction->payment_status == 'Success')
                                        <tr>
                                            <td>{{ $transaction->no_booking }}</td>
                                            <td>{{ $transaction->customer_name }}</td>
                                            <td>{{ $transaction->passanger_name }}</td>
                                            <td>{{ $transaction->flight->departure_city }}</td>
                                            <td>{{ $transaction->flight->arrival_city }}</td>
                                            <td>{{ $transaction->flight->departure_date }}</td>
                                            <td>{{ $transaction->flight->arrival_date }}</td>
                                            <td>{{ $transaction->total_price }}</td>
                                            <td>{{ $transaction->payment_status }}</td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
