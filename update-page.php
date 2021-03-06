<?php
 include 'db-config.php';
 $ID_task = intval($_GET['ID']);

 $sql = "SELECT tasks.details
          FROM tasks
          WHERE tasks.ID='$ID_task'";
 $result = mysqli_query($conn,$sql);
 $data = mysqli_fetch_array($result);
?>

<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/2696e4d99a.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/css/index.css" type="text/css">
  <title>Update Task</title>
</head>
<body>
  <form id="update-task-form">
    <input class="field" type="text" name="task" value="<?=$data['details']?>">
    <input class="field" type="date" name="date-task" >
    <select class="field" name="list">
      <?php include 'task-lists.php';?>
    </select>
    <input type="hidden" value="<?=$ID_task?>" name="id_task">
    <button class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
  </form>

  <script>
    $(document).ready(()=>{
      $('#update-task-form').submit(updateTask);
    })
  </script>
  <script src="assets/js/dynamic-page.js"></script>
</body>
</html>

