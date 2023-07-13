<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Composant;


class ComposantController extends Controller
{

    public function indexAction($param=null)
    {
        $composants = Composant::find();
        $this->view->setVar('composants', $composants);

    }

}

