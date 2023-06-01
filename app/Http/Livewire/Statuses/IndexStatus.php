<?php

namespace App\Http\Livewire\Statuses;

use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class IndexStatus extends Component
{
    use WithPagination;

    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';

    public Status $status;
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
        'status.title' => 'nullable|max:255',
        'status.description' => 'nullable|max:255',
    ];
    public function edit(Status $status)
    {
        $this->status = $status;
        $this->editMode = true;
    }
    
    public function open()
    {
        $this->status = new Status();
        $this->editMode = false;

    }

    public function  store()
    {
        $this->validate();
        $this->status->save();
        $this->status = new Status();
    }
    public function  update()
    {
        $this->validate();
        $this->status->save();
        
        $this->status = new Status();
        $this->editMode = false;

    }
    public function delete(Status $status)
    {
        $status->delete();

    }
    public function mount()
    {
        $this->status = new Status();
    }
    public function render()
    {
        $statuses= Status::when($this->search,function($searchquery){
            $searchquery->where(function($queryx){
                $queryx->where('statuses.id', 'like', '%' . $this->search . '%')
                    ->orWhere('statuses.title', 'like', '%' . $this->search . '%')
                    ->orWhere('statuses.description', 'like', '%' . $this->search . '%');
            });
        })->orderBy($this->sortField, $this->sortDirection)->paginate($this->result_no);
        return view('livewire.statuses.index',compact('statuses'));
    }
}
