<?php

namespace App\Http\Livewire\Statuses;

use App\Models\Status;
use Livewire\Component;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class StatusForm extends Component
{
    public Status $status;
    public $status_id;
    public $editMode = false;

    public $rules = [
        'status.title' => 'nullable|max:255',
        'status.description' => 'nullable|max:255',
    ];

    public function  store()
    {
        $this->validate();
        $this->status->save();
        return redirect()->route('status.index');

    }
    public function  update()
    {
        $this->validate();
        $this->status->save();
        
        $this->editMode = false;
        return redirect()->route('status.index');
    }
    public function mount()
    {
        $this->status = new Status();
    }

    public function render()
    {
        
        return view('livewire.statuses.status-form');
    }
}
