<?php

namespace App\Http\Livewire\Designers;

use App\Models\TestCaseDataRequirement;
use App\Models\TestCaseStep;
use Livewire\Component;

class TestCaseStepDataForm extends Component
{
    public TestCaseDataRequirement $test_case_data_requirement;
    public TestCaseStep $test_case_step;

    protected $listeners = ['edit','delete'];

    protected $rules = [
        'test_case_data_requirement.id' => 'nullable|integer',
        'test_case_data_requirement.test_case_step_id' => 'nullable|integer',
        'test_case_data_requirement.field_name' => 'nullable|max:255',
        'test_case_data_requirement.old_value' => 'nullable|max:255',
        'test_case_data_requirement.new_value' => 'nullable|max:255',
    ];

    public $editMode = false;

    public function edit(TestCaseDataRequirement $test_case_data_requirement)
    {
        $this->test_case_data_requirement = $test_case_data_requirement;

        $this->editMode = true;
    }

    public function cancelEdit()
    {
        $this->test_case_data_requirement = new TestCaseDataRequirement();

        $this->editMode = false;
    }

    public function delete(TestCaseDataRequirement $test_case_data_requirement)
    {
        $test_case_data_requirement->delete();

        $this->emit('updateRequirementsList');
    }

    public function mount()
    {
        $this->test_case_data_requirement = new TestCaseDataRequirement();
    }

    public function store()
    {
        $this->validate();

        $this->test_case_data_requirement->test_case_step_id = $this->test_case_step->id;

        $this->test_case_data_requirement->save();

        $this->test_case_data_requirement = new TestCaseDataRequirement();

        $this->emit('updateRequirementsList');
    }

    public function update()
    {
        $this->validate();

        // $this->test_case_data_requirement->test_case_step_id = $this->test_case_step->id;

        $this->test_case_data_requirement->save();

        $this->test_case_data_requirement = new TestCaseDataRequirement();

        $this->editMode = false;

        $this->emit('updateRequirementsList');
    }

    public function render()
    {
        return view('livewire.designers.test-case-step-data-form');
    }
}
