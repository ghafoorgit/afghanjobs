<x-layout>
    <div class="mt-3">
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Create Role</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Role Name</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        <!-- Displaying Permissions separated by commas -->
                        @if($role->permissions->count())
                            {{ $role->permissions->pluck('name')->implode(', ') }}
                        @else
                            <span>No permissions assigned</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
