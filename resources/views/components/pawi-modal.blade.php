<dialog id="create_post_modal" class="modal">
    <div class="modal-box p-0">
        {{-- Modal Header --}}
        <div class="w-full px-3 py-2 text-center border-b border-gray-200">
            <h1 class="text-2xl">Create Post</h1>
        </div>
        <form action="/pawis" method="POST">
            @csrf
            {{-- Modal body --}}
            <div class="p-3">
                <label class="flex justify-between items-center cursor-pointer rounded bg-gray-100 p-2 mb-2">
                    <span class="mr-3 text-sm select-none">Post anonymously</span>
                    <input type="hidden" name="is_anonymous" value="0">
                    <input type="checkbox" name="is_anonymous" value="1"
                        class="toggle toggle-md bg-gray-300 text-white checked:bg-blue-600" />
                </label>
                <div class="flex mb-2">
                    <div class="size-12 bg-amber-200 rounded-full"></div>
                    <div class="ms-2">
                        <span class="block">Marvin Russell Palabay</span>
                        <select name="visibility" class="select select-xs text-xs font-medium
                                     bg-gray-100 
                                     rounded-md px-2
                                     border-none outline-none shadow-none
                                     focus:outline-none focus:ring-0
                                     cursor-pointer w-25">
                            <option value="public">🌍 Public</option>
                            <option value="private">🔒 Private</option>
                        </select>

                    </div>
                </div>
                <div x-data="{
                            resize(el) {
                                el.style.height = 'auto';
                                el.style.height = el.scrollHeight + 'px';
                            }
                        }">
                    <textarea name="content" id="textarea" x-init="resize($el)" @input="resize($el)"
                        class="min-h-[40px] resize-none outline-none border-none overflow-y-auto max-h-80 w-full block"
                        placeholder="What would you like to release today?"></textarea>
                </div>
            </div>
            {{-- Modal footer --}}
            <div class="flex justify-end px-3 py-2 border-t border-gray-200">
                <button type="submit" name="is_letgo" value="1"
                    class="px-3 py-2 rounded-s-md text-gray-900 shadow bg-[color:var(--letgo)] text-white hover:bg-[color:var(--letgo)]/90 cursor-pointer">
                    <div class="group relative inline-block">
                        <span class="cursor-help">
                            ⓘ
                        </span>

                        <div
                            class="absolute bottom-full left-1/2 mb-2 hidden -translate-x-1/2 rounded bg-black px-2 py-1 text-xs text-white group-hover:block whitespace-nowrap">
                            This will gently disappear after 5 minutes.
                        </div>
                    </div>
                    Let go

                </button>

                <button type="submit" name="is_letgo" value="0"
                    class="px-3 py-2 rounded-e-md bg-[color:var(--primary)] text-white hover:bg-[color:var(--primary)]/90 cursor-pointer">
                    Share
                </button>
            </div>
        </form>


        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">╳</button>
        </form>
    </div>

    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>