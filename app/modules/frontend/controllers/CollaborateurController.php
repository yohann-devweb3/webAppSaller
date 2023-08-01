<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Collaborateur;
use Themys\Models\Projet;

class CollaborateurController extends Controller
{

    public function indexAction($param=null)
    {
        $collaborateursData = [];

        // Charger les données du module pour chaque client
        foreach (Collaborateur::find() as $collaborateur) {
            $id = $collaborateur->getId();
            $primeEmbauche = $collaborateur->getPrimeDembauche();
            $niveauCompetence = $collaborateur->translateNiveau();
            $nom = $collaborateur->getNom();
            $prenom = $collaborateur->getPrenom();

            // Ajouter les données du client au tableau $clientData
            $collaborateursData[] = [
                'id' => $id,
                'primeEmbauche' => $primeEmbauche,
                'niveauCompetence'=> $niveauCompetence,
                'nom' => $nom,
                'prenom'=>$prenom
            ];
        }

        $this->view->setVar('collaborateurs', $collaborateursData);
        // Charger la vue
        $this->view->pick('collaborateur/index');

    }

}

