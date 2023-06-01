<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class IndexProject extends Component
{

    use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    public $ids;
    public $title;
    public $description;
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm ='';
    public $search = '';
    public $result_no = 20;

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function resetInputFields(){
        $this->ids = '';
        $this->title = '';
        $this->description = '';

    }
    public function open()
    {
        $this->resetInputFields();
    }
    public function store()
    {
        $user = auth::user();
        $validateData = $this->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
        $validateData['user_id'] = $user->id;
        Project::create($validateData);
        $this->resetInputFields();
        session()->flash('message' , 'Account Type Added Successfully!');
    }

    public function edit($id){
        $project = Project::where('id',$id)->first();
        $this->ids = $project->id;
        $this->title = $project->title;
        $this->description = $project->description;  
    }

    public function update(){
        $data =$this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        if($this->ids){
            $project = Project::find($this->ids);
            $project->update($data);
            session()->flash('message' , 'Account Type Updated Successfully!');        
        }
    }
    public function delete(Project $project)
    {
        $project->delete();

    }

    public function render()
    {
        $projects = Project::when($this->search,function($searchquery){
            $searchquery->where(function($queryx){
                $queryx->where('projects.id', 'like', '%' . $this->search . '%')
                    ->orWhere('projects.title', 'like', '%' . $this->search . '%')
                    ->orWhere('projects.description', 'like', '%' . $this->search . '%');
            });
        })->orderBy($this->sortField, $this->sortDirection)->paginate($this->result_no);
        return view('livewire.projects.index' , compact('projects'));
    }
    
}
