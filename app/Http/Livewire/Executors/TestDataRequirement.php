<?php

namespace App\Http\Livewire\Executors;

use App\Models\TestCaseDataRequirement;
use App\Models\TestCaseStep;
use Livewire\Component;
use Livewire\WithPagination;

class TestDataRequirement extends Component
{
    public $editMode = false;

    use WithPagination;
    protected $listeners = ['requestData'];

    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';
    public TestCaseStep $test_case_step;
    public TestCaseDataRequirement $test_data;
    public  $test_case_step_id;



    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function requestData(TestCaseStep $test_case_step){
        $this->test_case_step = $test_case_step;
        // $this->editMode = true;
       
    }
public function mount()
{
    $this->test_case_step = new TestCaseStep();
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
        return view('livewire.executors.test-data-requirement',compact('testdata'));
    }
}
