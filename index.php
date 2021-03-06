

<?php
/*Konfiguration für die Datenverbindung*/
    include_once('config.php');
    include_once('database.php');
?>

<!-- Verwenden Sie ein HTML-Formular, um einen neuen Eintrag in der PHP zu erstellen-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List </title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="container">
        <form action="process.php" method="POST">
            <div class="todo-table">
                <h1>Mein To-Do List</h1>
                <!-- Hier Ihre Aufgaben sind  als completed(fertig) oder pending(noch nicht fertig) definiert werden-->
                <h4><?php
                     $sql = "SELECT * FROM mytodos";
                            $result = mysqli_query($db,$sql);
                            $mytodos = mysqli_fetch_all($result);
                            $total = count($mytodos);
                            $complete = 0;
                            //mysqli_bind_param()
                            foreach($mytodos as $todo){

                                if($todo[2]==true){
                                    $complete++;
                                }
                            }
                            echo $total." Total, ".$complete." Complete,".($total-$complete)." Pending.";
                    ?>
                </h4>
                <div class="btn-holder">
                    <a href="add-todolist.html" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Todo</a>
                    <button name="action" value="edit" class="btn btn-secondary"><i class="fa fa-edit"></i> Edit To-Do List</button>
                    <button name="action" value="delete" class="btn btn-danger"><i class="fa fa-times"></i> Delete To-Do List</button>
                    <button name="action" value="complete" class="btn btn-purple"><i class="fa fa-thumbs-up"></i> Mark Complete</button>
                    <button name="action" value="pending" class="btn btn-orange"><i class="fa fa-thumbs-down"></i> Mark Pending</button>
                </div>
                <p class="margin-top: 15px;">
                    <?php if(!empty($_GET['error'])) echo "Error : ".$_GET['error']; ?>
                    <?php if(!empty($_GET['success'])) echo "Success : ".$_GET['success']; ?>
                </p>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>To-Do List Title</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($mytodos as $todo){
                        ?>
                             <tr class="<?php echo $todo[2]?'complete':''; ?>">
                                <td><input  type="radio" required name="todo" value="<?php echo $todo[0]; ?>" id=""></td>
                                <td><?php echo $todo[1]; ?></td>
                                <td><?php echo $todo[2]?'Complete':'Pending'; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</body>
</html>