 <?php
//
//
class DatabaseAdaptor {
  // The instance variable used in every one of the functions in class DatbaseAdaptor
  private $DB;
  // Make a connection to an existing data based named 'imdb_small' that has
  // table . In this assignment you will also need a new table named 'users'
  public function __construct() {
    $db = 'mysql:dbname=dump;host=127.0.0.1;charset=utf8';
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
  	$stmt = $this->DB->prepare ( "SELECT quotes.rank, quotes.flag, quotes.phrase, quotes.author,quotes.quoteId From quotes ORDER BY quotes.rank DESC" );
  	$stmt->execute ();
  	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  public function addNewUser($user, $pass) {
  	$stmt = $this->DB->prepare ( "SELECT * FROM logins " );
  	$stmt->execute ();
  	$arr = $stmt->fetchAll ( PDO::FETCH_ASSOC );

  	$num = count ( $arr ) ;
	$hashed = password_hash($pass, PASSWORD_DEFAULT);
  	$stmt = $this->DB->prepare ( "INSERT INTO logins VALUES (".$num.", '" .$user."', '".$hashed."')" );
  	$stmt->bindParam('account_name', $user);
  	$stmt->bindParam('password', $hashed);
  	$stmt->execute ();
  }
  public function addNewQuote($quote, $author, $userId) {
  	$stmt = $this->DB->prepare ( "SELECT * FROM quotes " );
  	$stmt->execute ();
  	$arr = $stmt->fetchAll ( PDO::FETCH_ASSOC );
  	
  	$num = count ( $arr ) + 1;
   	$flag = 0;

	
  	$stmt = $this->DB->prepare ( "INSERT INTO quotes VALUES (".$num.", ". 0 ." , ". 0 ." ,'" .$quote."', '".$author."')" );
  	$stmt->bindParam('phrase', $quote);
  	$stmt->bindParam('author', $author);
  	$stmt->execute (); 
  }
  public function encrypt(){
  	$stmt = $this->DB->prepare ( "SELECT password FROM logins WHERE id = 0" );
  	$stmt->execute ();
  	$arr = $stmt->fetchAll( PDO::FETCH_ASSOC );
  	$password = $arr{0}{'password'};
  	$hashed = password_hash($password, PASSWORD_DEFAULT);
  //	return password_hash($password, PASSWORD_DEFAULT);
  	$stmt1 = $this->DB->prepare ( "UPDATE logins SET password = " .'"'.$hashed.'"'." WHERE id = 0");
  	$stmt1->execute ();
  	
  	$arr1 = $this->DB->prepare ( "SELECT * FROM logins WHERE id = 1" );
  	$arr1->execute();
  	$arr1 = $stmt->fetchAll( PDO::FETCH_ASSOC );
  	$password2 = $arr1{0}{'password'};
  	$stmt2 = $this->DB->prepare ( "UPDATE logins SET password = " . '"' .password_hash($password2, PASSWORD_DEFAULT). '"' . " WHERE id = 1");
  	$stmt2->execute ();  
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
  public function upRankVote($quoteId){
  	$stmt = $this->DB->prepare("UPDATE quotes SET rank = quotes.rank+1 WHERE quoteId = " . $quoteId);
 	$stmt->execute ();
  }
  public function deRankVote($quoteId){
  	$stmt = $this->DB->prepare("UPDATE quotes SET rank = quotes.rank-1 WHERE quoteId = " . $quoteId);
  	$stmt->execute ();
  }
  public function setFlag($quoteId){
  	$stmt = $this->DB->prepare("UPDATE quotes SET flag = (CASE flag WHEN 1 THEN 0 ELSE 1 END) WHERE quoteId = " . $quoteId);
  	$stmt->execute ();
  }
  public function unflag($userId){
  	$stmt = $this->DB->prepare("UPDATE quotes SET flag = 0" );
  	$stmt->execute ();
  }


} // End class DatabaseAdaptor

// Testing code that should not be run when a part of MVC
$theDBA = new DatabaseAdaptor ();

//$theDBA->addNewQuote('My name is Sam', 'Sam', 3);

/*$arr = $theDBA->getAllQuotes();
print_r($arr);

$arr2 = $theDBA->getUserQuotes();
print_r($arr2);*/



?>
