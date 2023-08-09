<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DecisionTool extends Component
{
    public $token;
    public $local;
    public $semiOutput = 0;

    public function toolOver()
    {
        $result = session()->get('output-decision');

        $email = base64_decode($this->token);
        $user = DB::table('wp_users')
            ->where('user_email', $email)
            ->first('id');

        DB::table('pt_results')
            ->updateOrInsert(
                ['user_id' => $user->id],
                ['decision' => implode('#', $result)]
            );

        return redirect("{$this->local}/output/decision?token={$this->token}");
    }

    public function semiFinal($result)
    {
        $this->semiOutput = 1;

        session()->put("output-decision", $result);
    }

    public function previous()
    {
        $this->semiOutput = 0;
    }

    public function render()
    {
        return view('livewire.decision-tool');
    }
}
