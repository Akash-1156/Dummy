<?php

namespace App\DataManipulation;

use PDO;
use PDOException;
use App\DbConnection\DbConnection as DB;

class DataManipulation extends DB
{
    public function selectLogin()
    {
        $sql = "SELECT * FROM tbprofile";
        $query = $this->conn->query($sql);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $res = $query->fetchAll();
        return $res;
    }

    public function emailIsExist($email)
    {
        $sql = "SELECT * FROM tbprofile where email= '" . $email . "' ";
        $query = $this->conn->query($sql);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $res = $query->fetch();
        return $res;
    }

    public $username, $email, $password, $id, $user_type, $code;
    public function setData($data)
    {
        if (array_key_exists('username', $data)) {
            $this->username = $data['username'];
        }
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('u_type', $data)) {
            $this->user_type = $data['u_type'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = $data['password'];
        }
        if (array_key_exists('emailToken', $data)) {
            $this->code = $data['emailToken'];
        }
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
    }

    public function insertRegisterData()
    {
        $encpass = md5($this->password);
        $dataArray = array($this->username, $this->email, $encpass, $this->id, $this->user_type, $this->code);
        $sql = "insert into tbprofile(USER_name, email, encpass, id, user_type, CODE, created_on)VALUES (?, ?, ?, ?, ?, ?, now())";
        $sth = $this->conn->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }

    public function emailIsExits($email)
    {
        $sql = "select email from users WHERE  email='" . $email . "'";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public  function varification($otp, $mail)
    {
        $sql = "select emailtoken from users WHERE email = '" . $mail . "' &&  emailtoken='" . $otp . "'";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public  function checkToken($mail, $otp)
    {
        $sql = "SELECT * FROM tbprofile WHERE email='" . $mail . "' and CODE = '" . $otp . "' ";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public  function tokenUpdate($mail, $otp)
    {
        $sql = "update tbprofile  set status = 1  WHERE email = '" . $mail . "' and code = '" . $otp . "' ";
        $res = $this->conn->exec($sql);
        return $res;
    }

    // login
    public  function checkUser($mail, $password)
    {

        $sql = "SELECT * FROM tbprofile WHERE email='" . $mail . "' and encpass = '" . $password . "' ";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public  function otpUpdate($mail, $token)
    {
        $sql = "update tbprofile  set code = '" . $token . "'  WHERE email = '" . $mail . "'";
        $status = $this->conn->exec($sql);
        return $status;
    }
    public  function updatePassword($mail, $pass)
    {
        $sql = "update tbprofile  set encpass = '" . $pass . "'  WHERE email = '" . $mail . "'";
        $status = $this->conn->exec($sql);
        return $status;
    }
    public  function recoverEmailToken($mail, $otp)
    {
        $sql = "select emailtoken from users WHERE email = '" . $mail . "' &&  recover='" . $otp . "'";
        $status = $this->conn->query($sql);
        $status->setFetchMode(\PDO::FETCH_OBJ);
        $data = $status->fetch();
        return $data;
    }
    public  function updateUserPassword($user_id, $re_pass)
    {
        $array = array($re_pass);
        $sql = "update  users set pass=? WHERE email ='" . $user_id . "'";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }

    public  function updateUserInfo($id, $name, $email, $image)
    {

        $sql = "update tbprofile set user_name='" . $name . "', image = '" . $image . "' WHERE email ='" . $email . "'";
        $status = $this->conn->exec($sql);
        return $status;
    }
    public  function updateUserData($id, $name, $email)
    {

        $sql = "update tbprofile set user_name='" . $name . "' WHERE email ='" . $email . "'";
        $status = $this->conn->exec($sql);
        return $status;
    }
    public function insertAreaData($name, $district, $postOffice,  $zipCode)
    {
        $dataArray = array($name, $district, $postOffice, $zipCode);
        $sql = "insert into tbarea(area_name, district, post_office, zip_code)VALUES (?, ?, ?, ?)";
        $sth = $this->conn->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }

    public function insertServiceData($name, $content, $image_url)
    {
        $dataArray = array($name, $content, $image_url);
        $sql = "insert into tbservice(title, content, feature_image)VALUES (?, ?, ?)";
        $sth = $this->conn->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }
    public function insertServiceDataWithOutImage($name, $content)
    {
        $dataArray = array($name, $content);
        $sql = "insert into tbservice(title, content)VALUES (?, ?, ?)";
        $sth = $this->conn->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }
    public  function selectService()
    {
        $sql = "SELECT * FROM tbservice";
        $query = $this->conn->query($sql);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $res = $query->fetchAll();
        return $res;
    }
    public  function selectArea()
    {
        $sql = "SELECT * FROM tbarea";
        $query = $this->conn->query($sql);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $res = $query->fetchAll();
        return $res;
    }
    public function addServiceData($user_id,  $holdername,$zipcode, $image, $area, $exp, $inc, $phno, $phno_2, $cardno, $cvcpwd, $expDate, $title, $description, $facebook, $twitter, $linkedin, $skyp, $service)
    {
        $dataArray = array($user_id, $zipcode, $area, $exp, $inc, $phno, $phno_2,  $holdername,$cardno, $cvcpwd, $expDate, $title, $description, $facebook, $twitter, $linkedin, $skyp, $service);
        $sql = "insert into tbuserservice(user_id,zipcode,AREA,experience,rate,contact_number,alt_contact_number,card_holder_name,card_number,cvc,exp_date,title,description,facebook, twitter, linkedin, skyp, first_service)VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?)";
        $sql1 = "update tbprofile set image='" . $image . "' WHERE user_id ='" . $user_id . "'";
        $status = $this->conn->exec($sql1);
        $sth = $this->conn->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }
    public  function checkService()
    {
        $sql = "SELECT u.*,s.* FROM tbprofile u INNER JOIN tbuserservice s ON s.user_id = u.user_id";
        $query = $this->conn->query($sql);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $res = $query->fetchAll();
        return $res;
    }
    public  function servicePaginateByProvider()
    {
        $sql = "SELECT u.*,s.* FROM tbprofile u INNER JOIN tbuserservice s ON s.user_id = u.user_id ";
        $query = $this->conn->query($sql);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $res = $query->fetchAll();
        return $res;
    }
    public  function servicePaginateByUser($user_id)
    {
        $sql = "SELECT u.*,s.* FROM tbprofile u INNER JOIN tbuserservice s ON s.user_id = u.user_id WHERE s.user_id = '".$user_id."'";
        $query = $this->conn->query($sql);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $res = $query->fetchAll();
        return $res;
    }
    public  function serviceProviderPaginateForUser($query)
    {
        $sql = "SELECT u.*,s.* FROM tbprofile u INNER JOIN tbuserservice s ON s.user_id = u.user_id where s.first_service = '".$query."'";
        $query = $this->conn->query($sql);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $res = $query->fetchAll();
        return $res;
    }
    public  function searchResults($query)
    {
        $sql = "SELECT * FROM tbservice WHERE title LIKE '$query%' OR content LIKE '$query%' ";
        $query = $this->conn->query($sql);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $res = $query->fetchAll();
        return $res;
    }
}
