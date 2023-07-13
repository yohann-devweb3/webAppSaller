<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Composant;
use Themys\Models\Module;


class ComposantController extends Controller
{

    public function indexAction($param=null)
    {
        $composants = Composant::find();

        // Charger les données du module pour chaque composant
        foreach ($composants as $composant) {
            $composant->getRelated('Module');
        }

        $this->view->setVar('composants', $composants);

    }

}

