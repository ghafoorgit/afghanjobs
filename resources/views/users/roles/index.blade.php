<x-layout>
    <div class="mt-3 mb-3">
        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">Create Role</a>
    </div>
    <div>
        <x-session-message />
    </div>
    <table class="table table-striped table-hover">
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
                        @if(count($role->permissions)>0)
                            {{ $role->permissions->pluck('name')->implode(', ') }}
                        @else
                            <span>No permissions assigned</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-success btn-sm">Edit</a>

                        <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
