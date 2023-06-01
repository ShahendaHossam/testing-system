<?php

namespace App\Http\Livewire\Executors;

use App\Models\Status;
use App\Models\TestCase;
use App\Models\TestCaseStep;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddTestCaseForm extends Component
{
    public TestCase $test_case;
    public $test_case_id;
    public $statuses;
    public $executed_at;

    protected $rules = [
        'test_case.post_condition' => 'nullable|string',
        'test_case.status_id' => 'nullable|integer',


    ];


    public function store()
    {
        $this->validate();
        $user = Auth::user();
        $this->test_case->executor_id = $user->id;
        $this->executed_at = time();
        $this->test_case->executed_at = date('Y-m-d h:i:s',  $this->executed_at);
        $this->test_case->save();

        
          
            return redirect()->route('general.testcase')->with('success', 'Test Case ');
        

        // switch ($this->statuses) {
        //     case $this->statuses = Status::where('id', 4)->first():
        //         return redirect()->route('general.testcase')->with('success', 'Test Case Successfully');
        //       break;
        //     case $this->statuses = Status::where('id', 2)->first():
        //         return redirect()->route('test_case.design')->with('success', 'Test Case Redesign');
        //       break;
        //     default:
        //       echo "Your favorite color is neither red, blue, nor green!";
        //   }
    }

    public function mount()
    {
        $this->test_case_id = $this->test_case->id;
    }
    public function render()
    {
        $this->statuses = Status::where('id', 2)->orWhere('id', 4)->orWhere('id', 5)->get();
        $testcasesteps = TestCaseStep::all();
        return view('livewire.executors.add-test-case-form', compact('testcasesteps'));
    }
}
