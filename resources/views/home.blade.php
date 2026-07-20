<x-layout>
    <div x-data="postManager({ pawis: {{ Js::from($pawis) }} })">
        <div class="relative w-full px-3 py-3 lg:rounded bg-[color:var(--primary)] font-bold text-white shadow-[color:var(--primary)]/50 shadow flex items-center justify-between">
            <button class="outline-none  cursor-pointer text-start w-100 px-3 py-2 rounded-full bg-[#77c0a0]"
                @click="createPost">What would you like to release today?</button>
            <span class="absolute bottom-0 right-0 text-6xl animate-slide-x select-none">🐢</span>
        </div>

        <x-pawi-modal />

        <hr class="mt-5 opacity-10">

        <div class="flex flex-col gap-3 mt-5">

            @forelse ($pawis as $pawi)
                <x-pawi :pawi="$pawi"></x-pawi>
            @empty
                <div class="hero py-12">
                    <div class="hero-content text-center">
                        <div>
                            <svg class="mx-auto h-12 w-12 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            <p class="mt-4 text-base-content/60">No thoughts have been shared yet.
                                Be the first to share a thought.
                            </p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>


        <dialog id="move_to_trash" class="modal">
            <div class="modal-box p-0">
                {{-- Modal Header --}}
                <div class="w-full px-3 py-2 text-center border-b border-gray-200">
                    {{-- <h1 class="text-2xl">Create Post</h1> --}}
                    <h1 class="text-xl">Move to trash</h1>
                </div>
                <form method="POST" :action="`/pawis/${form.id}`">
                    @csrf
                    @method('DELETE')

                    {{-- Modal body --}}
                    <div class="p-3">
                        This thought will no longer appear in your feed, but you can restore it anytime from Trash.
                    </div>
                    {{-- Modal footer --}}
                    <div class="flex justify-end px-3 py-2 border-t border-gray-200">
                        <button type="button"
                            class="px-3 py-2 rounded-s-md text-gray-900 shadow bg-neutral text-white hover:bg-neutral/90 cursor-pointer"
                            onclick="move_to_trash.close()">

                            Cancel

                        </button>

                        <button type="submit"
                            class="px-3 py-2 bg-error text-white hover:bg-error/90 cursor-pointer rounded-e-md">
                            Move
                        </button>
                    </div>
                </form>


                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-1.5">╳</button>
                </form>
            </div>

            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    </div>
</x-layout>