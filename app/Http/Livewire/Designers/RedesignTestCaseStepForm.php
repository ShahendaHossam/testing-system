<?php

namespace App\Http\Livewire\Designers;

use App\Models\Status;
use App\Models\TestCase;
use App\Models\TestCaseStep;
use Livewire\Component;

class RedesignTestCaseStepForm extends Component
{
    public TestCaseStep $test_case_step;
    // public TestCase $test_case;

    public $test_case_step_id;
    protected $rules = [
        'test_case_step.id' => 'nullable|integer',
        'test_case_step.test_case_id' => 'nullable|integer',
        'test_case_step.title' => 'nullable|max:255',
        'test_case_step.description' => 'nullable|max:255',
        'test_case_step.expected_result' => 'nullable|max:255',
        'test_case_step.actual_result' => 'nullable|max:255',
        'test_case_step.designer_comment' => 'nullable|max:255',
        'test_case_step.status_id' => 'nullable|integer',
        'test_case_step.executor_comment' => 'nullable|max:255',
        'test_case_step.reviewer_comment' => 'nullable|string',

    ];
    public function update()
    {
        $this->validate();
        // $status = Status::where('title', 'Pending Reviewal')->first();
        // $this->test_case->status_id = $status?$status->id:null;
        $this->test_case_step->save();
        $tstcase = $this->test_case_step->test_case_id;
        if($tstcase){
            return redirect()->route('designer.redesign', $tstcase);
        }else {
            return redirect()->back();
        }

    }

    public function render()
    {
        return view('livewire.designers.redesign-test-case-step-form');
    }
}
