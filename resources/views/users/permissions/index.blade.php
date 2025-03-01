<x-layout>
    <div class="container">
        <h1 class="mb-4">Permissions</h1>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Create Permission</a>

        <table class="table">
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
                            <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-warning btn-sm">Edit</a>
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
