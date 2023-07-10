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


    }
    public function createAction()
    {
        // Vérifier si le formulaire a été soumis
        if ($this->request->isPost())
        {
            // Créer un nouveau collaborateur et enregistrer dans la base de données
            $developpeur = (new Developpeur())
                ->setidCollaborateur($this->request->getPost('id_collaborateur', 'int'))
                ->setidEquipe($this->request->getPost('id_equipe', 'int'))
                ->setindiceProduction($this->request->getPost('indice_production', 'int'))
                ->setCompetence($this->request->getPost('niveau_competence', 'int'));


            $this->view->setVar('collaborateurs', $developpeur);
            // Rediriger vers la page d'index pour afficher la liste mise à jour
            if($developpeur->save())  return $this->response->redirect('themys/developpeur');
        }
        else {



            $collaborateurs = [];
            foreach (Collaborateur::find() as $collaborateur) {
                // Vérifier si le collaborateur n'a pas d'id_dev associé
                // en effectuant une recherche dans la table Developpeur
                $idCollaborateur = $collaborateur->getId();
                $developpeur = Developpeur::findFirst([
                    'conditions' => 'id_collaborateur = :idCollaborateur:',
                    'bind' => ['idCollaborateur' => $idCollaborateur]
                ]);

                // Si le collaborateur n'a pas d'id_dev associé, on l'ajoute à la liste
                if (!$developpeur) {
                    $collaborateurs[] = [
                        'id' => $collaborateur->getId(),
                        'nom' => $collaborateur->getNom(),
                        'prenom' => $collaborateur->getPrenom()
                    ];
                }
            }

            // envoyer $collaborateurs à la vue
            $this->view->setVar('collaborateurs', $collaborateurs);
            $this->view->setVar('niveauCompetence', Developpeur::enumerateNiveauxCompetence());

        }
    }

    public function deleteAction($id)
    {
        // Récupérer le collaborateur à supprimer
        $developpeur= Developpeur::findFirst($id);

        if ($developpeur) {
            // Supprimer les projets liés
            foreach ($developpeur->Projet as $projet) {
                $projet->delete();
            }

            // Supprimer le collaborateur
            $developpeur->delete();
        }

        // Rediriger vers la page d'index pour afficher la liste mise à jour
        return $this->response->redirect('themys/developpeur');
    }
}

