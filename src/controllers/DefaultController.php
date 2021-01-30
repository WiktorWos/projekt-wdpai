<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function profile()
    {
        $this->renderIfLoggedIn('profile');
    }

    public function addTicket()
    {
        $this->renderIfLoggedIn('addTicket');
    }
}