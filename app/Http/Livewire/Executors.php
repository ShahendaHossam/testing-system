<?php

namespace App\Http\Livewire;

use App\Models\TestCaseStep;
use App\Models\TestCase;
use App\Models\TestCaseDataRequirement;
use Livewire\Component;

class Executors extends Component
{  
    public $show = false;
    public $create = false;
    public $index = true;
    public $showTestdata = false;
    public $edit = false;

    public $executor = 3;
    public $post_condition;
    public $executor_comment;
    public $actual_result;
    public $step_id;
    public $test_data_id;
    public $test_case_id;
    public $status_id;

    public function resetInputFields()
    {
        $this->executor_comment = '';
        $this->actual_result = '';
        $this->status_id = '';

    }
    public function newDataExecutor($id)
    {
        $executorData = TestCaseStep::where('id',$id)->first();
        $this->step_id = $executorData->id;
        $this->create = true;
        $this->index = false;
        $this->show = false;
    }

    public function editDataExecutor($id)
    {
        $executorData = TestCaseStep::where('id',$id)->first();
        $this->step_id = $executorData->id;
        $this->executor_comment = $executorData->executor_comment;
        $this->actual_result = $executorData->actual_result;
        $this->status_id = $executorData->status_id;
        $this->edit = true;
        $this->index = false;
        $this->show = false; 
    }
   
    public function addDataExecutor()
    {
        $validateData = $this->validate([
            'executor_comment' => 'required|string',
            'actual_result' => 'required|string',
            'status_id' => 'required|integer',

        ]);
        if ($this->step_id) {
            $executorData = TestCaseStep::find($this->step_id);
            $executorData->update($validateData);
            $this->show = true;
            $this->index = false;
        }
        $this->resetInputFields();
       
    }

    public function showtestdata($id)
    {
        $testData = TestCaseStep::where('id',$id)->first();
        $this->test_data_id = $testData->id;
        $this->showTestdata = true;
        $this->index = false;
        $this->show = false;
        $this->create = false;

    }
   
    public function TestCaseDesc()
    {
        $validateData = $this->validate([
            'post_condition' => 'required|string',
            'status_id' => 'required|integer',
        ]);
        if ($this->test_case_id) {
            $testcaseData = TestCase::find($this->test_case_id);
            $testcaseData->update($validateData);
        }
        $this->resetInputFields(); 
        $this->index = true;
        $this->show = false;
    }

    public function view($id)
    {
        if ($this->show = true) {
            $testcase = TestCase::where('id', $id)->first();
            $this->test_case_id = $testcase->id;
        }

    }

    public function render(){
       
        return view('livewire.executors.executor');
    }
}
