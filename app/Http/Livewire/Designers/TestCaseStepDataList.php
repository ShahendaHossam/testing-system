<?php

namespace App\Http\Livewire\Designers;

use App\Models\TestCaseDataRequirement;
use App\Models\TestCaseStep;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Status;
use App\Models\TestCase;
use Illuminate\Support\Facades\Auth;

class TestCaseStepDataList extends Component
{
    use WithPagination;


    protected $listeners = ['updateRequirementsList'];
    
    public TestCaseStep $test_case_step;
    public TestCase $test_case;
    //datatable related
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';
    public $test_case_id;

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
    // public function doneRedesigne(TestCase $test_case)
    // {
    //     $this->test_case = $test_case;
    //     $this->validate();
    //     $user = Auth::user();
    //         $status = Status::where('title', 'Pending Reviewal')->first();
    //         $this->test_case->status_id = $status?$status->id:null;
    //         $this->test_case->designer_id = $user->id;
    //         $this->test_case->save(); 
    //     return redirect()->route('general.testcase')->with('success','Test Case Successfully');
    // }

    public function mount()
    {
        $this->test_case= new TestCase();

    }


    public function updateRequirementsList()
    {
        $this->render();
    }

    public function render()
    {
        $this->test_case_id = $this->test_case_step->test_case_id;
        $test_case_data_requirements = TestCaseDataRequirement::when($this->test_case_step, function ($query) {
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

        return view('livewire.designers.test-case-step-data-list',compact('test_case_data_requirements'));
    }
}
