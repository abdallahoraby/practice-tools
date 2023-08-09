<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DefineTool extends Component
{
    public $rows = 1;

    protected $queryString = ['token'];
    public $token;
    public $local;

    public function increment()
    {
        $this->rows++;
    }

    public function decrement()
    {
        $this->rows--;
    }

    public function save($result, $ppRes)
    {
        // save in db
        $email = base64_decode($this->token);
        $user = DB::table('wp_users')
            ->where('user_email', $email)
            ->first('id');
        DB::table('pt_results')
            ->updateOrInsert(
                ['user_id' => $user->id],
                ['define' => implode('#', $result) . '/' . implode('#', $ppRes)]
            );

        return redirect("{$this->local}/output/define?token={$this->token}");
    }

    public function hydrate()
    {
        $this->emit('Render-Feather');
    }

    public function render()
    {
        return view('livewire.define-tool');
    }
}
