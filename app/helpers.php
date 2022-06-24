<?php
function dd($flag = true, ...$arguments) {
    if (count($arguments)) {
    echo "<pre>";  
    foreach($arguments as $arg) {
    var_dump($arg);
    }
    echo "</pre>";
    if ($flag) exit;
    }
    }
 function route(array $routes, $action) {
    if (array_key_exists($action, $routes)) {

        list($controlerClass,$method)=explode('@',$routes[$action]);
        $controllerPath = CONTROLLERS_PATH . "/" . $controlerClass . '.php';
        if (is_readable($controllerPath)) {
            require_once $controllerPath;

            $ObjControler=new $controlerClass;
            $ObjControler->$method();

        } else {
            die("Undefined Controller {$controllerPath}");
        }
    }
} 
function setCookies(array $task){
    if(strlen($task['task'])==0){
        header('Location:/?action=home');
        die();
    }
    if(!isset($_COOKIE['todos'])){
        $_COOKIE['todos']=[];
    } else{
        $_COOKIE['todos']=json_decode($_COOKIE['todos'],true);
    }
    $id=bin2hex(random_bytes(8));

$_COOKIE['todos'][]=[
    'id'=>$id,
    'body'=>$task['task'],
    'priority'=>$task['priority'] ?? false,
    'created-at'=>date("Y-m-d H:i:s"),
    'complated'=>false

];
setcookie('todos',json_encode($_COOKIE['todos'], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));
header('Location:/?action=home');
}

function getTodos(){
$todos_list=[];
if(!isset($_COOKIE['todos'])){
    $_COOKIE['todos']=[];
}
foreach($_COOKIE['todos'] as $todo){
$todos_list[]=$todo;
}
return $todos_list;
}
function countTasks (){
$i=0;
    if(!isset($_COOKIE['todos'])){
      return "0";
    } else{
        $_COOKIE['todos']=json_decode($_COOKIE['todos'],true);
        foreach( $_COOKIE['todos'] as $todo){
            if(!isComplete($todo)){
                $i++;
            }
       
        }
         return $i;
    }

}
function isComplete($todo){
    if($todo['complated']==true){
        return true;
    } else {
    return false;
    }
}
function compl(){
    if(!isset($_GET['id'])){

        header('Location:/?action=home');
        die();
     } else{
        if(!isset($_COOKIE['todos'])){
            $_COOKIE['todos']=[];
        } else{
            $_COOKIE['todos']=json_decode($_COOKIE['todos'],true);
        }

        $id=$_GET['id'];
        
        for ($i=0; $i < Count($_COOKIE['todos']); $i++) { 
            if($_COOKIE['todos'][$i]['id']==$id){
                 $_COOKIE['todos'][$i]['complated']=!($_COOKIE['todos'][$i]['complated']);
             }
        }
       setcookie('todos',json_encode($_COOKIE['todos'], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));
        header('Location:/?action=home');
    }
}
function del(){
    if(!isset($_GET['id'])){

        header('Location:/?action=home');
        die();
    } else{
        $id=$_GET['id'];
    }
    if(!isset($_COOKIE['todos'])){
        $_COOKIE['todos']=[];
    } else{
        $_COOKIE['todos']=json_decode($_COOKIE['todos'],true);
    }
    for ($i=0; $i < Count($_COOKIE['todos']); $i++) { 
        if($_COOKIE['todos'][$i]['id']==$id){
             unset($_COOKIE['todos'][$i]);
         }
    }
    setcookie('todos',json_encode($_COOKIE['todos'], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));
    header('Location:/?action=home');
}
function sortPrio($todos){
    do {
        $swapped = false;
    for ($i=0; $i < (Count($todos))-1; $i++) { 
        if($todos[$i]['priority']==false&&$todos[($i)+1]['priority']==true){
            list($todos[$i],$todos[$i+1])=array($todos[$i+1],$todos[$i]);
            $swapped = true;
         }
        }
    }
    while ($swapped);
    return $todos;
}