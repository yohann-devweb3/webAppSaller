<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Chefdeprojet;
use Themys\Models\Collaborateur;

class ChefdeprojetController extends Controller
{

    public function indexAction($param=null)
    {
        $chefdeprojetsData = [];

        // Charger les données du module pour chaque client
        foreach (Chefdeprojet::find() as $chefdeprojet) {
            $id = $chefdeprojet->getId();
            $boost_production = $chefdeprojet->getBoostProduction();
            $nom_prenom = $chefdeprojet->getNomPrenom();
            $idCollaborateur = $chefdeprojet->Collaborateur->getNom() . ' ' .$chefdeprojet->Collaborateur->getPrenom() ;
            // Ajouter les données du client au tableau $clientData
            $chefdeprojetsData[] = [
                'id' => $id,
                'boost_production' => $boost_production,
                'nom_prenom' => $nom_prenom,
                'idCollaborateur' => $idCollaborateur
            ];
        }

        $this->view->setVar('chefdeprojets', $chefdeprojetsData);
        // Charger la vue
        $this->view->pick('chefdeprojet/index');
    }

}

