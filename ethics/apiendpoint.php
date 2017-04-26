<?php


$req = $_GET['que'];

        header('Content-Type: application/json');
        include('connection.php');

        if (!empty($req)){
            if(($req=="projects")) {
                $query = "SELECT * FROM  projects";
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result)>0) {
                    $count= 0;
                while( $res=  mysqli_fetch_assoc($result)){

                    $prite[$count]=$res;
                    $count++;

                }


                        $pry=json_encode($prite);
                        $pry = indent($pry);
                    echo $pry;
                }else{

                }

            }elseif(($req = "students")  ){
                $query = "SELECT firstname, lastname, email, address, student_ID FROM  student";
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result)>0) {
                    $res=  mysqli_fetch_assoc($result);
                    $pry=json_encode($res);
                    echo $pry;
                }else{

                }

            }elseif(($req = "staff") ||($req=="Staff")|| ($req=="STAFF")){
                $query = "SELECT firstname, lastname, email,role, address, staff_ID FROM  staff";
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result)>0) {
                    $res=  mysqli_fetch_assoc($result);
                    $pry=json_encode($res);
                    echo $pry;
                }else{

                }

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

