<?php

$request_verb = $_SERVER['REQUEST_METHOD'];
$requ = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
$requ = array_map('strtolower', $requ);
header('Content-Type: application/json');
include('connection.php');


if (isset($requ[0])) {

    switch ($request_verb) {
        case 'PUT':
            if ((count($requ) < 6) && ($requ[0] == 'projects' || $requ[0] == 'staff' || $requ[0] == 'student')) {


                $query = "UPDATE {$requ[0]} SET {$requ[1]} = '{$requ[2]}' WHERE {$requ[3]} = '{$requ[4]}'";


                $result = mysqli_query($link, $query);

            } else {

            }


            break;
        case 'POST':
            if ((count($requ) == 7 || count($requ) == 8) && ($requ[0] == 'projects' || $requ[0] == 'staff' || $requ[0] == 'student')) {
                switch ($requ[0]) {
                    case 'projects':
                        $query = "INSERT INTO {$requ[0]} VALUES ('{$requ[1]}', '{$requ[2]}', '{$requ[3]}', '{$requ[4]}' , '{$requ[5]}', '{$requ[6]}' ) ";
                        break;
                    case 'staff':
                        $query = "INSERT INTO {$requ[0]} VALUES ('{$requ[1]}', '{$requ[2]}', '{$requ[3]}', '{$requ[4]}' , '{$requ[5]}', '{$requ[6]}', '{$requ[7]}'  ) ";
                        break;
                    case 'student':
                        $query = "INSERT INTO {$requ[0]} VALUES ('{$requ[1]}', '{$requ[2]}', '{$requ[3]}', '{$requ[4]}' , '{$requ[5]}', '{$requ[6]}' ) ";
                        break;

                }

                $result = mysqli_query($link, $query);

            } else {

            }
            break;
        case 'GET':

            if ($requ[0] == 'projects' || $requ[0] == 'staff' || $requ[0] == 'student') {
                if (count($requ) == 1) {
                    $query = "SELECT * FROM {$requ[0]}";
                    $result = mysqli_query($link, $query);
                } elseif (count($requ) == 2) {
                    switch ($requ[0]) {
                        case 'projects':
                            $arrr = ['title', 'std_ID', 'ethics_form_ID'];
                            break;
                        case 'staff':
                            $arrr = ['staff_ID', 'role', 'firstname', 'lastname'];
                            break;
                        case 'student':
                            $arrr = ['student_ID', 'firstname', 'lastname'];
                            break;

                    }
                    unset($result);
                    foreach ($arrr AS $value) {
                        $query = "SELECT * FROM $requ[0] WHERE $value ='{$requ[1]}'";
                        $result = mysqli_query($link, $query);
                        if (mysqli_num_rows($result) > 0)
                            break;

                    }
                    unset($value);
                    unset($arrr);
                }

            }


            break;
        case 'DELETE':
            if ($requ[0] == 'projects' || $requ[0] == 'staff' || $requ[0] == 'student') {
                if (count($requ) == 1) {
                    $query = "DELETE * FROM {$requ[0]}";
                    $result = mysqli_query($link, $query);
                } elseif (count($requ) > 1 && count($requ) < 5) {
                    unset($value);
                    unset($arrr);
                    switch ($requ[0]) {
                        case 'projects':
                            $arrr = ['title', 'std_ID', 'ethics_form_ID'];
                            break;
                        case 'staff':
                            $arrr = ['staff_ID'];
                            break;
                        case 'student':
                            $arrr = ['student_ID'];
                            break;

                    }

                }
                unset($result);
                foreach ($arrr AS $value) {
                    $query = "DELETE FROM $requ[0] WHERE $value ='{$requ[1]}'";
                    $result = mysqli_query($link, $query);
                    if (mysqli_num_rows($result) > 0)
                        break;


                }


            }
            break;
        default:
            echo "Invalid query";


    }


    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while ($res = mysqli_fetch_assoc($result)) {
            $prite[$count] = $res;
            $count++;

        }


        $pry = json_encode($prite);
        $pry = indent($pry);
        echo $pry;
    } else {

        /*
        $pry = ["id" => NULL, "title" => NULL, "description" => NULL, "submissionDate" => NULL, "std_ID" => null, "ethics_form_ID" => NULL, "message" => "No Records Available"];
        echo $pry;
        */
    }
} else {

}


function indent($json)
{

    $quo = '';
    $pos = 0;
    $strLen = strlen($json);
    $indentStr = '  ';
    $newLine = "\n";
    $prevChar = '';
    $outOfQuotes = true;

    for ($i = 0; $i <= $strLen; $i++) {


        $char = substr($json, $i, 1);


        if ($char == '"' && $prevChar != '\\') {
            $outOfQuotes = !$outOfQuotes;


        } else if (($char == '}' || $char == ']') && $outOfQuotes) {
            $quo .= $newLine;
            $pos--;
            for ($j = 0; $j < $pos; $j++) {
                $quo .= $indentStr;
            }
        }


        $quo .= $char;


        if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
            $quo .= $newLine;
            if ($char == '{' || $char == '[') {
                $pos++;
            }

            for ($j = 0; $j < $pos; $j++) {
                $quo .= $indentStr;
            }
        }

        $prevChar = $char;
    }

    return $quo;
}

