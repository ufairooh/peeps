<?php
class Comments {
  /* [HELPER DATABASE FUNCTIONS] */
  protected $pdo = null;
  protected $stmt = null;
  public $error = "";
  public $lastID = null;

  function __construct() {
  // __construct() : connect to the database
  // PARAM : DB_HOST, DB_CHARSET, DB_NAME, DB_USER, DB_PASSWORD
  // ATTEMPT CONNECT

    try {
      $str = "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET;
      if (defined('DB_NAME')) {
        $str .= ";dbname=" . DB_NAME;
      }
      $this->pdo = new PDO(
          $str, DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false
          ]
      );
      return true;
    }
    // ERROR - DO SOMETHING HERE
    // THROW ERROR MESSAGE OR SOMETHING
    catch (Exception $ex) {
      print_r($ex);
      die();
    }
  }

  function __destruct() {
  // __destruct() : close connection when done

    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }

  function start() {
  // start() : auto-commit off

    $this->pdo->beginTransaction();
  }

  function end($commit = 1) {
  // end() : commit or roll back?

    if ($commit) { $this->pdo->commit(); }
    else { $this->pdo->rollBack(); }
  }

  function exec($sql, $data = null) {
  // exec() : run insert, replace, update, delete query
  // PARAM $sql : SQL query
  //       $data : array of data

    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($data);
      $this->lastID = $this->pdo->lastInsertId();
    } catch (Exception $ex) {
      $this->error = $ex;
      return false;
    }
    $this->stmt = null;
    return true;
  }

  function fetch($sql, $cond = null, $key = null, $value = null) {
  // fetch() : perform select query
  // PARAM $sql : SQL query
  //       $cond : array of conditions
  //       $key : sort in this $key=>data order, optional
  //       $value : $key must be provided, sort in $key=>$value order

    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      if (isset($key)) {
        $result = array();
        if (isset($value)) {
          while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
            $result[$row[$key]] = $row[$value];
          }
        } else {
          while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
            $result[$row[$key]] = $row;
          }
        }
      } else {
        $result = $this->stmt->fetchAll();
      }
    } catch (Exception $ex) {
      $this->error = $ex;
      return false;
    }
    $this->stmt = null;
    return $result;
  }
  
  /* [COMMENTS FUNCTIONS] */
  function get($pid = 0) {
    // get() : get all comments for the given post
    // PARAM $pid : post ID

    $sql = "SELECT * FROM `comments` WHERE `post_id`=? ORDER BY `reply_id`";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute([$pid]);
    $comments = [];
    while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
      if (is_numeric($row['reply_id'])) {
        $comments[$row['reply_id']]['reply'][$row['comment_id']] = $row;
      } else {
        $comments[$row['comment_id']] = $row;
      }
    }
    return count($comments) > 0 ? $comments : false;
  }

  function add($pid, $name, $message, $rid) {
  // add() : add new comment
  // PARAM $pid : post ID
  //       $name : name
  //       $message : comment message
  //       $rid : reply id

    $fields = "`post_id`, `name`, `message`";
    $values = "?, ?, ?";

    // Clean out HTML tags, prevent XSS
    $message = str_replace("<", "&lt;", $message);
    $message = str_replace(">", "&gt;", $message);

    $cond = [$pid, $name, $message];
    if (is_numeric($rid)) {
      $fields .= ", `reply_id`";
      $values .= ", ?";
      $cond[] = $rid;
    }
    $sql = "INSERT INTO `comments` ($fields) VALUES ($values);";
    return $this->exec($sql, $cond);
  }

  function edit($cid, $name, $message) {
  // edit() : update a comment
  // PARAM $cid : comment id
  //       $name : name
  //       $message : comment message

    $sql = "UPDATE `comments` SET `name`=?, `message`=? WHERE `comment_id`=?;";

    // Clean out HTML tags, prevent XSS
    $message = str_replace("<", "&lt;", $message);
    $message = str_replace(">", "&gt;", $message);

    return $this->exec($sql, [$name, $message, $cid]);
  }

  function delete($cid) {
  // delete() : delete a comment
  // PARAM $cid : comment ID

    $this->start();
    $pass = $this->exec("DELETE FROM `comments` WHERE `comment_id`=?;", [$cid]);
    if ($pass) {
      $pass = $this->exec("DELETE FROM `comments` WHERE `reply_id`=?;", [$cid]);
    }
    $this->end($pass);
    return $pass;
  }
}
?>