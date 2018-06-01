<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

  require 'common.php';

//      Book: <input type="text" name="book"><br>
//      Chapter: <input type="text" name="chapter"><br>
//      Verse: <input type="text" name="verse"><br>
//      Content: <textarea name="content" rows="4" cols="40"></textarea><br>
//      <?php display_checkboxes(); 
//      echo "<input type='checkbox' name='topic_id[]' value='$topic_id'>$name<br>";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$book = $_POST['book'];
$chapter = $_POST['chapter'];
$verse = $_POST['verse'];
$content = $_POST['content'];

execute_query(<<<SQL
	insert into scriptures.scriptures
		(book, chapter, verse, content)
	values
		(:book, :chapter, :verse, :content)
SQL
, array(':book' => $book, ':chapter' => $chapter, 
	':verse' => $verse, ':content' => $content)
);

$scripture_id = $db->lastInsertId();

foreach ($_POST['topic_id'] AS $key => $topic_id)
{
// echo "<pre>";
// print_r($key);
// echo "</pre>";
// echo "<pre>";
// print_r($topic_id);
// echo "</pre>";
	execute_query(<<<SQL
		insert into scriptures.scripture_topic
			(scripture_id, topic_id)
		values
			(:scripture_id, :topic_id)
SQL
, array(':scripture_id' => $scripture_id, ':topic_id' => $topic_id));
}

?>
