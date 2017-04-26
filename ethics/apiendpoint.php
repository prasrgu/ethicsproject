<?php


$req = $_GET['que'];

        header('Content-Type: application/json');
        include('connection.php');

        if (!empty($req)){
            if(($req=="projects")) {
                $query = "SELECT * FROM  projects";
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result)>0) {
                 $res=  mysqli_fetch_assoc($result);
                        $pry=json_encode($res);
                    echo $pry;
                }else{

                }

            }elseif(($req = "students")  ){
                $query = "SELECT * FROM  student";
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result)>0) {
                    $res=  mysqli_fetch_assoc($result);
                    $pry=json_encode($res);
                    echo $pry;
                }else{

                }

            }elseif(($req = "staff") ||($req=="Staff")|| ($req=="STAFF")){
                $query = "SELECT * FROM  staff";
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
