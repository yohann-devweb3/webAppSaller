<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Chefdeprojet;


class ChefdeprojetController extends Controller
{

    public function indexAction($param=null)
    {
        $chefdeprojets = Chefdeprojet::find();
        $this->view->setVar('chefdeprojets', $chefdeprojets);

    }

}

