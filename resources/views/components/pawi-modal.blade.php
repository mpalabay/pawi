<dialog id="post_modal" class="modal">
    <div class="modal-box p-0">
        {{-- Modal Header --}}
        <div class="w-full px-3 py-2 text-center border-b border-gray-200">
            {{-- <h1 class="text-2xl">Create Post</h1> --}}
            <h1 class="text-xl" x-text="isEditing ? 'Edit Thought' : 'Share a Thought'"></h1>
        </div>

        <form method="POST" :action="isEditing ? `/pawis/${form.id}` : '/pawis'">
            @csrf
            <template x-if="isEditing">
                <input type="hidden" name="_method" value="PUT">
            </template>
            {{-- Modal body --}}
            <div class="p-3">
                <label class="flex justify-between items-center cursor-pointer rounded bg-gray-100 p-2 mb-2">
                    <span class="mr-3 text-sm select-none">Post anonymously</span>
                    <input type="hidden" name="is_anonymous" value="0">
                    <input type="checkbox" name="is_anonymous" value="1" x-model="form.is_anonymous"
                        class="toggle toggle-md bg-gray-300 text-white checked:bg-blue-600" />
                </label>
                <div class="flex mb-2">
                    <div class="size-12 bg-amber-200 rounded-full"></div>
                    <div class="ms-2">
                        <span class="block">{{ auth()->user()->name }}</span>
                        <select name="visibility" class="select select-xs text-xs font-medium
                                     bg-gray-100 
                                     rounded-md px-2
                                     border-none outline-none shadow-none
                                     focus:outline-none focus:ring-0
                                     cursor-pointer w-25"
                                     x-model="form.visibility">
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
                    <textarea name="content" id="textarea" x-init="resize($el); $watch('form.content', () => resize($el))" @input="resize($el)" x-model="form.content"
                        class="min-h-[40px] resize-none outline-none border-none overflow-y-auto max-h-80 w-full block"
                        placeholder="What would you like to release today?"></textarea>
                </div>
            </div>
            {{-- Modal footer --}}
            <div :class="isEditing ? 'justify-end' : 'justify-between'" class="flex items-start gap-3 px-3 py-2 border-t border-gray-200">
                
                <template x-if="!isEditing">
                    <span class="text-xs inline-block">
                        ⓘ Let go posts will gently disappear after 5 minutes.
                    </span>
                    </template>
                <div class="flex">
                    <template x-if="!isEditing">
                        <button  type="submit" name="is_letgo" value="1"
                            class="btn-sm px-3 py-2 rounded-s-md text-gray-900 shadow bg-[color:var(--letgo)] text-white hover:bg-[color:var(--letgo)]/90 cursor-pointer text-nowrap">
                            Let go
    
                        </button>
                    </template>
    
                    <button type="submit" name="is_letgo" value="0"
                    :class="isEditing ? 'rounded-md' : 'rounded-e-md'"
                        class="px-3 py-2 bg-[color:var(--primary)] text-white hover:bg-[color:var(--primary)]/90 cursor-pointer"
                        x-text="isEditing ? 'Save changes' : 'Share'">
                    </button>
                </div>
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