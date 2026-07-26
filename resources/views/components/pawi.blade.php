@props(['pawi'])

<div class="p-6 rounded bg-white relative">
    <div class="dropdown dropdown-bottom dropdown-end lg:dropdown-start absolute top-2 right-5">
        <button tabindex="0" role="button" class="cursor-pointer">•••</button>
        <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-tr-none lg:rounded-tr-box lg:rounded-tl-none rounded-box z-50 w-52 p-2 shadow-sm">
             @can('update', $pawi)
             <li><a @click='editPost({{ $pawi->id }})'>Edit thought</a></li>
             <li><a @click='moveToArchive({{ $pawi->id }})'>Move to archive</a></li>
             <li><a @click='moveToTrash({{ $pawi->id }})'>Move to trash</a></li>
             @endcan
            <li><a>Report</a></li>
        </ul>
    </div>
    <div class="flex relative">
        @if ($pawi->is_anonymous)
            <div class="avatar placeholder">
                <div class="size-10 rounded-full">
                    <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth" alt="Anonymous User"
                        class="rounded-full" />
                </div>
            </div>
        @else
                <div class="avatar">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($pawi->user->email) }}"
                            alt="{{ $pawi->user->name }}'s avatar" class="rounded-full" />
                    </div>
                </div>
            
        @endif
        <div class="ms-3">
            <span class="font-semibold">
                {{ $pawi->is_anonymous
                        ? $pawi->user->id === auth()->id() ? 'Under the Shell (You)' : 'Under the Shell'
                        : $pawi->user->name }}
            </span>
            <div>
                <span class="text-sm">{{ $pawi->created_at->diffForHumans() }}</span>
                @if ($pawi->updated_at->gt($pawi->created_at))
                    <span class="text-base-content/60 ms-0.5">·</span>
                    <span class="text-sm text-base-content/60 italic">edited</span>
                @endif
            </div>
        </div>
    </div>
    <p class="message mt-3">
        {!! nl2br(e($pawi->content)) !!}
    </p>
</div>