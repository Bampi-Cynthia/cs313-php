<?php

  try
  {
    $dbUrl = getenv('DATABASE_URL');
    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPwd  = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName",
      $dbUser, $dbPwd);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }   
  catch (PDOException $x)
  {
    $msg = $x->getMessage();
    echo "<pre>$msg</pre>";
  }

  function execute_query($query, $params)
  {
    try
    {
      global $db;
      $stmt = $db->prepare($query);
      if ($stmt)
      {
        if ($stmt->execute($params))
        {
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
      }
    }   
    catch (PDOException $x)
    {
      $msg = $x->getMessage();
      echo "<pre>$msg</pre>";
    }
  }

?>