<?php
declare(strict_types=1);

namespace Themys\Modules\Frontend\Controllers;

use Themys\Models\Projet;
use Themys\Mvc\Controller;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

        // Exemple avec la méthode find()
        $projets = Projet::find();

        $this->view->setVar('$projets', $projets);


    }

}

