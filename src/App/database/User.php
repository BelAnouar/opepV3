<?php

declare(strict_types=1);

namespace App\database;

require_once "./../services/AuthService.php";


use Services\AuthService;

class User
{
    private AuthService $userService;

     public function __construct()
     {
         $this->userService=new AuthService();
     }

    public function register($firstName, $lastName, $email, $password)
    {


       $countUser= $this->userService->getUsersByEmail($email);

       if($countUser["num"]<1) {
           $this->userService->register($firstName, $lastName, $email, $password);
           header("Location: login.php");
       }else {
           echo "the user is already Registered";
       }
    }


    public  function login($email,$password){


            $this->userService->login($email, $password);

     }
     public function UpdateRole($status,$role){



           $this->userService->UpdateRoleByIdUser($status, $role);



        }
        public function getUsers(){
         return  $this->userService->getUsers();
        }





}
