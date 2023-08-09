<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UsersManagment extends Component
{
    public function mount()
    {
        // $this->users = DB::table('wp_users')->where('user_login', '!=', 'admin')->get();
    }

    public function toggleActivation($val, $user_id)
    {
        DB::table('wp_users')
            ->where('ID', $user_id)
            ->update(['pt_activate' => $val]);
    }

    public function hydrate()
    {
        $this->emit('Render-Feather');
    }

    public function render()
    {
        return view('livewire.admin.users-managment',[
            'users' => DB::table('wp_users')->where('user_login', '!=', 'admin')->get()
        ]);
    }
}
