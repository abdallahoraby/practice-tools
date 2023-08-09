<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WheelTool extends Component
{
    protected $queryString = ['token'];
    public $token;
    public $local;

    public function save($result)
    {
        $email = base64_decode($this->token);
        $user = DB::table('wp_users')
            ->where('user_email', $email)
            ->first('id');
        DB::table('pt_results')
            ->updateOrInsert(
                ['user_id' => $user->id],
                ['wheel' => implode('#', $result)]
            );

        return redirect("{$this->local}/output/wheel?token={$this->token}");
    }

    public function render()
    {
        return view('livewire.wheel-tool');
    }
}
