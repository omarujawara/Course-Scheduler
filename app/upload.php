<?php
require_once("../utility/schedule.php");
require_once("../db/db.php");
if(isset($_REQUEST['upload'])){
    if(!$_FILES['file']['error']){
        // $data = [];
        $file = fopen($_FILES['file']['tmp_name'],'r');
        while($row = fgetcsv($file)){
            $data[] = $row;
        }
        // call schedule function here and pass $data as parameter
        // schedule($data);
        $db = new db();
        $db->clear();
        foreach($data as $course_info){
            $db->insert($course_info[0],$course_info[1],$course_info[2]);
        }
        header("Location: http://" . $_SERVER['HTTP_HOST']."/app/table.php");
        exit();
    }
    else{
        echo "FILE ERROR"."<br/>";
    }
}
else {
    echo "FILE UPLOADING ERROR"."<br/>";
}
?>