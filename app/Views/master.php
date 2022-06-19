<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASE_URL."/css/style.css"?>">

  </head>
  <body class="container-fluid">
    <br><br>
    <div class="row">
        <div class="col-3" id="v">
            <div class="Form">
    <h2>Додати завдання</h2> 
     <hr class="HR">
        <form action="<?=$_SERVER['PHP_SELF']?>?action=add" method="post">
    <label for="task" class="lbForm">Опишіть задачу</label><br><br>
    <textarea name="task" id="" cols="30" rows="10" placeholder="Опишіть задачу, коротко, лише основне(не більше 160 символів)"></textarea><br>
    <input type="checkbox" name="priority" value="true>
    <label for="priority" >Пріоритет?</label><br><br>
    <input type="submit" value="Створити завдання" name="btnAdd" class="btnForm">
    </form>
    </div>
        </div>
        <div class="col">
          <div class="Task">
            <h3>Мої завдання <span class="CountT">(<?=CountTasks()?>)</span></h3>
            <?=require_once VIEWS_PATH."/Pages/Tasks.php"?>
            <h3>Виконані завдання </h3>
            <?=require_once VIEWS_PATH."/Pages/CompleteTask.php"?>
           <!-- <?=dd(false,$_COOKIE['todos'])?> -->
            </div>
            </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>