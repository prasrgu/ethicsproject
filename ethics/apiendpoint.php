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

    $result = '';
    $pos = 0;
    $strLen = strlen($json);
    $indentStr = '  ';
    $newLine = "\n";
    $prevChar = '';
    $outOfQuotes = true;

    for ($i = 0; $i <= $strLen; $i++) {

        // Grab the next character in the string.
        $char = substr($json, $i, 1);

        // Are we inside a quoted string?
        if ($char == '"' && $prevChar != '\\') {
            $outOfQuotes = !$outOfQuotes;

            // If this character is the end of an element,
            // output a new line and indent the next line.
        } else if (($char == '}' || $char == ']') && $outOfQuotes) {
            $result .= $newLine;
            $pos--;
            for ($j = 0; $j < $pos; $j++) {
                $result .= $indentStr;
            }
        }

        // Add the character to the result string.
        $result .= $char;

        // If the last character was the beginning of an element,
        // output a new line and indent the next line.
        if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
            $result .= $newLine;
            if ($char == '{' || $char == '[') {
                $pos++;
            }

            for ($j = 0; $j < $pos; $j++) {
                $result .= $indentStr;
            }
        }

        $prevChar = $char;
    }

    return $result;
}

