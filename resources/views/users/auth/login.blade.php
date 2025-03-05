<x-layout>


    <div class="container mt-4 d-flex justify-content-center">
        <div class="card" style="width:40%;">
            <x-session-message />
            <div class="card-header bg-dark text-white text-center">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="Enter your email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Enter your password">
                        @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
