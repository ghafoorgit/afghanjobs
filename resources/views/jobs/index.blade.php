<x-layout>
    <div class="mt-4">
        <x-session-message />
    </div>

    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Job Listings</h2>
        <a href="{{ route('jobs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Job</a>

        <table class="w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Title</th>
                    <th class="border border-gray-300 px-4 py-2">Company</th>
                    <th class="border border-gray-300 px-4 py-2">Location</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $job->job_title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $job->company_name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $job->job_location }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('jobs.show', $job) }}" class="text-blue-500">View</a> |
                            <a href="{{ route('jobs.edit', $job) }}" class="text-green-500">Edit</a> |
                            <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
