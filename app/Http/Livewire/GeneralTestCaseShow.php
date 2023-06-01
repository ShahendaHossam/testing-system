<?php

namespace App\Http\Livewire;

use App\Models\TestCaseStep;
use App\Models\TestCase;
use App\Models\TestCaseDataRequirement;
use Livewire\Component;

class GeneralTestCaseShow extends Component
{
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';
    public $ids;

    public TestCase $test_case;
    public TestCaseDataRequirement $test_data;
    public TestCaseStep $test_case_step;



    public function sortBy($field)
    {
        if($this->sortDirection == 'asc')
        {
            $this->sortDirection = 'desc';
        }
        else
        {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function show($id)
    {
        $this->emit('requestShow', $id);
    }

    public function mount(TestCase $test_case)
    {
        $this->test_case = $test_case;
        $this->test_case_step =new TestCaseStep();
    }

    public function render()
    {
        // $testdata = $this->test_case;
        $test_case_data_requirements = TestCaseDataRequirement::all();
        $testcasesteps = TestCaseStep::when($this->test_case,function($query){
            $query->where('test_case_id',$this->test_case->id);
        })->when($this->search, function ($searchquery) {
            $searchquery->where(function ($queryx) {
                $queryx->where('test_case_steps.id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.test_case_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.title', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.description', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.expected_result', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.actual_result', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.status_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.designer_comment', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.reviewer_comment', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.executor_comment', 'like', '%' . $this->search . '%');
            });
        })->orderBy($this->sortField, $this->sortDirection)->paginate($this->result_no);
        return view('livewire.general-test-case-show' , compact('testcasesteps' , 'test_case_data_requirements'));
    }
}
