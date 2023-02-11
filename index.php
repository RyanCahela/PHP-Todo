<?php 

//check if todo cookie set
if (isset($_COOKIE['todos'])) {
  //convert cookie string back to array
  $cookieTodosAsArray = explode(" ", $_COOKIE['todos']);
  $todos = $cookieTodosAsArray;
} else {
  $todos = Array(); 
  }

  //add new todo in memory todos
  if (isset($_POST['new-todo'])) {
    $newTodo = filter_input(INPUT_POST, 'new-todo', FILTER_SANITIZE_SPECIAL_CHARS);
    array_push($todos, $newTodo);

    //set cookie for future reference
    $oneDayInSeconds = 86400;

    //convert todos to string for cookie storage
    $todosAsString = implode(" ", $todos);
    setcookie("todos", $todosAsString, time() + $oneDayInSeconds);
  }

  $greeting = "Hello Create a Todo";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP-Todo</title>
</head>
<body>
  <h1><?= $greeting ?></h1>  
  <form method="post" action="index.php">
    <label for="new-todo">Enter New Todo</label>
    <input type="text" id="new-todo" name="new-todo" />
    <input type="submit" value="submit" name="submit" />
  </form>
  <div>
    <?php 
      foreach($todos as $todo) {
        echo "<p>$todo</p>";
      } 
    ?>
  </div>
</body>
</html>