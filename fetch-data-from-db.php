<?php
  include 'db-config.php';

  $keyword = $_POST['keyword'];
  $selected_list = $_POST['selectedList'];
  
  if($keyword == ''){
    if($selected_list == 'all'){
      $sql = "SELECT t.ID,t.details, l.title, t.date_task, t.completed
              FROM tasks t 
              JOIN lists l ON l.ID = t.id_list";
    }else{
      $sql = "SELECT t.ID,t.details, l.title, t.date_task, t.completed
      FROM tasks t 
      JOIN lists l ON l.ID = t.id_list 
      WHERE t.id_list = '$selected_list'";
    }
  }else{ // based on keyword
    if($selected_list == 'all'){
      $sql = "SELECT t.ID,t.details, l.title, t.date_task, t.completed
              FROM tasks t 
              JOIN lists l ON l.ID = t.id_list
              WHERE t.details LIKE '%$keyword%'";
    }else{
      $sql = "SELECT t.ID,t.details, l.title, t.date, t.completed
              FROM tasks t 
              JOIN lists l ON l.ID = t.id_list 
              WHERE t.details LIKE '%$keyword%' && t.id_list = '$selected_list'";
    }
  }
  
  $result = $conn->query($sql);

    if($result->num_rows>0){
        $array_task = array();
        while($row = $result->fetch_assoc()){
            array_push($array_task,$row);
        }
        echo json_encode($array_task);
    }
  mysqli_close($conn);
?>