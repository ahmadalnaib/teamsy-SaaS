<div>
    <input wire:model="name" type="text">
    <button wire:click="submit">send</button>
    @if($success)<div>saved</div>@endif
</div>
