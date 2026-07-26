<div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
    class="toast toast-end z-10">
    <div role="alert" class="alert bg-[#c8ffe7] shadow-none  flex flex-row gap-2">
        @if (session('icon') === 'share') <span class="text-xl">💭</span> @endif
        @if (session('icon') === 'letgo') <span class="text-xl text-white">🍃</span> @endif
        @if (session('icon') === 'archive') <span class="text-xl text-white">📦</span> @endif
        @if (session('icon') === 'trash') <span class="text-xl text-white">🗑️</span> @endif
        <span>{!! nl2br(e(session('success'))) !!}</span>
    </div>
</div>