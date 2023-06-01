<?php

namespace App\Http\Livewire\Priorites;

use App\Models\Priority;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPriority extends Component
{
    use WithPagination;


    // protected $paginationTheme = 'bootstrap';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';

    public Priority $priority;
    public $editMode = false;

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }
    public $rules = [
        'priority.title' => 'nullable|max:255',
        'priority.description' => 'nullable|max:255',
    ];
    public function edit(Priority $priority)
    {
        $this->priority = $priority;
        $this->editMode = true;
    }
    
    public function open()
    {
        $this->priority = new Priority();
        $this->editMode = false;

    }


    public function  store()
    {
        $this->validate();
        $this->priority->save();
        $this->priority = new Priority();
    }
    public function  update()
    {
        $this->validate();
        $this->priority->save();
        
        $this->priority = new Priority();
        $this->editMode = false;

    }
    public function delete(Priority $priority)
    {
        $priority->delete();

    }
    public function mount()
    {
        $this->priority = new Priority();
    }

    public function render()
    {
        $priorities = Priority::when($this->search,function($searchquery){
            $searchquery->where(function($queryx){
                $queryx->where('priorities.id', 'like', '%' . $this->search . '%')
                    ->orWhere('priorities.title', 'like', '%' . $this->search . '%')
                    ->orWhere('priorities.description', 'like', '%' . $this->search . '%');
            });
        })->orderBy($this->sortField, $this->sortDirection)->paginate($this->result_no);
        return view('livewire.priorities.index',compact('priorities'));
    }
}
