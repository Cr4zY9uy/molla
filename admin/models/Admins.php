<?php
require_once "../config/connect.php";
class Admins
{
    public static function getAll(){
        global $cont;
        $sql = "SELECT * FROM admin";
        $result = mysqli_query($cont,$sql);
        $data = [];
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
        }
        return $data;
    }
    public static function getById($id){
        global $cont;
        $sql = "SELECT * FROM admin where id = ".$id;
        $result = mysqli_query($cont,$sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                return $row;
            }
        }
    }

    public static function add($username,$password,$role){
        global $cont;
        $sql = "INSERT INTO admin(username,password,role) value('$username','$password',$role)";
        if(mysqli_query($cont,$sql)){
            return true;
        }
        return false;
    }

    public static function deleteById($id){
        global $cont;
        $sql = "DELETE FROM admin where id=$id";
        if(mysqli_query($cont,$sql)){
            return true;
        }
        return false;
    }

    public static function updateRole($id,$role){
        global $cont;
        $sql = "UPDATE admin set role= $role where id=$id";
        if(mysqli_query($cont,$sql)){
            return true;
        }
        return false;
    }

    public static function updatePass($id,$password){
        global $cont;
        $sql = "UPDATE admin set password= '$password' where id=$id";
        if(mysqli_query($cont,$sql)){
            return true;
        }
        return false;
    }
    public static function checkrole($id){
        global $cont;
        $sql="SELECT * FROM admin WHERE id= $id";
        $result= mysqli_query($cont,$sql);
        $row= mysqli_fetch_assoc($result);
        if($row["role"]==1){
            return true;
        } 
        return false;
    }
}
?>