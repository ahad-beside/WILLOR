<?php
include 'db.php';

function getCategoryName($id){
     global $conn;
     $query = "select * from categories where id = '$id'";
     $run = mysqli_query($conn, $query);
     if(mysqli_num_rows($run)> 0){
         $row = mysqli_fetch_array($run);
         $name = $row['name'];
         return $name;
    }else{
         return '';
     }
}

function getPlaceName($id, $type){
     global $conn;
     $query = "select * from $type where id = '$id'";
     $run = mysqli_query($conn, $query);
     if(mysqli_num_rows($run)> 0){
         $row = mysqli_fetch_array($run);
         $name = $row['name'];
         return $name;
    }else{
         return '';
     }
}

function getAccountDetails($id){
     global $conn;
     $query = "select * from accounts where id = '$id'";
     $run = mysqli_query($conn, $query);
     if(mysqli_num_rows($run)> 0){
         $row = mysqli_fetch_array($run);
         return $row;
    }
}

function getCvDetails($id){
     global $conn;
     $query = "select * from cvs where id = '$id'";
     $run = mysqli_query($conn, $query);
     if(mysqli_num_rows($run)> 0){
         $row = mysqli_fetch_array($run);
         return $row;
    }
}



function getStates($id){
     global $conn;
     $options = '';
     $query = "select * from states order by name asc";
     $run = mysqli_query($conn, $query);
     while($row = mysqli_fetch_array($run)){
         if($id==$row['id']){
             $options.= "<option selected value='".$row['id']."'>".$row['name']."</option>";
         }else{
             $options.= "<option value='".$row['id']."'>".$row['name']."</option>";
         }
             
     }
     
      return $options;
}

function getDistricts($stateid, $districtid){
     global $conn;
     $options = '';
     $query = "select * from districts where stateid='$stateid' order by name asc";
     $run = mysqli_query($conn, $query);
     while($row = mysqli_fetch_array($run)){
        if($districtid==$row['id']){
             $options.= "<option selected value='".$row['id']."'>".$row['name']."</option>";
         }else{
             $options.= "<option value='".$row['id']."'>".$row['name']."</option>";
         }
     }
     
      return $options;
}

function getCities($districtid, $cityid){
     global $conn;
     $options = '';
     $query = "select * from cities where districtid='$districtid' order by name asc";
     $run = mysqli_query($conn, $query);
     while($row = mysqli_fetch_array($run)){
         if($cityid==$row['id']){
             $options.= "<option selected value='".$row['id']."'>".$row['name']."</option>";
         }else{
             $options.= "<option value='".$row['id']."'>".$row['name']."</option>";
         }
     }
     
      return $options;
}

function getPlacesWithSelect($type, $id){
     global $conn;
     $options = '';
     $query = "select * from places where type = '$type'";
     $run = mysqli_query($conn, $query);
     while($row = mysqli_fetch_array($run)){
         if($row['id']==$id){
             $options.= "<option selected value='".$row['id']."'>".$row['name']."</option>";
         }else{
             $options.= "<option value='".$row['id']."'>".$row['name']."</option>";
         }
             
     }
     
      return $options;
}


function validate($value){
    global $conn;
    $value = mysqli_real_escape_string($conn, preg_replace("/[^ \w]+/", "", htmlentities(strip_tags($value))));
    return $value;
}

function pvalidate($value){
    global $conn;
    $value = mysqli_real_escape_string($conn, htmlentities(strip_tags($value)));
    return $value;
}


function getExpiryDate($validity){
     global $conn;
     $query = "select * from plan where id = '$validity'";
     $run = mysqli_query($conn, $query);
     $row = mysqli_fetch_array($run);
     $duration = $row['datecode'];
     $expirydate = date('Y-m-d', strtotime("+$duration", strtotime(date('Y-m-d'))));
     return $expirydate;
}

function getPlanName($id){
     global $conn;
     $query = "select * from plan where id = '$id'";
     $run = mysqli_query($conn, $query);
     $row = mysqli_fetch_array($run);
     return $row['datecode'];
}

function getAccountInfo($id){
     global $conn;
     $query = "select * from accounts where id = '$id'";
     $run = mysqli_query($conn, $query);
     $row = mysqli_fetch_array($run);
     return $row['email'];
}


function checkBookmark($cvid){
     global $conn;
     $ip = $_SERVER['REMOTE_ADDR'];
     $query = "select * from bookmarks where cvid = '$cvid' AND ip='$ip'";
     $run = mysqli_query($conn, $query);
     if(mysqli_num_rows($run)>0){
         return 1;
     }else{
         return 0;
     }
}

function checkBookmarkUser($cvid, $uid){
     global $conn;
     $query = "select * from bookmarks where cvid = '$cvid' AND accountid='$uid'";
     $run = mysqli_query($conn, $query);
     if(mysqli_num_rows($run)>0){
         return 1;
     }else{
         return 0;
     }
}

function getPlanPrice($id){
    global $conn;
    $query = "select price from plan where id = '$id'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
    return $row['price'];
}

function bookmarks(){
     global $conn;
     $ip = $_SERVER['REMOTE_ADDR'];
     $query = "select * from bookmarks where ip='$ip'";
     $run = mysqli_query($conn, $query);
     return mysqli_num_rows($run);
}

function Userbookmarks($uid){
     global $conn;
     $query = "select * from bookmarks where accountid='$uid'";
     $run = mysqli_query($conn, $query);
     return mysqli_num_rows($run);
}



?>