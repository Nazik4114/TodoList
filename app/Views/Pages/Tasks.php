<div >
<?php
echo("<ul>");
foreach(SortPrio(GetTodos())as $todo){
    if(!isComplete($todo)){
echo("<li>");
echo("<span>".$todo['body']."&nbsp;&nbsp;&nbsp;</span><a class='btn' href='".$_SERVER['PHP_SELF']."?action=complete&id=".$todo['id']."'>&#128504;</a><a class='btndel' href='".$_SERVER['PHP_SELF']."?action=delete&id=".$todo['id']."'>&#10008;</a><br>");
if($todo['priority']==true){
        echo("<span class='prio'>пріоритет </span>");
}
echo("<span>".$todo['created-at']."</span>");
echo("</li>");
}
echo("</ul>");
}
?>
</div>