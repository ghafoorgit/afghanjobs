<x-layout>
    <div class="mt-4">
        <x-session-message />
    </div>

    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Create Job</h2>

        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            @include('jobs.form')
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Create Job</button>
        </form>
    </div>
</x-layout>
