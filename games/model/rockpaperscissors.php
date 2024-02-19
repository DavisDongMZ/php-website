<?php

class rockGame {
	public $history = array();
	public $state = "";
    public $numPlayed = 0;
    public $AInumber = 0;  //1 is rock, 2 is scissor, 3 is paper
    public $AIword = "";
    public $youWoned = 0;
    public $Iwoned = 0;

	public function __construct() {
    }


	public function makeGuess($play){
        $this->AInumber = rand(1,3);
        if ($this->AInumber == 1){
            $this->AIword = "rock";
        } else if ($this->AInumber == 2){
            $this->AIword = "scissor";
        } else{
            $this->AIword = "paper";
        }

		$this->numPlayed++;
		if($play == $this->AIword){
			$this->state="tie game";
		} else if(($play == "rock" && $this->AInumber == 2) || ($play == "scissor" && $this->AInumber == 3) || ($play == "paper" && $this->AInumber == 1)){
			$this->youWoned++;
            $this->state="you won";
		} else {
            $this->Iwoned++;
			$this->state="I won";
		}

        if ($play == "rock"){
		    $this->history[] = "Round #$this->numPlayed, you chose rock, I chose $this->AIword, $this->state.";
        } else if ($play == "scissor"){
            $this->history[] = "Round #$this->numPlayed, you chose scissor, I chose $this->AIword, $this->state.";
        } else {
            $this->history[] = "Round #$this->numPlayed, you chose paper, I chose $this->AIword, $this->state.";
        }

	}

	public function getYouState(){
		return $this->youWoned;
	}

    public function getIstate(){
        return $this->Iwoned;
    }
}
?>