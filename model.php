 <?php
//
//
class DatabaseAdaptor {
  // The instance variable used in every one of the functions in class DatbaseAdaptor
  private $DB;
  // Make a connection to an existing data based named 'imdb_small' that has
  // table . In this assignment you will also need a new table named 'users'
  public function __construct() {
    $db = 'mysql:dbname=QuotesData;host=127.0.0.1;charset=utf8';
 // 	$db = 'mysql:dbname=QuotesData;host=127.0.0.1;charset=utf8';

    $user = 'root';
    $password = '';


    try {
      $this->DB = new PDO ( $db, $user, $password );
      $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch ( PDOException $e ) {
      echo ('Error establishing Connection');
      exit ();
    }
  }

  // Return all movies records as an associative array.
  public function getAllQuotes() {
  	$stmt = $this->DB->prepare ( "SELECT userquotes.rank, userquotes.flag, quotes.phrase, quotes.author,userQuotes.quoteId From userquotes JOIN quotes ON userQuotes.quoteId = quotes.quoteId and userQuotes.userId = 0 AND userQuotes.flag = 0 ORDER BY userQuotes.rank DESC" );
  	$stmt->execute ();
  	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function addNewUser($user, $pass) {
  	$stmt = $this->DB->prepare ( "SELECT * FROM logins " );
  	$stmt->execute ();
  	$arr = $stmt->fetchAll ( PDO::FETCH_ASSOC );

  	$num = count ( $arr );

  	$stmt = $this->DB->prepare ( "INSERT INTO logins VALUES (".$num.", '" .$user."', '".$pass."')" );
  	$stmt->execute ();
  }
  public function checkLogin(){
  	$stmt = $this->DB->prepare ( "SELECT * FROM logins " );
  	$stmt->execute ();
  	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function joinQuotes($id){
  	$stmt = $this->DB->prepare ( "SELECT quotes.phrase, quotes.author,userquotes.rank, userquotes.flag,userquotes.quoteId  From userquotes JOIN quotes ON userQuotes.quoteId = quotes.quoteId and userquotes.userID =" . $id);
  	$stmt->execute ();
  	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function getUserQuotes($id){
  	$stmt = $this->DB->prepare ("SELECT quotes.phrase, quotes.author,userquotes.rank, userquotes.flag,userquotes.quoteId   From userquotes JOIN quotes ON userQuotes.quoteId = quotes.quoteId and userquotes.userID =" . $id . " AND userQuotes.flag = 0 ORDER BY userQuotes.rank DESC");
  	$stmt->execute ();
  	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function upRankVote($userId,$quoteId){
  	$stmt = $this->DB->prepare("UPDATE userquotes SET rank = userquotes.rank+1 WHERE userId = " . $userId. " and quoteId = " . $quoteId);
 	$stmt->execute ();
  }
  public function deRankVote($userId,$quoteId){
  	$stmt = $this->DB->prepare("UPDATE userquotes SET rank = userquotes.rank-1 WHERE userId = " . $userId. " and quoteId = " . $quoteId);
  	$stmt->execute ();
  }
  public function setFlag($userId,$quoteId){
  	$stmt = $this->DB->prepare("UPDATE userquotes SET flag = (CASE flag WHEN 1 THEN 0 ELSE 1 END) WHERE userId = " . $userId. " and quoteId = " . $quoteId);
  	$stmt->execute ();
  }
  public function unflag($userId){
  	$stmt = $this->DB->prepare("UPDATE userquotes SET flag = 0 WHERE userId =  " . $userId);
  	$stmt->execute ();
  }


} // End class DatabaseAdaptor

// Testing code that should not be run when a part of MVC
$theDBA = new DatabaseAdaptor ();

//$arr = $theDBA->getAllQuotes ();
//print_r($arr);



?>
