
<div @guest data-bs-toggle="modal" data-bs-target="#loginModal" @endauth class="text-center my-4">
    <div class="fs-4 text-gray-700">
        <span ><i class="far fa-thumbs-up cursor-pointer" wire:click="like"></i><span class="ms-1"></span></span>
        <span ><i class="far fa-thumbs-down cursor-pointer ms-3" wire:click="dislike"></i><span class="ms-1"></span></span>
    </div>
</div>
