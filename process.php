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

                $sql = "INSERT INTO mytodos ('title') VALUES ('".$_POST['title']."')";

                $result = mysqli_query($db, $sql);
                
                if($result !== false){
                    
                        header('Location: index.php?success=New mytodos added');
                }
                break;

            case'delete';

                 if(empty($_POST['todo'])){
                    header('Location: index.php?error=Select at least one mytodos');
                }

                $sql = "DELETE FROM mytodos WHERE id = ('".$_POST['todo']."')";

                $result = mysqli_query($db, $sql);
                
                if($result !== false){
                    
                        header('Location: index.php?success= mytodos deleted');
                }
                break;

            case'complete';

                 if(empty($_POST['todo'])){
                    header('Location: index.php?error=Select at least one mytodos');
                }

                $sql = "UPDATE mytodos SET 'status' = 1 ('".$_POST['todo']."')";

                $result = mysqli_query($db, $sql);
                
                if($result !== false){
                    
                        header('Location: index.php?success= mytodos is completed');
                }
                break;

             case'pending';

                 if(empty($_POST['todo'])){
                    header('Location: index.php?error=Select at least one mytodos');
                }

                $sql = "UPDATE mytodos SET 'status' = 0 ('".$_POST['todo']."')";

                $result = mysqli_query($db, $sql);
                
                if($result !== false){
                    
                        header('Location: index.php?success= mytodos is pending');
                }
                break;
             case'edited';
                 if(empty($_POST['id'])){
                    header('Location: index.php?error=Select at least one todo');
                }

                $sql = "UPDATE mytodos SET 'title' = '".$_POST['title']."' WHERE id = ('".$_POST['id']."';

                $result = mysqli_query($db, $sql);
                
                if($result !== false){
                    
                        header('Location: index.php?success= mytodos updated');
                }
                break;


            case'edit';
                 if(empty($_POST['todo'])){
                    header('Location: index.php?error=Select at least one mytodos');
                }
                    header('Location: edit-todo.php?id='.$_POST['todo']);
                }
                break;


        }

   }

?>

