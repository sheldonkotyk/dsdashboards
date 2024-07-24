<?php

namespace App\Livewire;

use Livewire\Component;

class ActiveMentors extends Component
{
    /** @var string */
    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }

    public function render()
    {
        return view('livewire.active-mentors');
    }
}
