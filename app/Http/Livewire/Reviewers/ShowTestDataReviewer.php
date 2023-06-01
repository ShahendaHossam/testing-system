<?php

namespace App\Http\Livewire\Reviewers;

use App\Models\TestCaseDataRequirement;
use App\Models\TestCaseStep;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTestDataReviewer extends Component
{

    protected $listeners = ['requestShow'];
    
    use WithPagination;

    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $test_case_step_id;

    public TestCaseStep $test_case_step;
    public TestCaseDataRequirement $test_data;
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
    public function requestShow(TestCaseDataRequirement $test_data)
    {
        $this->test_data = $test_data;
        $this->editMode = true;

    }
    public function render()
    {
        $this->test_case_step_id = $this->test_case_step->id;
        $testdata = TestCaseDataRequirement::when($this->test_case_step, function ($query) {
            $query->where('test_case_step_id', $this->test_case_step->id);
        })->when($this->search, function ($searchquery) {
            $searchquery->where(function ($queryx) {
                $queryx->where('test_case_data_requirements.id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_data_requirements.test_case_step_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_data_requirements.field_name', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_data_requirements.old_value', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_data_requirements.new_value', 'like', '%' . $this->search . '%');
            });
        })->orderBy($this->sortField, $this->sortDirection)->paginate($this->result_no);
        return view('livewire.reviewers.show-test-data-reviewer', compact('testdata'));
    }
}
