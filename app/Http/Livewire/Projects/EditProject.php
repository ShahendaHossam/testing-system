<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class EditProject extends Component
{
    public function render()
    {
        return view('livewire.projects.edit-project');
    }
}
