<?php

   include_once('config.php');
   include_once('database.php'); 

   print_r($_POST);
   
   if(isset($_POST['action'])){
        switch($_POST['action']){
            case 'add':


                if(empty($_POST['title'])){
                    header('Location: add-todolist.html');
                }
                $title = mysqli_real_escape_string($db, $_POST['title']);
                $sql = "INSERT INTO mytodos (title, status) VALUES ('".$title."', 0)";
                
                $result = mysqli_query($db, $sql);
                
                if($result !== false){
                    
                    header('Location: index.php?success=New mytodos added');
                }
                break;

            case'delete':

                 if(empty($_POST['todo'])){
                    header('Location: index.php?error=Select at least one mytodos');
                }
                $id = mysqli_real_escape_string($db, $_POST['todo']);
                $sql = "DELETE FROM mytodos WHERE id = ('".$id."')";

                $result = mysqli_query($db, $sql);
                
                if($result !== false){
                    
                        header('Location: index.php?success= mytodos deleted');
                }
                break;

            case'complete':

                 if(empty($_POST['todo'])){
                    header('Location: index.php?error=Select at least one mytodos');
                }
                $id = mysqli_real_escape_string($db, $_POST['todo']);
                $sql = "UPDATE mytodos SET status = 1 WHERE id = "  . $id;
                
                $result = mysqli_query($db, $sql);
                
                if($result !== false){
                    
                        header('Location: index.php?success= mytodos is completed');
                }
                break;

             case'pending':

                 if(empty($_POST['todo'])){
                    header('Location: index.php?error=Select at least one mytodos');
                }
                $id = mysqli_real_escape_string($db, $_POST['todo']);
                $sql = "UPDATE mytodos SET status = 0 WHERE id = "  . $id;
                
                $result = mysqli_query($db, $sql);
                
                if($result !== false){
                    
                        header('Location: index.php?success= mytodos is pending');
                }
                break;
             case'edited':
                 if(empty($_POST['id'])){
                    header('Location: index.php?error=Select at least one todo');
                }
                $id = mysqli_real_escape_string($db, $_POST['id']);
                $title = mysqli_real_escape_string($db, $_POST['title']);
                $sql = "UPDATE mytodos SET  title = '" . $title . "' WHERE id = " .  $id;
                
                $result = mysqli_query($db, $sql);
                
                if($result !== false){
                    
                        header('Location: index.php?success= mytodos updated');
                }
                break;


            case'edit':
                 if(empty($_POST['todo'])){
                    header('Location: index.php?error=Select at least one mytodos');
                } else {
                    header('Location: edit-todolist.php?id='.$_POST['todo']);
                }
                break;


        }

   }

?>

