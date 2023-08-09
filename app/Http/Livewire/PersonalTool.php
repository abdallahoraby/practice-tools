<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PersonalTool extends Component
{
    public $token;
    public $local;
    public $semiOutput = 0;

    public function toolOver($result)
    {
        $email = base64_decode($this->token);
        $user = DB::table('wp_users')
            ->where('user_email', $email)
            ->first('id');

        DB::table('pt_results')
            ->updateOrInsert(
                ['user_id' => $user->id],
                ['personal' => $result]
            );

        return redirect("{$this->local}/output/personal?token={$this->token}");
    }

    public function semiFinal($result)
    {
        $this->semiOutput = 1;
        
        $result = explode(' ', $result)[0];
        $result = config('resources.personal_output')[$result];

        session()->put("output-personal", $result);
    }

    public function previous()
    {
        $this->semiOutput = 0;
    }

    public function render()
    {
        return view('livewire.personal-tool');
    }
}
