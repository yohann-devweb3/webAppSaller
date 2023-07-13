<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Client;


class ClientController extends Controller
{
    public function indexAction($param=null)
    {
        $clients = Client::find();
        $this->view->setVar('clients', $clients);

    }

}

