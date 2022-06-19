<div>
<?php
echo("<ul>");
foreach(GetTodos()as $todo){
    if(isComplete($todo)){
echo("<li>");
echo("<span class='Compl'><s>".$todo['body']."</s>&nbsp;&nbsp;&nbsp;</span><a class='btn' href='".$_SERVER['PHP_SELF']."?action=complete&id=".$todo['id']."'>&#128504;</a><a class='btndel' href='".$_SERVER['PHP_SELF']."?action=delete&id=".$todo['id']."'>&#10008;</a><br>");
if($todo['priority']==true){
        echo("<span class='prio'>пріоритет </span>");
}
echo("<span>".$todo['created-at']."</span>");
}
echo("</ul>");
}
?>
</div>