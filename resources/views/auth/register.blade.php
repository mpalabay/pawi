<x-layout>
    <x-slot:title>Register</x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 bg-base-100">
                <div class="card-body">
                    <h1 class="text-2xl font-bold text-center text-[color:var(--text)] [text-shadow:0_0_8px_rgba(107,175,146,0.3)] mb-6">Create Account</h1>

                    <form method="POST" action="/register">
                        @csrf
                        {{-- Name --}}
                        <div class="mb-4">
                            <label class="floating-label">
                                <input type="text" name="name" placeholder="Juan Dela Cruz" value="{{ old('name') }}"
                                    class="input outline-none input-bordered w-full @error('name') input-error @enderror"
                                    required>
                                <span>Name</span>
                            </label>
                            @error('name')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        {{-- Username --}}
                        <div class="mb-4">
                            <label class="floating-label">
                                <input type="text" name="username" placeholder="username" value="{{ old('username') }}"
                                    class="input outline-none input-bordered w-full @error('name') input-error @enderror" required>
                                <span>Username</span>
                            </label>
                            @error('username')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-4">
                            <label class="floating-label">
                                <input type="email" name="email" placeholder="mail@example.com"
                                    value="{{ old('email') }}"
                                    class="input outline-none input-bordered w-full @error('email') input-error @enderror"
                                    required>
                                <span>Email</span>
                            </label>
                            @error('email')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-4">
                            <label class="floating-label">
                                <input type="password" name="password" placeholder="••••••••"
                                    class="input outline-none input-bordered w-full @error('password') input-error @enderror"
                                    required>
                                <span>Password</span>
                            </label>
                            @error('password')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        {{-- Password Confirmation --}}
                        <label class="floating-label mb-6">
                            <input type="password" name="password_confirmation" placeholder="••••••••"
                                class="input outline-none input-bordered w-full" required>
                            <span>Confirm Password</span>
                        </label>

                        {{-- Submit Button --}}
                        <div class="form-control mt-8">
                            <button type="submit" class="btn bg-[color:var(--primary)] text-white w-full">
                                Register
                            </button>
                        </div>
                    </form>

                    <div class="divider">OR</div>
                    <p class="text-center text-sm">
                        Already have an account?
                        <a href="{{ route('login') }}" class="link link-primary">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>