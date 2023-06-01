<?php

namespace App\Http\Livewire\Designers;

use App\Models\TestCase;
use App\Models\TestCaseDataRequirement;
use App\Models\TestCaseStep;
use Livewire\Component;

class RedesignTestDataForm extends Component
{
    public TestCaseDataRequirement $test_data;

    protected $rules = [
        'test_data.test_case_step_id' => 'nullable|integer',
        'test_data.field_name' => 'nullable|max:255',
        'test_data.old_value' => 'nullable|max:255',
        'test_data.new_value' => 'nullable|max:255',
    ];

    public function update()
    {
        $this->validate();


        $this->test_data->save();

        $test_case = $this->test_data->test_case_step ? $this->test_data->test_case_step->test_case_id : false;

        if ($test_case) {
            return redirect()->route('designer.redesign', $test_case);
        } else {
            return redirect()->back();
        }
    }
    public function mount()
    {
        // $this->test_data = new TestCaseDataRequirement();
        $this->test_case = new TestCase();
        // $this->test_data_id = $this->test_data->id;


    }


    public function render()
    {
        $this->test_data_id = $this->test_data->id;
        // $this->test_case_id = $this->test_case->id;

        $testdata = TestCaseDataRequirement::all();
        return view('livewire.designers.redesign-test-data-form', compact('testdata'));
    }
}
