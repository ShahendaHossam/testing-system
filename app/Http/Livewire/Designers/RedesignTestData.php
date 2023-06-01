<?php

namespace App\Http\Livewire\Designers;

use App\Models\TestCase;
use App\Models\TestCaseDataRequirement;
use App\Models\TestCaseStep;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RedesignTestData extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';
    public $editMode = false;

    public TestCaseStep $test_case_step;
    public TestCaseDataRequirement $test_case_data_requirement;
    public TestCase $test_case;
    public $test_case_id;
    public $test_data_id;
    protected $listeners = ['requestShow'];

    protected $rules = [
        'test_case.id' => 'nullable|integer',
        'test_case.status_id' => 'nullable|integer',
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

    public function requestShow(TestCaseStep $test_case_step)
    {
        $this->test_case_step = $test_case_step;
        $this->editMode = true;
    }
    public function edit(TestCaseDataRequirement $test_case_data_requirement)
    {
        $this->test_case_data_requirement = $test_case_data_requirement;
        $this->test_case_id = $this->test_case->id;

        // $this->test_data_id = $this->test_case_data_requirement->id;
        return redirect()->route('redesign.testdata', $test_case_data_requirement->id);
    }
    // public function doneRedesigne()
    // {
    //     $this->validate();
    //     $user = Auth::user();
    //     $status = Status::where('title', 'Pending Reviewal')->first();
    //     $this->test_case->status_id = $status?$status->id:null;
    //     $this->test_case->designer_id = $user->id;
    //     $this->test_case->save();
    //     return redirect()->route('designer.live')->with('success','Test Case Successfully');
    // }
    public function mount()
    {
        $this->test_case= new TestCase();

    }
    public function render()
    {
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
        return view('livewire.designers.redesign-test-data', compact('testdata'));
    }
}
