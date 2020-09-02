<?php
require_once("../db/db.php");
require_once("../app/upload.php");
$db = new db();
// Takes an associate array containing course, room and break down(how many days a weak)
// course info elements
// element 0 course
// element 1 room
// element 2 breakdown
// element x
// element x
function schedule ($data){
    // An associate array to insert any course scheduled 
    $assigned = [];
    // A two demensional array report table cell status true/taken false/free
    // A 7 x 17 grid 
    $status = array_fill(0, 17 , array_fill(0, 7, 0));
    //data array size
    $size = count($data);

  
    function sectionAssign($courseInfo,&$assigned)
    {
        global $data;
        if(count($assigned) == 0)
        {
            // array contains weekdays 
            $assignedProperties = [];
            foreach($courseInfo as $arr){
                array_push($assignedProperties,$arr);
            }

            array_push($assigned,$assignedProperties);
        }
        $courseInfoSize = count($courseInfo);
        // for($i = 0; $i < $courseInfoSize; ++$i)
        // {
        //     $section = strval(rand(7,23));
        //     if (strlen($section) == 1 || strlen($section) == 2) {
        //         $section = (strlen($section) < 2 && strlen($section) >= 1) ?
        //         '0'.$section.$data[i][3].rand(0,7) :
        //         $section.$data[i][3].rand(0,7);
        //     } else {
        //         echo "Invalid section number creation";
        //     }
            
        //     $section = $section.rand(0,7).rand(1,2);
            
        //     array_push($data[$i],$section);
        // }
    }

    // if breakdown days is one
    // function breakDownToOneDay($courseInfo)
    // {
    //     return -1;
    // }

    // // if breakdow days is two
    // function breakDownToOneDay($courseInfo)
    // {
    //     return -1;
    // }


    // //implementation
    // for($i = 0; $i < size; ++$i)
    // {

    // }
    
    foreach($data as $i){
        sectionAssign($i,$assigned);
    }
    echo "<pre>";
    print_r($assigned);
    echo "</pre>";
}

?>