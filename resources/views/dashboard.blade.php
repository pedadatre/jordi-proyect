<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            @if(Auth::user()->role == 'admin')
                <!-- Admin Dashboard -->
                <div class="admin-dashboard mt-6">
                    <h3 class="text-2xl font-semibold mb-4">Admin Dashboard</h3>
                    
                    <!-- Resumen de Métricas Clave -->
                    <div class="metrics grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                        <div class="metric bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                            <h4 class="text-lg font-semibold">Total Users</h4>
                            <p class="text-2xl">{{ $totalUsers }}</p>
                        </div>
                        <div class="metric bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                            <h4 class="text-lg font-semibold">Total Crews</h4>
                            <p class="text-2xl">{{ $totalCrews }}</p>
                        </div>
                        <div class="metric bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                            <h4 class="text-lg font-semibold">Pending Requests</h4>
                            <p class="text-2xl">{{ $pendingRequests }}</p>
                        </div>
                        <div class="metric bg-white dark:bg-gray-700 p-4 rounded-lg shadow">
                            <h4 class="text-lg font-semibold">Events Organized</h4>
                            <p class="text-2xl">{{ $totalEvents }}</p>
                        </div>
                    </div>

                    <!-- Gestión de Usuarios -->
                    <div class="section mb-6">
                        <h4 class="text-xl font-semibold mb-2">Manage Users</h4>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-2">Add User</a>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $user->id }}</td>
                                        <td class="border px-4 py-2">{{ $user->name }}</td>
                                        <td class="border px-4 py-2">{{ $user->email }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Gestión de Crews -->
                    <div class="section mb-6">
                        <h4 class="text-xl font-semibold mb-2">Manage Crews</h4>
                        <a href="{{ route('admin.crews.create') }}" class="btn btn-primary mb-2">Create Crew</a>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Year</th>
                                    <th class="px-4 py-2">Slogan</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($crews as $crew)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $crew->id }}</td>
                                        <td class="border px-4 py-2">{{ $crew->name }}</td>
                                        <td class="border px-4 py-2">{{ $crew->year }}</td>
                                        <td class="border px-4 py-2">{{ $crew->slogan }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('admin.crews.edit', $crew->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                            <form action="{{ route('admin.crews.destroy', $crew->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Gestión de Solicitudes -->
                    <div class="section mb-6">
                        <h4 class="text-xl font-semibold mb-2">Manage Requests</h4>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">User</th>
                                    <th class="px-4 py-2">Crew</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requests as $request)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $request->id }}</td>
                                        <td class="border px-4 py-2">{{ $request->user->name }}</td>
                                        <td class="border px-4 py-2">{{ $request->crew->name }}</td>
                                        <td class="border px-4 py-2">{{ $request->status }}</td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('admin.requests.update', $request->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" name="action" value="accept" class="btn btn-success">Accept</button>
                                                <button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Gestión de Eventos -->
                    <div class="section mb-6">
                        <h4 class="text-xl font-semibold mb-2">Manage Events</h4>
                        <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-2">Create Event</a>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Date</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $event->id }}</td>
                                        <td class="border px-4 py-2">{{ $event->name }}</td>
                                        <td class="border px-4 py-2">{{ $event->date }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Estadísticas y Gráficos -->
                    <div class="section mb-6">
                        <h4 class="text-xl font-semibold mb-2">Statistics</h4>
                        <div class="charts grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Aquí puedes agregar gráficos usando una biblioteca como Chart.js -->
                        </div>
                    </div>
                </div>
            @else
                <!-- User Dashboard -->
                <div class="user-dashboard mt-6">
                    <h3 class="text-2xl font-semibold mb-4">User Dashboard</h3>
                    <p>Welcome, {{ Auth::user()->name }}!</p>
                    <!-- Aquí puedes agregar contenido específico para los usuarios -->
                </div>
            @endif
        </div>
    </div>
</x-app-layout>