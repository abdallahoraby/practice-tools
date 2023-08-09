<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Http\Request;
class UsersRoles extends Component
{
    protected $queryString = ['token'];

    public $token;
    public $user_id;
    public function mount()
    {
        $user = DB::table('wp_users')
            ->where('ID', $this->user_id)
            ->select('pt_activate', 'pt_data')
            ->first();

        if (!$user->pt_data) {
            $this->ncode_1 = false;
            $this->ncode_2 = false;
            $this->ncode_3 = false;
            $this->ncode_4 = false;
            $this->baseline = false;
            $this->personal = false;
            $this->wheel = false;
            $this->decision = false;
            $this->define = false;
        } else {
            $pt_data = json_decode($user->pt_data);

            $this->ncode_1 = $pt_data->ncode_1;
            $this->ncode_2 = $pt_data->ncode_2;
            $this->ncode_3 = $pt_data->ncode_3;
            $this->ncode_4 = $pt_data->ncode_4;
            $this->baseline = $pt_data->baseline;
            $this->personal = $pt_data->personal;
            $this->wheel = $pt_data->wheel;
            $this->decision = $pt_data->decision;
            $this->define = $pt_data->define;
        }
    }

    public function save()
    {
        DB::table('wp_users')
            ->where('ID', $this->user_id)
            ->update([
                'pt_data' => json_encode([
                    'ncode_1' => $this->ncode_1,
                    'ncode_2' => $this->ncode_2,
                    'ncode_3' => $this->ncode_3,
                    'ncode_4' => $this->ncode_4,
                    'baseline' => $this->baseline,
                    'personal' => $this->personal,
                    'wheel' => $this->wheel,
                    'decision' => $this->decision,
                    'define' => $this->define,
                ])
            ]);

        return redirect('admin/index?token=' . $this->token);
    }

    public function render()
    {
        return view('livewire.admin.users-roles');
    }
}
