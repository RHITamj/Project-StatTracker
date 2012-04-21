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
			return null;
			//UNIMPLEMENTED 
		}
		
	}

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
	
	class Test_Class{
		function seasonTest(){ $S = new Season("NHL"); if($S->getName() == "NHL") { echo "TEST PASSED: Season Names "; }else{ echo "TEST FAILED: Season Names"; }}
		function gameTest(){
			$ga = new Game("FLA","TBL");
			if($ga->getHome() == "FLA"){ echo "TEST PASSED: Game Teams"; }else{ echo "TEST FAILED: Game Teams";}
		}
		function teamTest(){
			$T = new Team("Florida Panthers");
			if($T->getName() == "Florida Panthers"){echo "TEST PASSED: Team Name";} else { echo "TEST FAILED: Team Name ";}
		}
		function playerTest(){
			$P = new Player("FirstName","LastName");
			if($P->getName() == "FirstName"){
				echo "TEST PASSED: Player Names  ";
			}else{
				echo "TEST FAILED: Player Names ";
			}
		}
		function RSS_READER_TEST(){
			RSS_Display("http://www.sportsnetwork.com/aspdata/clients/sportsnetwork/mlbrssscores.aspx");
		}
		function gameScoreAtTimeTest(){
			$game3 = new Game("FLA","NJD");
			if($game3->getScoreAt(60) == "4-3"){
				echo "TEST PASSED: Game score at time n";
			}else{
				echo "TEST FAILED: Game score at time n";
			}
		}
		function gamePlayerNumberNTest(){
			$Team1 = new Team("Florida Panthers");
			$PToTest = new Player("Stephen","Weiss");
			
			if($Team1->getPlayer(9) == "Stephen Weiss"){
				echo "TEST PASSED: Team get player n";
			}else{
				echo "TEST FAILED: Team get player n";
			}
		}
	}
	
	/***************
	*  TEST CASES  *
	****************/
	
	echo "BEGIN WEEK 6 TESTS THESE SHOULD PASS \n\n";
	/* WEEK 6 TESTS */
	$TC = new Test_Class();
	//Tests if season classes work correctly.
	$TC->seasonTest();	
	echo "\n";
	//Tests if game classes work correctly.
	$TC->gameTest();
	echo "\n";
	//Tests if team classes work correctly.
	$TC->teamTest();
	echo "\n";
	//Tests if player classes work correctly.
	$TC->playerTest();
	echo "\n";
	
	echo "\n\n\nWEEK 7 TESTS BEGIN THESE SHOULD CURRENTLY FAIL \n\n";
	
	/* WEEK 7 TESTS */
	//Tests if RSS displays feed correctly.
	$TC->gameScoreAtTimeTest();
	echo "\n";
	$TC->gamePlayerNumberNTest();
	echo "\n";
	$TC->RSS_READER_TEST();
	echo "\n";
?>