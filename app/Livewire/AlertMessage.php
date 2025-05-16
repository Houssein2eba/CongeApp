<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class AlertMessage extends Component
{
    public $message;
    public $type = 'success';
    public $visible = false;

    #[On('alert')]
    public function show($message, $type = 'success')
    {
        dd($message);
        $this->message = $message;
        $this->type = $type;
        $this->visible = true;

        $this->dispatch('start-alert-timer');
    }

    public function hide()
    {
        $this->visible = false;
    }

    public function render()
    {
        return view('livewire.alert-message');
    }
}
