<?php
ini_set("display_errors", "1") ;

class Auth extends Controller{

    function index(){
        $data = [
            'title' => 'Login',
        ];
        $this->view('templates/header' , $data);
        $this->view('auth/login');
        $this->view('templates/footer');

    }

    function RegisterPage(){
        $data = [
            'title' => 'Register',
        ];
        $this->view('templates/header' , $data);
        $this->view('auth/register');
        $this->view('templates/footer');
    }

    function Register(){

        if ($this->model('Admin_model')->addAdmin($_POST) > 0) {
            Flasher::setFlash('Successfully Added','success');
            header('location:' . BASEURL . '/Auth');
            exit;
        }else {
            Flasher::setFlash('Failed To Add','error');
            header('location:' . BASEURL . '/Auth/RegisterPage');
            exit;
        }
    }

    function Login(){
        $this->model('Admin_model')->LoginAdmin($_POST);
    }

    function LogOut(){
        unset($_SESSION['user']);
        Flasher::setFlash('Successfully Log Out','success');
        header('location:' . BASEURL . '/Auth');
    }


}