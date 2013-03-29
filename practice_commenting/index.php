<!DOCTYPE html>
<?php
include 'connect.php';
$commentName = $_POST['comment_name'];
$comment = '<p>' . $_POST['comment'] . '</p>';
$submit = $_POST['submit'];

if ($submit){
    
    if($comment&&$commentName){
       $insert=mysql_query("INSERT INTO comment (comment_name,comment) Values ('$commentName','$comment')"); 
       header("Location: success.php"); 
    }
    else{
        
        echo 'Please fill out both fields';
    }
}
    

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="POST">
            <label for="comment_name">Comment Name:</label>
            <input name="comment_name" type="text">
            <label for="comment">Comment:</label>
            <textarea name="comment" type="text"></textarea>
            <input type="submit" name="submit" value="comment">
            
            <input type="button" name="button" value="Yes">
            
        </form>
        <?php
        $getquery=mysql_query("SELECT * From comment ORDER BY id DESC");
        while($rows=mysql_fetch_assoc($getquery)){
            
            $id=$rows['id'];
            $name=$rows['comment_name'];
            $comments=$rows['comment'];
            $delink="<a href=\"delete.php?id=" . $id ."\"> Delete </a>";
            
            
            echo $name. '<br />' . '<div style="width:300px;height:400px;background-color:grey;"> '. $comments .'</div>'. '<br />' . $delink . '<br />' . '<hr width="100px"/>';
            
        }
        
        ?>
     
    </body>
</html>
