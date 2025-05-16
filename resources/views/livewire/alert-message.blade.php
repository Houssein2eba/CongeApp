<div>
    @if ($visible)
    <div
        x-data
        x-init="
            Livewire.on('start-alert-timer', () => {
                setTimeout(() => Livewire.call('hide'), 3000);
            })
        "
        class="p-4 rounded mb-4
            @if ($type === 'success') bg-success
            @elseif ($type === 'error') bg-danger
            @elseif ($type === 'warning') bg-warning text-black
            @else bg-blue-500 @endif"
    >
        {{ $message }}
    </div>
@endif

</div>
