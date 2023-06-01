<?php

namespace App\Http\Livewire\Designers;

use App\Models\TestCase;
use App\Models\TestCaseStep;
use Livewire\Component;

class AddTestCaseStepsForm extends Component
{
    protected $listeners = ['requestEdit' , 'createButton' , 'updateButton'];
    public TestCase $test_case;

    public $editMode = false;
    public $createMode = false;
    public $edit = false;




    public TestCaseStep $test_case_step;

    protected $rules = [
        'test_case_step.id' => 'nullable|integer',
        'test_case_step.test_case_id' => 'nullable|integer',
        'test_case_step.title' => 'nullable|max:255',
        'test_case_step.description' => 'nullable|max:255',
        'test_case_step.expected_result' => 'nullable|max:255',
        'test_case_step.actual_result' => 'nullable|max:255',
        'test_case_step.designer_comment' => 'nullable|max:255', 
    ];

    //gets test case step id and does the find function internally to get the test case step model
    public function requestEdit(TestCaseStep $test_Case_Step_From_Request)
    {
        $this->test_case_step = $test_Case_Step_From_Request;

        $this->editMode = true;
    }


   // public function createButton()
    //{
        //$this->createMode = true;
        //$this->edit = false;

    //}

    //public function updateButton()
    //{
       // $this->createMode = false;
        //$this->edit = true;

    //}


    public function update()
    {
        $this->validate();

        // $this->test_case_step->test_case_id = $this->test_case->id;

        $this->test_case_step->save();

        // $this->emit('setTestCase',$this->test_case->id);

        $this->emit('updateTestCaseSteps');

        $this->test_case_step = new TestCaseStep();

        $this->editMode = false;
    }

    public function store()
    {
        $this->validate();

        $this->test_case_step->test_case_id = $this->test_case->id;

        $this->test_case_step->save();

        // $this->emit('setTestCase',$this->test_case->id);

        $this->emit('updateTestCaseSteps');

        $this->test_case_step = new TestCaseStep();
    }

    public function edit(TestCaseStep $test_case_step)
    {
        $this->test_case_step = $test_case_step;
    }

    public function mount(TestCase $test_case)
    {
        $this->test_case = $test_case;
        $this->test_case_step = new TestCaseStep();
    }



    public function render()
    {
        return view('livewire.designers.add-test-case-steps-form');
    }
}
