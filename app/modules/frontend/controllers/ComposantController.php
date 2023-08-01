<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Application;
use Themys\Models\Composant;
use Themys\Models\Module;


class ComposantController extends Controller
{

    public function indexAction($param = null)
    {
        $composantsData = [];

        $composants = Composant::find();

        // Charger les données du module pour chaque composant

        foreach ($composants as $composant) {

            $id = $composant->getId();
            $type = $composant->getTypeLibelle();
            $charge = $composant->getCharge();
            $progression = $composant->getProgression();
            $libelle = $composant->getLibelle();
            $libelleModule = $composant->getLibelleModule();

            // Ajouter les données du composant au tableau $composantsData
            $composantsData[] = [
                'id' => $id,
                'type' => $type,
                'charge'=>$charge,
                'progression'=>$progression,
                'libelle'=>$libelle,
                'libelleModule'=>$libelleModule
            ];
        }

        $this->view->setVar('composants', $composantsData);
        // Charger la vue
        $this->view->pick('composant/index');
    }


}

