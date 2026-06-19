<x-layout>

    <div class="flex flex-col gap-3">
        @foreach ($pawis as $pawi)
            <x-pawi :pawi="$pawi"></x-pawi>
        @endforeach
    </div>

</x-layout>