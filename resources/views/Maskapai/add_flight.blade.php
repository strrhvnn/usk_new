<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Flight') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 justify-content-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <form action="{{ route('Maskapai.add.flight.store') }}" class="form-control flex" method="POST">
                    @csrf
                    <div class="form-control mb-3">
                        <label for="no_flight">No Flight</label>
                        <input type="text" name="no_flight" class="input input-bordered w-full" />
                    </div>
                    <div class="form-control mb-3">
                        <label for="departure_city">Departure City</label>
                        <input type="text" name="departure_city" class="input input-bordered w-full" />
                    </div>
                    <div class="form-control mb-3">
                        <label for="arrival_city">Arrival City</label>
                        <input type="text" name="arrival_city" class="input input-bordered w-full" />
                    </div>
                    <div class="form-control mb-3">
                        <label for="departure_date">Departure Date</label>
                        <input type="date" name="departure_date" class="input input-bordered w-full" />
                    </div>
                    <div class="form-control mb-3">
                        <label for="arrival_date">Arrival Date</label>
                        <input type="date" name="arrival_date" class="input input-bordered w-full" />
                    </div>
                    <div class="form-control mb-3">
                        <label for="departure_time">Departure Time</label>
                        <input type="time" name="departure_time" class="input input-bordered w-full" />
                    </div>
                    <div class="form-control mb-3">
                        <label for="arrival_time">Arrival Time</label>
                        <input type="time" name="arrival_time" class="input input-bordered w-full" />
                    </div>
                    <div class="form-control mb-3">
                        <label for="seat">Seat</label>
                        <input type="text" name="seat" class="input input-bordered w-full" />
                    </div>
                    <div class="form-control mb-3">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="input input-bordered w-full" />
                        <input type="hidden" name="airline_id" value="{{ auth()->user()->airline_id }}" class="input input-bordered w-full" />
                    </div>
                    <button class="btn btn-success w-full" type="submit">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
