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
                    <h2 class="text-center">Daftar Account</h2>

                    <div class="overflow-x-auto">

                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td class="flex">
                                            <a href="{{ route('Admin.edit_role', $user->id) }}"class="btn btn-warning mx-2">Edit Role</a>
                                            <form action="{{ route('Admin.delete.user', ['id' => $user->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this airline?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-error">Delete User</button>
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
