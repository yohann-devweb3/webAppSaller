<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Application;



class ApplicationController extends Controller
{

    public function indexAction($param=null)
    {
        $applicationsData = [];

        // Charger les données du module pour chaque client
        foreach (Application::find() as $application) {
            $id = $application->getId();
            $nom = $application->getNom();

            // Ajouter les données du client au tableau $clientData
            $applicationsData[] = [
                'id' => $id,
                'nom' => $nom,
            ];
        }

        $this->view->setVar('applications', $applicationsData);
        // Charger la vue
        $this->view->pick('application/index');
    }

}

