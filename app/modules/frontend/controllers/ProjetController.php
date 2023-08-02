<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Application;
use Themys\Models\Projet;
use Themys\Models\Equipe;

class ProjetController extends Controller
{
    public function indexAction($param=null)
    {
        $projetsData = [];



        // Charger les données du module pour chaque client
        foreach (Projet::find() as $projet) {
            $id = $projet->getId();
            $libelle = $projet->getLibelle();
            $prix = $projet->getPrix();
            $status = $projet->getTranslateStatut();
            $idApplication = $projet->Application->getNom();
            $idChefDeProjet = $projet->Chefdeprojet->getNomPrenom();
            $idClient = $projet->Client->getNom();

            // Ajouter les données du client au tableau $clientData
            $projetsData[] = [
                'id' => $id,
                'libelle' => $libelle,
                'prix' => $prix,
                'status' => $status,
                'idApplication' => $idApplication,
                'idChefDeProjet' => $idChefDeProjet,
                'idClient' => $idClient
            ];
        }
        $this->view->setVar('projets', $projetsData);
        // Charger la vue
        $this->view->pick('projet/index');
    }

}

