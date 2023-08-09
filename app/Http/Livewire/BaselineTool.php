<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BaselineTool extends Component
{
    public $baselineWords;
    public $selectedWords = [];
    public $filtered;
    public $picked = 0;
    public $maxPicked = 244;
    public $result= [];
    protected $queryString = ['token'];
    public $token;
    public $local;
    public $phase = [];
    public $currentPhase = 0;

    public function mount()
    {
        $this->baselineWords = config('resources.baseline');
 
        $this->selectedWords = $this->baselineWords;
        
        $this->filtered = [];
    }

    public function prevPhase()
    {
        $this->currentPhase = $this->currentPhase - 1;
        $this->selectedWords = $this->phase[$this->currentPhase];
        $this->filtered = [];
        $this->picked = 0;
        
        $this->maxPicked = ($this->maxPicked == 24) 
        ? 244
        : (($this->maxPicked < 6) 
        ? $this->maxPicked + 1 : $this->maxPicked * 2);
    }

    public function select($catIndex, $word)
    {
        if (!array_key_exists($catIndex, $this->filtered)) {
            $this->filtered[$catIndex] = [
                'category_title' => $this->baselineWords[$catIndex]['category_title'],
                'category_color' => $this->baselineWords[$catIndex]['category_color'],
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
            $this->maxPicked = ($this->maxPicked == 244) 
            ? 24
            : (($this->maxPicked <= 6) 
            ? $this->maxPicked - 1 : $this->maxPicked / 2);

            $this->currentPhase = $this->currentPhase + 1;
            $this->phase[$this->currentPhase] = $this->selectedWords;
            $this->picked = 0;
            $this->updatedmaxPicked();
        }
    }
    public function updatedmaxPicked()
    {
        if ($this->maxPicked == 5) {
            array_push($this->result, ...$this->getWords());
        } else if ($this->maxPicked <=4 ) {
            $this->result = [...$this->getWords(), ...array_diff($this->result, [...$this->getWords()])];
        }
    }
    public function getWords()
    {
        $result = [];
        
        foreach ($this->selectedWords as $category) 
            array_push($result, ...$category['category_data']);
        
        return $result;
    }
    public function toolOver()
    {
        // Cache::rememberForever('base-line-result', fn () => $this->result);
        $email = base64_decode($this->token);
        $user = DB::table('wp_users')
            ->where('user_email', $email)
            ->first('id');
        DB::table('pt_results')
            ->updateOrInsert(
                ['user_id' => $user->id],
                ['baseline' => implode('#', $this->result)]
            );
            
        return redirect("{$this->local}/output/baseline?token={$this->token}");
    }
    public function render()
    {
        return view('livewire.baseline-tool');
    }
}
