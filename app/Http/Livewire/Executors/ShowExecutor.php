<?php

namespace App\Http\Livewire\Executors;

use App\Models\Status;
use App\Models\TestCase;
use App\Models\TestCaseDataRequirement;
use App\Models\TestCaseStep;
use Livewire\Component;
use Livewire\WithPagination;

class ShowExecutor extends Component
{
    use WithPagination;

    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';
    public $statuscase;

    public $test_case_id;

    public TestCase $test_case;
    public TestCaseStep $test_case_step;
    public TestCaseDataRequirement $test_case_data_requirement;
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
    public function showtestdata(TestCaseDataRequirement $test_case_data_requirement)
    {

        $this->test_case_data_requirement = $test_case_data_requirement;
        $testdata = TestCaseDataRequirement::all();
        return view('livewire.executors.show-test-data', compact('testdatadetails'));
    }
    public function show(TestCase $test_case)
    {
        $this->test_case = $test_case;
    }
    public function edit($id)
    {
        // sends test case step id to form for edit
        $this->emit('requestEdit', $id);
    }

    // public function open($id)
    // {
    //     $this->emit('requestData', $id);
    // }
    public function testData($id)
    {
        $this->emit('requestData',$id);

        // foreach($this->test_case_step as $data){
        //     $data->test_data->old_value;
        // }
    //   if($test_case_step->id)  {
    //     $this->editMode = true;

    //   }

    }
    public function mount()
    {
        $this->statuscase = Status::all();
        $this->test_case_step = new TestCaseStep();
    }



    public function render()
    {

        $this->test_case_id = $this->test_case->id;
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
        return view('livewire.executors.show-executor', compact('testcasesteps'));
    }
}
