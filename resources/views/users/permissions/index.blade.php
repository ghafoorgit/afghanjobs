<x-layout>
    <div class="container mt-2">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Permissions</h2>
            <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm">Create Permission</a>
        </div>
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
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this permission?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
