<?php

namespace App\Http\Livewire\Reviewers;

use App\Models\Status;
use App\Models\TestCase;
use App\Models\TestCaseDataRequirement;
use App\Models\TestCaseStep;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTestCaseData extends Component
{
    use WithPagination;
    public $editMode = false;

 

    public $reviewer = 1;
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';
    public $search_test_data = '';
    public $result_no_test_data = 20;
    public $reviewer_comment;
    public $status_id;
    public $test_case_step_id;
    public $test_case_id;
    public $statuses;
    public $statuscase;
    public $reviewed_at;
    public TestCase $test_case;
    public TestCaseStep $test_case_step;
    public TestCaseDataRequirement $test_data;


    protected $rules = [
        'test_case_step.id' => 'nullable|integer',
        'test_case_step.reviewer_comment' => 'nullable|string',
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

    public function filter(TestCaseStep $test_case_step)
    {
        $this->test_case_step = $test_case_step;

    }

    public function filterTestData(TestCaseStep $test_case_step)
    {
        $this->test_case_step = $test_case_step;


    }
    public function showtestdata($id)
    {
        $this->emit('requestShow', $id);
    }
    // public function showtestdata($id)
    // {
    //     $this->editMode = true;

    //     $testdata = TestCaseDataRequirement::where('test_case_step_id', $id)->first();
    //     $this->test_case_step_id = $testdata->id;

    //     // return redirect()->route('test_data.show', $this->test_case_step->id);
    // }
    public function addcomment()
    {
            $this->validate();
            $this->test_case_step->save();  
    }

    public function show($id)
    {
        $testcase = TestCase::findOrfail($id);
        return redirect()->route('test_case.review', compact('testcase'));
    }

    public function statusTestCase()
    {
        $validateData = $this->validate([
            'status_id' => 'required|string',
        ]);

        if ($this->test_case_id) {

            $statusreviwer = TestCase::find($this->test_case_id);
            $user = Auth::user();
            $this->test_case->reviewer_id = $user->id;
            $this->reviewed_at = time();
            $this->test_case->reviewed_at = date('Y-m-d h:i:s',  $this->reviewed_at);
            $this->test_case->update($validateData);
        }
        return redirect()->route('general.testcase');
    }

    public function mount()
    {
        $this->test_case_step = new TestCaseStep();
    }

    public function render()
    {
        $testdata = TestCaseDataRequirement::all();
        $this->test_case_step_id = $this->test_case_step->id;
        $this->test_case_id = $this->test_case->id;
        // $this->test_case_step_id = $this->test_case_step->id;
        $this->statuscase = Status::where('title', 'Pending Redesign')->orWhere('title', 'Pending Execution')->get();
        $testcase = TestCase::all();
        $status = Status::where('id', 2)->first();
        $this->statuses = $status ? $status->id : null;
        $testcasesteps = TestCaseStep::when($this->test_case,function($query){
            $query->where('test_case_id',$this->test_case->id);
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
        return view('livewire.reviewers.show-test-case-data', compact('testcasesteps', 'testcase' , 'testdata'));
    }
}
