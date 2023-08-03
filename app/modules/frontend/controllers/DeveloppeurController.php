<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Collaborateur;
use Themys\Models\Developpeur;
use Themys\Models\Equipe;
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
    public function createAction()
    {
        // Vérifier si le formulaire a été soumis
        if ($this->request->isPost())
        {
            // Créer un nouveau collaborateur et enregistrer dans la base de données
            $developpeur = (new Developpeur())
                ->setNom($this->request->getPost('nom', 'string'))
                ->setPrenom($this->request->getPost('prenom', 'string'))
                ->setPrimeDembauche($this->request->getPost('prime_embauche', 'int'))
                ->setNiveauCompetence($this->request->getPost('niveau_competence', 'int'));

            // Rediriger vers la page d'index pour afficher la liste mise à jour
            if($developpeur->save()) return $this->response->redirect('themys/developpeur');
        }
        else {
            $equipeList=[];
            // Charger les données du module pour chaque client
            foreach (Equipe::find() as $equipe) {
                $id = $equipe->getId();
                $libelle = $equipe->getLibelle();
                $idChefDeProjet = $equipe->getIdChefdeprojet();


                // Ajouter les données du client au tableau $clientData
                $equipeList[] = [
                    'id' => $id,
                    '$libelle' => $libelle,
                    '$idChefDeProjet'=> $idChefDeProjet
                ];
            }

            // competence
            $this->view->setVar('niveauCompetence', Developpeur::enumerateNiveauxCompetence());
            $this->view->setVar('equipe', $equipeList);


        }
    }
}

