<?php

namespace App\Http\Livewire\Designers;

use App\Models\TestCase;
use App\Models\TestCaseStep;
use Livewire\Component;
use Livewire\WithPagination;

class AddTestCaseSteps extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['updateTestCaseSteps'];

    public TestCase $test_case;

    //datatable related
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }


    //on create/update/delete update steps list
    public function updateTestCaseSteps()
    {
        $this->render();
    }

    public function mount(TestCase $test_case)
    {
        $this->test_case = $test_case;
    }

    public function edit($id)
    {
        // sends test case step id to form for edit
        $this->emit('requestEdit',$id);
    }
 
    public function delete(TestCaseStep $test_case_step)
    {
        $test_case_step->delete();
        // $this->emit('requestEdit',$id);
    }

    // public function setTestCase(TestCase $test_case)
    // {
    //     $this->test_case = $test_case;
    // }

    public function render()
    {
        $test_case_steps = TestCaseStep::when($this->test_case,function($query){
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
        return view('livewire.designers.add-test-case-steps',compact('test_case_steps'));
    }
}
