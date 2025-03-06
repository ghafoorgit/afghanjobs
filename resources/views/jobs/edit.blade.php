<x-layout>
    <div class="mt-4">
        <x-session-message />
    </div>

    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Job</h2>

        <form action="{{ route('jobs.update', $job) }}" method="POST">
            @csrf
            @method('PUT')
            @include('jobs.form', ['job' => $job])
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Job</button>
        </form>
    </div>
</x-layout>
