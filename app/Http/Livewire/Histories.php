<?php

namespace App\Http\Livewire;

use App\Models\Status;
use App\Models\TestCase;
use App\Models\TestCaseDataRequirement;
use Livewire\Component;

class Histories extends Component
{
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';
    public $ids;

  

    protected $rules = [
        'test_case.title' => 'nullable|max:255',
        'test_case.module_name' => 'nullable|max:255',
        'test_case.project_id' => 'nullable|integer',
        'test_case.description' => 'nullable|max:255',
        'test_case.dependency_id' => 'nullable|integer',
        'test_case.priority_id' => 'nullable|integer',
        'test_case.status_id' => 'nullable|integer',
        'test_case.test_browser' => 'nullable|max:255',
        'test_case.pre_condition' => 'nullable|max:255',
        'test_case.post_condition' => 'nullable|max:255',
        'test_case.designer_id' => 'nullable|integer',
        'test_case.designer_comment' => 'nullable|max:255',
        'test_case.reviewer_id' => 'nullable|integer',
        'test_case.reviewer_comment' => 'nullable|max:255',
        'test_case.reviewed_at' => 'nullable|max:255',
        'test_case.executor_id' => 'nullable|integer',
        'test_case.executor_comment' => 'nullable|max:255',
        'test_case.executed_at' => 'nullable|max:255',
    ];

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }
    public function edit($id)
    {
        $testcases = TestCase::where('id',$id)->first();
        $this->ids = $testcases->id;
    }

    // public function update()
    // {

    //     $data = $this->validate();

    //     $this->testcases->update($data);

      
    // }

    public function render()
    {
        $testcases = TestCase::when($this->search, function ($searchquery) {
            $searchquery->where(function ($queryx) {
                $queryx->where('test_cases.id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.title', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.module_name', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.project_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.description', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.dependency_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.priority_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.status_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.test_browser', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.pre_condition', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.post_condition', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.designer_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.designer_comment', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.reviewer_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.reviewer_comment', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.reviewed_at', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.executor_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.executor_comment', 'like', '%' . $this->search . '%')
                    ->orWhere('test_cases.executed_at', 'like', '%' . $this->search . '%');
            });
        })->orderBy($this->sortField, $this->sortDirection)->paginate($this->result_no);
        return view('livewire.histories.index', compact('testcases'));
    }
}
