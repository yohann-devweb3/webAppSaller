<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Equipe;
use Themys\Models\Module;


class EquipeController extends Controller
{
    public function indexAction($param=null)
    {
        $equipeData = [];

        // Charger les données du module pour chaque client
        foreach (Equipe::find() as $equipe) {
            $id = $equipe->getId();
            $libelle = $equipe->getLibelle();
            $idChefDeProjet= $equipe->Chefdeprojet->getNomPrenom();

            // Ajouter les données du client au tableau $clientData
            $equipeData[] = [
                'id' => $id,
                'libelle' => $libelle,
                'idChefDeProjet'=> $idChefDeProjet
            ];
        }

        $this->view->setVar('equipes', $equipeData);
        // Charger la vue
        $this->view->pick('equipe/index');

    }

}

