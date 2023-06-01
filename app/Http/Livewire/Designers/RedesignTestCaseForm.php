<?php

namespace App\Http\Livewire\Designers;

use App\Models\Priority;
use App\Models\Project;
use App\Models\TestCase;
use App\Models\TestCaseStep;
use Livewire\Component;

class RedesignTestCaseForm extends Component
{ 
    public TestCase $test_case;
    public $edit = false;
    public $createMode = false;

    protected $rules = [
        'test_case.title' => 'nullable|max:255',
        'test_case.module_name' => 'nullable|max:255',
        'test_case.project_id' => 'nullable|integer',
        'test_case.description' => 'nullable|max:255',
        'test_case.priority_id' => 'nullable|integer',
        'test_case.pre_condition' => 'nullable|max:255',
        'test_case.post_condition' => 'nullable|max:255',
    ];

    public function update(){
        $this->validate();
        
        $this->test_case->save();
        $this->emit('updateButton');
        return redirect()->route('test_case.steps' , $this->test_case->id);

    }

    public function render()
    {
        $projects = Project::all();
        $testcases = TestCase::all();
        $priorities = Priority::all();
        return view('livewire.designers.redesign-test-case-form' , compact('testcases','priorities' , 'projects'));
    }
}
