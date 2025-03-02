
<?php
 require 'pgLogin.php';

//  if(isset($_POST['table']) && isset($_POST['value1'])){
//     echo '<pre>';
//     echo "Post Method Submitted ",htmlspecialchars(print_r($_POST, true)),"<br>";
//     $tablename = trim($_POST['table']);
//     $value1= trim($_POST['value1']);
//     if(!empty($tablename)&& !empty($value1)){
//             echo htmlspecialchars($tablename)," ",htmlspecialchars($value1),"<br>";
//             // addNewRecord($tablename,$value1);
//     } else{
//             echo "Missing Required data.";
//     }
// } elseif (isset($_GET['table']) && isset($_GET['value1'])){
//     echo '<pre>';
//     echo "GET Method Submitted ",htmlspecialchars(print_r($_GET, true)),"<br>";
//     $tablename = trim($_GET['table']);
//     $value1= trim($_GET['value1']);
//     if(!empty($tablename)&& !empty($value1)){
//             echo htmlspecialchars($tablename)," ",htmlspecialchars($value1), "<br>";
//             // addNewRecord($tablename,$value1);
//     } else{
//             echo "Missing Required data.";
//     } 
// } else{
//     echo "not set";
// }


function addNewRecord($table_name,$description,$fk_courseid){
    
        $row_count=count_records($table_name);

        $new_row =$row_count[0]+1;
        $description="{$description} {$new_row}";
        echo $description,"<br>";
        addRecord($table_name,$description,$fk_courseid);
        // print_table($table_name);
  
}

 function print_table($tableName){
        global $myPDO;
        // echo 'Connected successfully to ', $tableName , ' table <br>';
        

        if($tableName==='assignments'){
            $sql="SELECT * FROM $tableName ORDER BY id";
    
        }else{
            $sql="SELECT * FROM $tableName ORDER BY courseid";  
        }
       
        $result = $myPDO->query($sql);
        echo "PK   Description <br>";
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            if($tableName==='assignments'){
                echo "{$row['id']}, {$row['description']},<br>";
        
            }else{
                echo "{$row['courseid']}, {$row['coursename']},<br>"; 
            }

        // echo print_r($row); 
        }
    }

 function addRecord($table_name,$course_name,$fk_courseid){
    global $myPDO;

    if($table_name==='assignments'){
        $query='INSERT INTO assignments (description,courseid)
            VALUES (:descr,:fk_value)';
        
        $statement= $myPDO->prepare($query);
        $statement->bindValue(':descr',$course_name);
        $statement->bindValue(':fk_value',$fk_courseid);
        echo "New courseid is = $fk_courseid";

    }else{
        $query='INSERT INTO courses (coursename)
            VALUES (:descr)';
            $statement= $myPDO->prepare($query);
            $statement->bindValue(':descr',$course_name);
    }
    
    // $statement= $myPDO->prepare($query);
    // $statement->bindValue(':descr',$course_name);
    // echo"in add record the table is {$table_name} <br>";
    $statement->execute();
    $statement->closeCursor();
         
}
 function count_records($table_name){
    global $myPDO;
    if($table_name==='assignments'){
        $query='SELECT COUNT(*) FROM assignments';      
    }else{
        $query='SELECT COUNT(*) FROM courses'; 
    }


    $statement= $myPDO->prepare($query);
    $statement->execute();
    $count=$statement->fetch();
    $statement->closeCursor();
    echo "Total records in table {$table_name} is = $count[0] <br>";
     return $count ;   
}

 function check_if_record_exists($table_name,$fieldName,$value){
    global $myPDO;
    $query="SELECT COUNT(*) as count FROM {$table_name} where {$fieldName}={$value}";      
    
    $statement= $myPDO->prepare($query);
    $statement->execute();
    $found=$statement->fetch();
    $statement->closeCursor();
    echo "Total records found in table {$table_name} is = $found[0] <br>";
     return $found[0] ;   
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Tracker</title>
    <link rel="stylesheet" href="/view/css/main.css" >
</head>
<body>
 <!--<main class="main"> -->
 <h1>Learning How to Work with Postgres tables </h1>
 
<?php
 if(isset($_POST['table']) && isset($_POST['value1']) && isset($_POST['value2'])){
    echo '<pre>';
    echo "Post Method Submitted ",htmlspecialchars(print_r($_POST, true)),"<br>";
    $tablename = trim($_POST['table']);
    $value1= trim($_POST['value1']);
    $value2= trim($_POST['value2']);
    
    if(!empty($tablename)&& !empty($value1)){
            if($tablename==='assignments' && !empty($value2)){
                echo htmlspecialchars($tablename)," ",htmlspecialchars($value1),"<br>";
                $rec_exists=check_if_record_exists('courses','courseid',$value2);
                if($rec_exists){
                addNewRecord($tablename,$value1,$value2);
                print_table($tablename);
                }
            else {
                echo "Foreign key Value2 does not exist in parent table";
            }     

            }    
            else if($tablename==='courses') {  
                echo htmlspecialchars($tablename)," ",htmlspecialchars($value1),"<br>";
                addNewRecord($tablename,$value1,$value2);
                print_table($tablename);
            } 
            else{
                Echo"<h2>Missing Required Data in Assignments CourseID field</h2><br>";
            }
    } else{
        echo "<h2>Missing Required data.</h2>"; 
            // echo "Missing Required data.";
    }
} elseif (isset($_GET['table']) && isset($_GET['value1'])){
    echo '<pre>';
    echo "GET Method Submitted ",htmlspecialchars(print_r($_GET, true)),"<br>";
    $tablename = trim($_GET['table']);
    $value1= trim($_GET['value1']);
    if(!empty($tablename)&& !empty($value1)){
            echo htmlspecialchars($tablename)," ",htmlspecialchars($value1), "<br>";
            addNewRecord($tablename,$value1,$value2);
            print_table($tablename);
    } else{
        // <h2>Missing Required data.</h2>
        echo "<h2>Missing Required data.</h2>"; 
         
    } 
} else{
    echo "not set";
}

?>

   <!-- <?php
        // $table_name=$tablename;
        // print_table($tablename);
   ?> -->
    <!-- <?php
        // $row_count=count_records('courses');
        // $new_row =$row_count[0]+1;
        // $description="New course number {$new_row}";
        // add_course($description);
        // print_table($table_name);
    ?> -->

    
    <br>
    <!-- <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get"> -->
    <form action="index.php" method="post">
<!--<form action="#" method="get"> -->
<!-- <form action="Same Page" method="get"> -->
<!-- <form action="myTestDir/anotherPage.php" method="get"> -->
<!-- <form action="http://klaus-calc.onrender.com/index.php" method="get"> -->

  <label for="table">Choose a table:</label>
  <select id="table" name="table">
  <option value="">Select</option>
    <option value="courses">Courses</option>
    <option value="assignments">Assignments</option>
    
  </select><br>

<!-- <label for="table">Table Name:</label> 
<input type="text" id="table" name="table" autocomplete="off"><br> -->
<label for="value1">Course Description:</label> 
<input type="text" id="value1" name="value1" autocomplete="off"><br>
<label for="value2">Assignments CourseID:</label> 
<input type="text" id="value2" name="value2" autocomplete="off"><br>
<!-- <div class="buttons">
    <button type="submit">Submit</button>
    <button type="submit" formmethod="post">Submit Post</button>
    <button type="reset">Reset</button>
</div> -->
<input type="submit">
</form>




    <p> <a href=".">Back to List</a></p>

<!-- </main> -->
</body>

</html>