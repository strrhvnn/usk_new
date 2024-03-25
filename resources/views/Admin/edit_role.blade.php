<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 justify-content-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <form action="{{ route('Admin.edit_role.update', $users->id) }}" class="form-control" method="POST">
                    @csrf
                    <div class="form-control mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ $users->name }}" class="input input-bordered w-full" />
                    </div>
                    <div class="form-control mb-3">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="select select-bordered w-full">
                            <option disabled selected>Choose Role</option>
                            <option value="maskapai">Maskapai</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="form-control mb-3">
                        <label for="airline_id">Airline</label>
                        <select name="airline_id" id="airline_id" class="select select-bordered w-full">
                            <option disabled selected>Choose Airline</option>
                            @foreach ($airlines as $airline)
                            <option value="{{ $airline->id }}">{{ $airline->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-success w-full" type="submit">Edit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
