<?php 

  require 'common.php';

  function display_checkboxes()
  {
    $rows = execute_query("SELECT topic_id, name FROM scriptures.topic", array());
    foreach ($rows AS $row)
    {
      $topic_id = $row['topic_id'];
      $name = $row['name'];
      echo "<input type='checkbox' name='topic_id[]' value='$topic_id'>$name<br>";
    }
  }

?>
<!DOCTYPE html>
<html>

  <head>
    <title>Scripture Inserter</title>
  </head>

  <body>

    <h1>Scripture Inserter</h1>
    
    <form action="insert.php" method="post">
      Book: <input type="text" name="book"><br>
      Chapter: <input type="text" name="chapter"><br>
      Verse: <input type="text" name="verse"><br>
      Content: <textarea name="content" rows="4" cols="40"></textarea><br>
      <?php display_checkboxes(); ?>
      <br>
      <input type="submit">
    </form>

  </body>

</html>