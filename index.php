<?php
$todos = [];
if(file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="newtodo.php" method="post">
        <input type="text" name="todo_name" placeholder="Enter your todo">
        <button>New Todo</button>
    </form>
    <br>
    <?php  foreach($todos as $todoName => $todo) : ?>

   <div style= "margin-bottom : 20px">
   <form action="change_status.php" method="POST" style="display: inline" >
   <input type="hidden" name="todo_name" value="<?=$todoName ?>" >
   <input  type="checkbox" <?php $todo['completed'] ? 'checked': '' ?> >
   </form>
    
    <?= $todoName; ?>
    <form style="display: inline" action ="delete.php" method= "POST">
        <input type="hidden" name="todo_name" value="<?=$todoName ?>" >
    <button>Delete</button>
    </form>
    
   </div>
        
     <?php endforeach 
     //this js code for checkbox status change ?? i do  not know anything about it.s
      ?>

        <script>
            const checkboxes = document.querySelectorAll('input[type=checkbox]');
            checkboxes.forEach(ch => {
            ch.onclick= function() {
                this.parentNode.submit();
            };
            }) ;

            
        </script>
</body>
</html>