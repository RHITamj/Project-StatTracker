<?php
	class Player {
		private $firstName;
		private $lastName;
		private $goals;
		private $assists;
		
		function __construct($first,$last){
			$this->firstName = (string) $first;
			$this->lastName = (string) $last;
			$this->goals = 0;
			$this->assists = 0;
		}
		
		function getName(){
			return $this->firstName;
		}
		
		function getGoals(){
			return $this->goals;
		}
		
		function getAssists(){ 
			return $this->assists;
		}
		function getPoints(){ 
			return $this->assists + $this->goals;
		}
	}
	
	abstract class Score {
		private $Cplayer;
		private $Cgame;
		function  __construct($player,$game) {
			$this->Cplayer = $player;
			$this->Cgame = $game;
		}
		function getGame(){
			return $this->Cgame;
		}
		function getPlayer(){
			return $this->Cplayer;
		}
	}
	
	class Goal extends Score{}
	class Assist extends Score{}

	$P = new Player("a","b");
	if($P->getName() == "a"){
		echo "TEST PASSED: Player Names  ";
	}else{
		echo "TEST FAILED: Player Names ";
	}

	class Team{
		private $name;
		private $wins = 0;
		private $losses = 0;
		private $players;
		
		function __construct($pName){
			$this->name = (string) $pName;
			$this->players = array();
		}
		
		function getName(){ return $this->name; }
		function getWins(){ return $this->wins; }
		function getLosses(){ return $this->losses; }
		function getPlayer($n){ return $this->players[$n]; }
	}

	$T = new Team("Florida Panthers");
	if($T->getName() == "Florida Panthers"){echo "TEST PASSED: Team Name";} else { echo "TEST FAILED: Team Name ";}

	class Game{
		private $id;
		private $home;
		private $away;
		private $score = "0-0";
		
		function __construct($pHome,$pAway){ $this->home = $pHome; $this->away=$pAway;}
		
		function getHome(){ return $this->home; }
		function getAway(){ return $this->away; }
		function getScore(){ return $this->score; }
		function getScoreAt($n){
			//UNIMPLEMENTED 
		}
		
	}
	
	$ga = new Game("FLA","TBL");
	if($ga->getHome() == "FLA"){ echo " TEST PASSED: Game Teams "; }else{ echo " TEST FAILED: Game Teams ";}

	class Season{
		private $Name;
		private $Games;
		
		function __construct($n){
			$this->Name = $n;
			$this->Games = array();
		}
		
		function getGame($n){ return $this->Games[$n]; }
		function getName(){ return $this->Name; }
		
	}

	$S = new Season("NHL");
	if($S->getName() == "NHL") { echo " TEST PASSED: Season Names "; }else{ echo " TEST FAILED: Season Names "; }

?>