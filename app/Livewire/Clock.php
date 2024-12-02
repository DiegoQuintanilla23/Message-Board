<?php

namespace App\Livewire;

use Livewire\Component;

class Clock extends Component
{
    public $currentTime;

    public function mount()
    {
        $this->updateTime();
    }

    public function render()
    {
        return view('livewire.clock');
    }

    public function updateTime()
    {
        $this->currentTime = now()->format('d/m/y ( l ) H:i');
    }
}
