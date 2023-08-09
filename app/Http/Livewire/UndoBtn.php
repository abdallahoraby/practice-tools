<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use RalphJSmit\Livewire\Urls\Facades\Url;
use Illuminate\Support\Facades\App;

class UndoBtn extends Component
{
    public $tool;
    protected $queryString = ['token'];
    public $local;
    public $token;

    public function mount()
    {
        App::setLocale($this->local);
    }

    public function undo()
    {
        $email = base64_decode($this->token);
        $user = DB::table('wp_users')
            ->where('user_email', $email)
            ->first('id');

        DB::table('pt_results')
            ->where('user_id' , $user->id)
            ->update([
                $this->tool => null
            ]);

        return redirect("../../{$this->local}/tool/{$this->tool}?token=" . $this->token);
    }

    public function render()
    {
        return view('livewire.undo-btn');
    }
}
