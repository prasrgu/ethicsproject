<?php

$request_verb  = $_SERVER['REQUEST_METHOD'];
$requ = explode ("/", substr(@$_SERVER['PATH_INFO'], 1));
$requ = array_map('strtolower', $requ);
header('Content-Type: application/json');
include('connection.php');


if(isset($requ[0])) {

    switch ($request_verb) {
        case 'PUT':
            echo $requ;
            break;
        case 'POST':
            echo $requ;
            break;
        case 'GET':

            if( $requ[0]=='projects'||$requ[0]=='staff' || $requ[0]=='student') {
                if(count($requ)==1) {
                    $query = "SELECT * FROM {$requ[0]}";
                    $result = mysqli_query($link, $query);
                }
                elseif (count($requ)==2){
                    switch ($requ[0]){
                        case 'projects':
                            $arrr = ['title','std_ID', 'ethics_form_ID'];
                            unset($result);
                            foreach($arrr AS $value){
                                $query = "SELECT * FROM projects WHERE LOWER '('.{$value}.')' ='{$requ[1]}'";
                                $result=mysqli_query($link, $query);
                                if(mysqli_num_rows($result)>0)
                                    break;


                            }
                            unset($value);




                            break;
                        case 'staff':
                            break;
                        case 'student':
                            break;

                    }


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

            }


            break;
        case 'DELETE':
            echo $requ;
            break;
        default:
            echo "I do not understand You";


    }
}else{

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

