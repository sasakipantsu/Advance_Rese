<div>

    <div class="pt-2 text-2xl">
        @if($this->favorite==false)
            <button wire:click="favorite" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="gray" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
            </button>
        @else
            <button wire:click="favorite_delete" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="red" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
            </button>
        @endif
    </div>

</div>
