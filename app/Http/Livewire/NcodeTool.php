<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NcodeTool extends Component
{
    public $ncodeWords;
    public $selectedWords = [];
    public $filtered;
    public $picked = 0;
    public $maxPicked = 162;
    public $result= [];
    protected $queryString = ['token'];
    public $token;
    public $local;
    public $phase = [];
    public $currentPhase = 0;

    public function mount()
    {
        $ncodes = session()->get('ncodes');
        $this->ncodeWords = config('resources.ncode');

        foreach ($ncodes as $key => $value) {
            if ($value) {
                array_push($this->selectedWords, $this->ncodeWords[$key]);
            }
        }
        
        $this->filtered = [];
        $this->phase[0] = $this->selectedWords;
    }
    
    public function prevPhase()
    {
        $this->currentPhase = $this->currentPhase - 1;
        $this->selectedWords = $this->phase[$this->currentPhase];
        $this->filtered = [];
        $this->picked = 0;
        $this->maxPicked = ($this->maxPicked == 24) 
        ? 162
        : $this->maxPicked * 2;
    }

    public function select($catIndex, $word)
    {
        if (!array_key_exists($catIndex, $this->filtered)) {
            $this->filtered[$catIndex] = [
                'category_title' => $this->selectedWords[$catIndex]['category_title'],
                'category_color' => $this->selectedWords[$catIndex]['category_color'],
                'category_data' => []
            ];
        }

        $isExist = array_search($word, $this->filtered[$catIndex]['category_data']);

        if ($isExist === false ) {
            if ($this->picked == $this->maxPicked) return;

            array_push($this->filtered[$catIndex]['category_data'], $word);
            $this->picked++;
        } else {
            unset($this->filtered[$catIndex]['category_data'][$isExist]);
            $this->picked--;
        }
    }

    public function nextPhase()
    {
        if ($this->picked >= 24 || $this->picked == $this->maxPicked) {
            $this->selectedWords = $this->filtered;
            $this->filtered = [];
            $this->maxPicked = ($this->maxPicked == 162) 
            ? 24
            : $this->maxPicked / 2;

            $this->picked = 0;
            $this->currentPhase = $this->currentPhase + 1;
            $this->phase[$this->currentPhase] = $this->selectedWords;
        }
    }

    public function getWords()
    {
        $result = [];
        
        foreach ($this->filtered as $category) 
            array_push($result, ...$category['category_data']);
        
        return $result;
    }
    public function toolOver()
    {
        array_push($this->result, ...$this->getWords());

        $email = base64_decode($this->token);
        $user = DB::table('wp_users')
            ->where('user_email', $email)
            ->first('id');
        DB::table('pt_results')
            ->updateOrInsert(
                ['user_id' => $user->id],
                ['ncode' => implode('#', $this->result)]
            );
            
        return redirect("{$this->local}/output/ncode?token={$this->token}");
    }

    public function render()
    {
        return view('livewire.ncode-tool');
    }
}
