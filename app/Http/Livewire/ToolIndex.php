<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ToolIndex extends Component
{
    public $tools;

    protected $queryString = ['token'];
    public $token;

    public function mount()
    {
        $email = base64_decode($this->token);

        $user = DB::table('wp_users')
            ->where('user_email', $email)
            ->select('pt_data')
            ->first();

        $pt_data = json_decode($user->pt_data);
        
        $this->tools = [
            'ncode' => [
                'open' => $pt_data->ncode_1 || $pt_data->ncode_2 || $pt_data->ncode_3 || $pt_data->ncode_4,
                'title' => 'N - Code',
                'link' => 'ncode',
                'color' => 'btn-success '
            ],
            'personal' => [
                'open' => $pt_data->personal,
                'title' => 'Personal Assesment',
                'link' => 'personal',
                'color' => 'btn-secondary '
            ],
            'wheel' => [
                'open' => $pt_data->wheel,
                'title' => 'Wheel of Life',
                'link' => 'wheel',
                'color' => 'btn-warning '
            ],
            'baseline' => [
                'open' => $pt_data->baseline,
                'title' => 'Baseline',
                'link' => 'baseline',
                'color' => 'btn-primary '
            ],
            'define' => [
                'open' => $pt_data->define,
                'title' => 'Define My Outcome',
                'link' => 'define',
                'color' => 'btn-danger '
            ],
            'decision' => [
                'open' => $pt_data->decision,
                'title' => 'Decision Making Wheel',
                'link' => 'decision',
                'color' => 'btn-info '
            ],
        ];
    }

    public function render()
    {
        return view('livewire.tool-index');
    }
}
