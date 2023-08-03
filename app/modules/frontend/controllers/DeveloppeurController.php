<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Collaborateur;
use Themys\Models\Developpeur;
use Themys\Models\Projet;

class DeveloppeurController extends Controller
{

    public function indexAction($param=null)
    {
        $developpeursData = [];

        // Charger les données du module pour chaque client
        foreach (Developpeur::find() as $developpeur) {

            // Ajouter les données du client au tableau $clientData
            $developpeursData [] = [
                'id' => $developpeur->getId(),
                'competence' => $developpeur->getTranslateCompetence(),
                'indiceProduction'=> $developpeur->getIndiceProduction(),
                'idEquipe' => $developpeur->Equipe->getLibelle(),
                'idCollaborateur'=> $developpeur->Collaborateur->getNom(). " ".$developpeur->Collaborateur->getPrenom()
            ];
        }

        $this->view->setVar('developpeurs', $developpeursData);
        // Charger la vue
        $this->view->pick('developpeur/index');

    }

}

