<x-layout>
    <x-slot:title>
        Login
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 bg-base-100">
                <div class="card-body">
                    <h1 class="text-2xl font-bold text-center text-[color:var(--text)] [text-shadow:0_0_8px_rgba(107,175,146,0.3)] mb-6">Welcome Back</h1>

                    <form method="POST" action="/login">
                        @csrf
                        {{-- Email --}}
                        <div class="mb-4">
                            <label class="floating-label">
                                <input type="email" name="email" placeholder="mail@example.com" value="{{ old('email') }}"
                                    class="input outline-none input-bordered w-full @error('email') input-error @enderror" required>
                                <span>Email</span>
                            </label>
                        </div>

                        {{-- Password --}}
                        <div class="mb-4">
                            <label class="floating-label">
                                <input type="password" name="password" placeholder="••••••••"
                                    class="input outline-none input-bordered w-full @error('password') input-error @enderror" required>
                                <span>Password</span>
                            </label>
                        </div>

                        @error('not_valid') 
                            <div class="label text-center w-full">
                                <span class="label-text-alt text-error w-full">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Remember Me -->
                        <div class="form-control mt-4">
                            <label class="label cursor-pointer justify-start">
                                <input type="checkbox" name="remember" class="checkbox outline-none">
                                <span class="label-text ml-2">Remember me</span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-control mt-8">
                            <button type="submit" class="btn bg-[color:var(--primary)] text-white w-full">
                                Login
                            </button>
                        </div>
                    </form>

                    <div class="divider">OR</div>
                    <p class="text-center text-sm">
                        Don't have an account yet?
                        <a href="{{ route('register') }}" class="link link-primary">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>