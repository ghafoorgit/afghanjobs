<x-layout>
    <div class="container mt-2">
        <h1 class="mb-3">Permissions</h1>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Create Permission</a>
        <x-session-message />
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Permission Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('permissions.destroy', $permission) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
