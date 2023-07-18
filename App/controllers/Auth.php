<?php
ini_set("display_errors", "1") ;

class Auth extends Controller{

    function index(){
        $data = [

        ];
        $this->view('templates/header' , $data);
        $this->view('auth/login', $data);
        $this->view('templates/footer');

    }

    function RegisterPage(){
        $data = [

        ];
        $this->view('templates/header' , $data);
        $this->view('auth/register', $data);
        $this->view('templates/footer');
    }

    function Register(){

        if ($this->model('admin_model')->addAdmin($_POST) > 0) {
            Flasher::setFlash('Successfully','Added','success');
            header('location:' . BASEURL . '/Auth/RegisterPage');
            exit;
        }else {
            Flasher::setFlash('Failed','To Add','error');
            header('location:' . BASEURL . '/Auth/RegisterPage');
            exit;
        }
    }

    function Login(){

        if ($this->model('admin_model')->LoginAdmin($_POST) > 0) {
            header('location:' . BASEURL . '/Index');
            exit;
        }else {
            exit;
        }
    }

    function LogOut(){
        session_destroy();
        header('location:' . BASEURL . '/Auth/Register');
    }


}