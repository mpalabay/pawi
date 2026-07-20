<x-layout>
    <x-slot:title>Verify Email</x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card max-w-lg bg-base-100">
                <div class="card-body text-center shadow-sm p-10">
                    <h1
                        class="text-2xl font-bold text-center text-[color:var(--text)] [text-shadow:0_0_8px_rgba(107,175,146,0.3)] mb-6">
                        Verify Your Email</h1>

                    <p class="text-base-content/70">
                        Thanks for signing up! Before you can access your account, please verify your email address by
                        clicking
                        the
                        verification link we sent to your inbox.
                    </p>

                    <p class="text-base-content/70">
                        If you didn't receive the email, you can request another verification email below.
                    </p>



                    <div x-data="{
                            countdown: 0,
                            showAlert: false,

                            init() {
                                const justSent = {{ session('status') === 'verification-link-sent' ? 'true' : 'false' }};
                                const end = localStorage.getItem('resendEnd');

                                // Start a new timer only if one doesn't already exist
                                if (justSent && !end) {
                                    const seconds = 60;
                                    localStorage.setItem('resendEnd', Date.now() + seconds * 1000);
                                }

                                const storedEnd = localStorage.getItem('resendEnd');

                                if (storedEnd) {
                                    const remaining = Math.ceil((storedEnd - Date.now()) / 1000);

                                    if (remaining > 0) {
                                        this.showAlert = true;
                                        this.start(remaining);
                                    } else {
                                        localStorage.removeItem('resendEnd');
                                        this.showAlert = false;
                                    }
                                }
                            },

                            send() {
                                const seconds = 60;
                                localStorage.setItem('resendEnd', Date.now() + seconds * 1000);
                                {{-- this.showAlert = true;
                                this.start(seconds); --}}
                            },

                            start(seconds) {
                                this.countdown = seconds;

                                const timer = setInterval(() => {
                                    this.countdown--;

                                    if (this.countdown <= 0) {
                                        clearInterval(timer);
                                        this.countdown = 0;
                                        localStorage.removeItem('resendEnd');
                                        this.showAlert = false;
                                    }
                                }, 1000);
                            }
                        }">

                        <div x-cloak x-show="showAlert" x-transition.opacity.duration.500ms
                            class="alert alert-success mt-4 text-white">
                            <span>
                                A new verification link has been sent to your email address.
                            </span>
                        </div>

                        <div class="flex flex-col sm:flex-row justify-center gap-3 pt-4">

                            <form method="POST" action="{{ route('verification.send') }}" @submit="send()">
                                @csrf

                                <button type="submit" class="btn" :disabled="countdown > 0"
                                    :class="countdown > 0 ? 'text-[color:var(--text)]' : 'text-white bg-[color:var(--secondary)]'">

                                    <span x-show="countdown === 0">Resend Verification Email</span>
                                    <span x-show="countdown > 0" x-text="`Resend in ${countdown}s`"></span>
                                </button>
                            </form>

                            <form method="POST">
                                @csrf

                                <button type="submit" class="btn btn-ghost text-red-500">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</x-layout>