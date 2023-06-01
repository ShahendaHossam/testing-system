<?php

namespace App\Http\Livewire\Executors;

use App\Models\Status;
use App\Models\TestCase;
use App\Models\TestCaseStep;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateExecutor extends Component
{
    protected $listeners = ['requestEdit'];
    public $isOpen = false;
    public $test_cases;
    public $statuses;
    public $editMode = false;
    public $test_case_id;
    public TestCaseStep $test_case_step;
    public TestCase $test_case;


    protected $rules = [
        'test_case_step.test_case_id' => 'nullable|integer',
        'test_case_step.actual_result' => 'nullable|max:255',
        'test_case_step.status_id' => 'nullable|integer',
        'test_case_step.executor_comment' => 'nullable|max:255',
    ];
    public function requestEdit(TestCaseStep $test_case_step)
    {
        $this->test_case_step = $test_case_step;
        $this->editMode = true;
        $this->isOpen = true;

    }
    
    public function update()
    {
        $this->validate();
        $this->test_case_step->save();
        return redirect()->route('show.executor', $this->test_case_id)->with('success','Test Case Created Successfully');
    }

    public function mount()
    {
        $this->test_cases = TestCase::all();
        $this->statuses = Status::where('title','Fail' )->orWhere('title','Pass')->get();
     
        $this->test_case = new TestCase();
        $this->test_case_step = new TestCaseStep();    

    }

    public function render()
    {
        $this->test_case_id = $this->test_case_step->test_case_id;
       
        return view('livewire.executors.create-executor');
    }
}
