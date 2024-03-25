<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Airline') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 justify-content-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <form action="{{ route('Admin.add_airline.store') }}" class="form-control" method="POST">
                    @csrf
                    <div class="form-control mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="input input-bordered w-full" />
                    </div>
                    <button class="btn btn-success w-full" type="submit">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
