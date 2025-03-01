<x-layout>
    <div class="container">
        <h1>Edit Permission</h1>
        <form action="{{ route('permissions.update', $permission) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Permission Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $permission->name) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Permission</button>
        </form>
    </div>
</x-layout>
