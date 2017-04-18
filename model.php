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
 // 	$db = 'mysql:dbname=test;host=127.0.0.1;charset=utf8';
  	 
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
  	$stmt = $this->DB->prepare ( "SELECT * FROM quotes" );
  	$stmt->execute ();
  	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  

 
} // End class DatabaseAdaptor

// Testing code that should not be run when a part of MVC
$theDBA = new DatabaseAdaptor ();
$arr = $theDBA->getAllQuotes ();
print_r($arr);

 
?>