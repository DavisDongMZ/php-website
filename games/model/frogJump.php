<?php

class frogGame {
	public $frogs = array("yellowFrog", "yellowFrog2", "yellowFrog3", "emptyPic", "greenFrog1", "greenFrog2", "greenFrog3");
    public $history = array();
    public $position = array(1,1,1,0,1,1,1);
    public $state = "";
    public $hasWonned = 0;
	
    public function reStart(){
        $this->frogs = array("yellowFrog", "yellowFrog2", "yellowFrog3", "emptyPic", "greenFrog1", "greenFrog2", "greenFrog3");
        $this->history = array();
        $this->position = array(1,1,1,0,1,1,1);
        $this->state = "";
    }

	public function movefrog($frog){
        $index = array_search($frog, $this->frogs);
        if ($index === false) {
            $this->history[] = "Invalid frog type";
            return;
        }
        
        $offset = ($frog[0] == 'y') ? 1 : -1; 
        
        if ($this->position[$index + $offset] == 0) {        
            $this->position[$index] = 0;
            $this->position[$index + $offset] = 1;
            $this->frogs[$index] = "emptyPic";
            $this->frogs[$index + $offset] = $frog;
        } else if ($this->position[$index + 2 * $offset] == 0) {     
            $this->position[$index] = 0;
            $this->position[$index + 2 * $offset] = 1;
            $this->frogs[$index] = "emptyPic";
            $this->frogs[$index + 2 * $offset] = $frog;
        } else {                                          
            $this->history[] = "Invalid move";
        }
	}

	public function getState(){
		$result = array("greenFrog1", "greenFrog2", "greenFrog3", "emptyPic", "yellowFrog", "yellowFrog2", "yellowFrog3");
        if ($result == $this->frogs){
            $this->state = "win";
            $this->hasWonned += 1;
        } else {
            $this->state = "ongoing";
        }
        return $this->state;
	}
}
?>