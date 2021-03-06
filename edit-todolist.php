
<?php 
/* Konfiguration für die Datenbankverbindung*/
    include_once('config.php');
    include_once('database.php');

    if(empty($_GET['id'])){
        header('Location: index.php?error=Select at least one mytodos');
    }

    $sql = "SELECT * FROM mytodos WHERE `id` = ".$_GET['id'];
    $result = mysqli_query($db,$sql);
    $data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To-Do List</title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="container">
        <!--der process.php Ordner ist hier geposted werden!-->
        <form action="process.php" method="POST">
            <div class="todo-table">
                <h1>Bearbeiten(Edit) To-Do List</h1>
                <div class="form-elements">
                    <input type="text" name="title" required value="<?php echo $data['title']; ?>" placeholder="Schreiben Sie Ihre todos hier! &hearts;">
                </div>
                <input type="hidden" name="action" value="edited">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <button class="btn btn-primary"><i class="fa fa-save"></i>Save</button>
                <a href="index.php" class="btn btn-success"><i class="fa fa-arrow-left"></i>Back</a>
            </div>
        </form>
    </div>
</body>
</html>