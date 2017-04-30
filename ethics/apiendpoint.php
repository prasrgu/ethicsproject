<?php


$req = $_GET['q'];
$ree = $_GET['unit'];

        $req = strtolower($req);
        header('Content-Type: application/json');
        include('connection.php');

        if (!empty($req)){
            if(($req=="projects")) {
                if (empty($_GET['unit'])) {
                    $query = "SELECT * FROM  projects";
                    $result = mysqli_query($link, $query);
                    if (mysqli_num_rows($result) > 0) {
                        $count = 0;
                        while ($res = mysqli_fetch_assoc($result)) {

                            $prite[$count] = $res;
                            $count++;

                        }


                        $pry = json_encode($prite);
                        $pry = indent($pry);
                        echo $pry;
                    }
                    else{
                        $pry  = ["id"=>NULL,"title"=>NULL, "description" =>NULL, "submissionDate"=> NULL , "std_ID" => null, "ethics_form_ID"=>NULL, "message"=> "No Records Available" ];
                        echo $pry;
                    }



                }
                else {
                    $sel = "SELECT * FROM projects WHERE std_ID = '$ree'";
                    $les = mysqli_query($link, $sel);
                    if (mysqli_num_rows($les) > 0) {
                        $count = 0;
                        while ($prints = mysqli_fetch_assoc($les)) {

                            $prite[$count] = $prints;
                            $count++;

                        }
                        $pry = json_encode($prite);
                        $pry = indent($pry);
                        echo($pry);

                    }
                    else{
                        $pry= ["status"=> "200", "message" => "No Project with the student ID"];
                        echo $pry;
                    }

                }


            }elseif(($req == "students")  ){
                $query = "SELECT firstname, lastname, email, address, student_ID FROM  student";
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
                    $pry  = [ "firstname"=>NULL, "lastname" => NULL,  "email" =>NULL,  "address"=>NULL,  "student_ID"=>NULL, "message"=> "No Records Available"];
                    echo $pry;

                }

            }elseif(($req == "staff")){
                $query = "SELECT firstname, lastname, email,role, address, staff_ID FROM  staff";
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
                    $pry  = array("status code " => 200 ,"firstname"=>NULL, "lastname" => NULL,  "email" =>NULL,  "role"=>NULL,  "address"=>NULL,  "student_ID"=>NULL, "message"=> "No Records Available");
                    $pry = json_encode($pry);
                    echo $pry;
                }

            }
            else{
                $pry = array("status code " => 404 , "message"=> "Resource requested that does not exist");

                $pry = json_encode($pry);
                $pry = indent($pry);
                echo $pry;
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

