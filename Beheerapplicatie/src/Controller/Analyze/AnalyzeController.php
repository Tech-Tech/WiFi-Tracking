<?php
namespace App\Controller\Analyze;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Manage Controller
 */
class AnalyzeController extends AppController
{

    /**
     * Initialize method
     *
     * @author Albert Veldman
     */
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('analyze');
    }


    /**
     * Index method
     *
     * @author Albert Veldman
     */
    public function index() {

    }
}
