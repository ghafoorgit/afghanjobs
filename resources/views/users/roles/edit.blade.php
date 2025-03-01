<x-layout>
    <div class="container">
        <h1>Edit Role</h1>
        <form action="{{ route('roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $role->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="permissions" class="form-label">Assign Permissions</label>
                <select name="permissions[]" id="permissions" class="form-select" multiple>
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->id }}" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $permission->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Role</button>
        </form>
    </div>
</x-layout>
