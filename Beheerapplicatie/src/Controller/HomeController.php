<?php
namespace App\Controller;

/**
 * Home controller
 */
class HomeController extends AppController
{

    /**
     * Initialize method
     *
     * @author Albert Veldman
     */
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('home');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     * @author Albert Veldman
     */
    public function index()
    {
    }
}
