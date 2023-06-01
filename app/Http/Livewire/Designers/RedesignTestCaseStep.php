<?php

namespace App\Http\Livewire\Designers;

use App\Models\TestCase;
use App\Models\TestCaseStep;
use Livewire\Component;

class RedesignTestCaseStep extends Component
{
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['requestEdit'];
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';
    public $statuses;
    public $editMode = false;

    public TestCaseStep $test_case_step;
    public $test_case_step_id;
    public TestCase $test_case;


    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    //de el function eli bteb3at el id 
    public function requestEdit(TestCase $test_case)
    {
        $this->test_case = $test_case;
        $this->editMode = true;
    }
    public function show($id)
    {
        $this->emit('requestShow', $id);
    }
    public function edit(TestCaseStep $test_case_step)
    {
        $this->test_case_step = $test_case_step;
        return redirect()->route('redesign.testcasestep', $this->test_case_step->id);
    }
    public function mount(TestCase $test_case)
    {
        $this->test_case = $test_case;
        $this->test_case_step =new TestCaseStep();
    }
    public function render()
    {
        $testcasesteps = TestCaseStep::when($this->test_case, function ($query) {
            $query->where('test_case_id', $this->test_case->id);
        })->when($this->search, function ($searchquery) {
            $searchquery->where(function ($queryx) {
                $queryx->where('test_case_steps.id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.test_case_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.description', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.expected_result', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.actual_result', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.status_id', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.designer_comment', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.reviewer_comment', 'like', '%' . $this->search . '%')
                    ->orWhere('test_case_steps.executor_comment', 'like', '%' . $this->search . '%');
            });
        })->orderBy($this->sortField, $this->sortDirection)->paginate($this->result_no);
        return view('livewire.designers.redesign-test-case-step', compact('testcasesteps'));
    }
}
