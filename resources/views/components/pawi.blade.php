@props(['pawi'])

<div class="p-6 rounded shadow bg-white relative">
    <button class="absolute top-2 right-5 hover:cursor-pointer">•••</button>
    <div class="flex relative">
        <div class="size-10 bg-amber-200 rounded-full"></div>
        <div class="ms-3">
            <span class="font-semibold">{{ $pawi['author'] }}</span>
            <div>
                <span class="text-sm">{{ $pawi['time'] }}</span>
                <span class="text-sm italic"> {{ $pawi['edited'] ? '  •  Edited' : '' }}</span>
            </div>
        </div>
    </div>
    <p class="message mt-3">
        {!! nl2br(e($pawi['message'])) !!}
    </p>
</div>