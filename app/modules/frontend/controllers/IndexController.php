<?php
declare(strict_types=1);

namespace Themys\Modules\Frontend\Controllers;

use Themys\Models\Projet;
use Themys\Mvc\Controller;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

        $projetsData = [];

        // Charger les données du module pour chaque client
        foreach (Projet::find() as $projet) {
            $id = $projet->getId();
            $libelle = $projet->getLibelle();
            $prix = $projet->getPrix();
            $status = $projet->getTranslateStatut();
            $idApplication = $projet->Application->getNom();

            // Ajouter les données du client au tableau $clientData
            $projetsData[] = [
                'id' => $id,
                'libelle' => $libelle,
                'prix' => $prix,
                'status' => $status,
                'idApplication' => $idApplication
            ];
        }

        $this->view->setVar('projets', $projetsData);
        // Charger la vue
        $this->view->pick('index/index');
    }

    public function jouer(){

    }

}

