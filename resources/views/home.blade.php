<x-layout>

    <div
        class="relative w-full px-3 py-3 lg:rounded bg-[color:var(--primary)] font-bold text-white shadow-[color:var(--primary)]/50 shadow flex items-center justify-between">
        <button class="outline-none  cursor-pointer text-start w-100 px-3 py-2 rounded-full bg-[#77c0a0]"
            onclick="create_post_modal.showModal()">What would you like to release today?</button>
        <span class="absolute bottom-0 right-0 text-6xl animate-slide-x select-none">🐢</span>
    </div>

    <x-pawi-modal/>

    <hr class="mt-5 opacity-10">

    <div class="flex flex-col gap-3 mt-5">
        @foreach ($pawis as $pawi)
            <x-pawi :pawi="$pawi"></x-pawi>
        @endforeach
    </div>

</x-layout>