<header class="not-has-[nav]:hidden w-full py-4 px-2 bg-white shadow-2xs sticky top-0 z-1">
    <nav class="flex justify-between">
        <div>
            <a href="{{ url('/home') }}" class="flex flex-row gap-1 px-2">
                <img src="{{ asset('favicon.svg') }}" class="w-8 h-8" alt="Logo">
                <span class="font-bold text-2xl translate-y-2 text-[color:var(--text)]">Pawi</span>
            </a>
        </div>
        <div class="flex justify-center items-center gap-3">
            @auth
                <span class="text-sm">{{ auth()->user()->name }}</span>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit"
                        class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] hover:bg-[#1b1b18] hover:text-white border text-[#1b1b18] rounded-sm text-sm leading-normal cursor-pointer">
                        Signout
                    </button>
                </form>
            @else
                <a href="/login"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                    Sign in
                </a>

                <a href="/register"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                    Sign up
                </a>
            @endauth
        </div>
    </nav>
</header>