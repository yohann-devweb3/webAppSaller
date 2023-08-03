<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Collaborateur;
use Themys\Models\Projet;

class CollaborateurController extends Controller
{

    public function indexAction()
    {
        $collaborateursData = [];
        $niveauCompetenceData= [];

        foreach (Collaborateur::find()  as $collaborateur) {
            $niveauCompetence = $collaborateur->getNiveauCompetence();

            // Check if the niveauCompetence is not already in the array
            if (!in_array($niveauCompetence, $niveauCompetenceData)) {
                // Add the distinct niveauCompetence to the array
                $niveauCompetence[] = $niveauCompetence;
            }
        }

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
        $this->view->setVar('niveauCompetence', $niveauCompetenceData);

    }
    public function createAction()
    {
        // Vérifier si le formulaire a été soumis
        if ($this->request->isPost())
        {
            // Créer un nouveau collaborateur et enregistrer dans la base de données
            $collaborateur = (new Collaborateur())
                ->setNom($this->request->getPost('nom', 'string'))
                ->setPrenom($this->request->getPost('prenom', 'string'))
                ->setPrimeDembauche($this->request->getPost('prime_embauche', 'int'))
                ->setNiveauCompetence($this->request->getPost('niveau_competence', 'int'));

            // Rediriger vers la page d'index pour afficher la liste mise à jour
            if($collaborateur->save()) return $this->response->redirect('themys/collaborateur');
        }
        else {
            // Pass the distinct niveauCompetence values to the view
            $this->view->setVar('niveauCompetence', Collaborateur::enumerateNiveauxCompetence());
        }
    }
    public function updateAction($id)
    {
        // Récupérer le collaborateur à mettre à jour
        $collaborateur = Collaborateur::findFirst($id);

        if (!$collaborateur) {
            // Rediriger vers la page d'index si le collaborateur n'existe pas
            return $this->response->redirect('collaborateur');
        }

        // Vérifier si le formulaire a été soumis
        if ($this->request->isPost()) {
            // Récupérer les données du formulaire
            $nom = $this->request->getPost('nom', 'string');
            $prenom = $this->request->getPost('prenom', 'string');
            $primeEmbauche = $this->request->getPost('prime_embauche', 'int');
            $niveauCompetence = $this->request->getPost('niveau_competence', 'int');

            // Mettre à jour les propriétés du collaborateur
            $collaborateur->setNom($nom);
            $collaborateur->setPrenom($prenom);
            $collaborateur->setPrimeDembauche($primeEmbauche);
            $collaborateur->setNiveauCompetence($niveauCompetence);
            $collaborateur->save();

            // Rediriger vers la page d'index pour afficher la liste mise à jour
            return $this->response->redirect('collaborateur');
        }

        // Passer les données du collaborateur à la vue pour afficher le formulaire de mise à jour
        $this->view->setVar('collaborateur', $collaborateur);
        $this->view->pick('collaborateur/update');
    }

    public function deleteAction($id)
    {
        // Récupérer le collaborateur à supprimer
        $collaborateur = Collaborateur::findFirst($id);

        if ($collaborateur) {
            // Supprimer le collaborateur
            $collaborateur->delete();
        }

        // Rediriger vers la page d'index pour afficher la liste mise à jour
        return $this->response->redirect('collaborateur');
    }
    public function  redirect(){
        // Charger la vue
        $this->view->pick('collaborateur/index');
        return $this->response->redirect('create');
    }
}

