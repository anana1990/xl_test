<?php
session_start();
require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

use Kreait\Firebase\Firebase;
use Kreait\Firebase\Query;

class Users
{
    protected $database;
    protected $db_name = 'users';
    protected $name;
    protected $lg;
    protected $isExist;

    public function __construct()
    {
        $account = ServiceAccount::fromJsonFile(__DIR__ . '/secret/php-tutorial-2830e-a5f046b0f63f.json');

        $fire_base = (new Factory())->withServiceAccount($account)->create();

        $this->database = $fire_base->getDatabase();
    }

    public function get($userID = NULL){

        if(empty($userID) || !isset($userID)) { return FALSE;}

        if ($this->database->getReference($this->db_name)->getSnapshot()->hasChild(($userID))){
            return $this->database->getReference($this->db_name)->getChild($userID)->getValue();
        } else {
            return FALSE;
        }

    }

    public function insert(array $data){

        if(empty($data) || !isset($data)) { return FALSE;}

        foreach ($data as $key => $value){
            $this->database->getReference()->getChild($this->db_name)->getChild($key)->set($value);
        }
        return TRUE;

    }

    public function delete($userID){

        if(empty($userID) || !isset($userID)) { return FALSE;}

        if ($this->database->getReference($this->db_name)->getSnapshot()->hasChild(($userID))){
            $this->database->getReference($this->db_name)->getChild($userID)->remove();
            return TRUE;
        } else {
            return FALSE;
        }

    }

    public function createAccount(array $data){

       $isExist = $this->isExistUser($data['email']);

       if($isExist === true){

           return ['isFound' => 'true', 'msg' => 'A user already exist with this email'];

       }else{

           $this->database->getReference($this->db_name)->push($data);
           return ['email' => $data['email'], 'password' => $data['password'], 'msg' => 'User created', 'isFound' => 'false'];

       }


    }

    public function loginUser( string $email, string $passowrd){

        $user = $this->database->getReference('users')->getValue();

        $this->lg = false;


        foreach ($user as $key => $value){

            if($value['email'] == $email && $value['password'] == $passowrd){
                $this->lg = true;
                $this->name = $value['firstname'] . ' ' . $value['lastname'];
            }

        }

        if($this->lg === TRUE){
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $this->name;
        }

        return $this->lg;

    }

    public function isExistUser(string $email){

        $this->isExist = false;

        $user = $this->database->getReference('users')->getValue();

        foreach ($user as $key => $value){

            if($value['email'] == $email){

                $this->isExist = TRUE;

            }

        }

        return $this->isExist;
    }

    public function logout(){

        if (isset($_SESSION['email'])) {

            unset($_SESSION['email']);
            unset($_SESSION['name']);
            session_destroy();

            return array('status'=>200, 'message'=>'User Logout Successfully');
        }
        return array('status'=>303, 'message'=>'Logout Fail');

    }

}
