<?php

namespace App\Http\Livewire\Executors;

use App\Models\Status;
use App\Models\TestCase;
use App\Models\TestCaseStep;
use Livewire\Component;
use Livewire\WithPagination;

class IndexExecutor extends Component
{



   use WithPagination;
    public TestCaseStep $test_case_step_id;



    //datatable related
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';
    public $statuses;
    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }


    public function render()
    {
        $status = Status::where('id', 3)->first();
        $this->statuses = $status?$status->id:null;
        $testcases = TestCase::when($this->statuses, function ($query) {
            $query->where('status_id', $this->statuses);
        })->when($this->search, function ($searchquery) {
            $searchquery->where(function ($queryx) {
                $queryx->where('test_cases.id', 'like', '%' . $this->search . '%')
                ->orWhere('test_cases.title', 'like', '%' . $this->search . '%')
                ->orWhere('test_cases.project_id', 'like', '%' . $this->search . '%')   
                ->orWhere('test_cases.module_name', 'like', '%' . $this->search . '%')   
                ->orWhere('test_cases.description', 'like', '%' . $this->search . '%')   
                ->orWhere('test_cases.priority_id', 'like', '%' . $this->search . '%')
                ->orWhere('test_cases.designer_id', 'like', '%' . $this->search . '%')  
                ->orWhere('test_cases.reviewer_id', 'like', '%' . $this->search . '%')
                ->orWhere('test_cases.reviewed_at', 'like', '%' . $this->search . '%')  
                ->orWhere('test_cases.created_at', 'like', '%' . $this->search . '%')  
                ->orWhere('test_cases.pre_condition', 'like', '%' . $this->search . '%'); 
            });
        })->orderBy($this->sortField, $this->sortDirection)->paginate($this->result_no);
        return view('livewire.executors.index-executor',compact('testcases'));
    }
}
