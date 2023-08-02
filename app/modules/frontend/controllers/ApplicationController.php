<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Application;



class ApplicationController extends Controller
{

    public function indexAction($param = null)
    {
        // Récupérer les applications
        $applicationsData = Application::find();

        // Construire le contenu de la vue sous forme de chaîne de caractères
        $viewContent = $this->buildViewContent($applicationsData);

        // Passer le contenu de la vue à la vue
        $this->view->setVar( 'viewContent',$viewContent);
    }

    private function buildViewContent($applicationsData)
    {
        $viewContent = '<div class="container">';
        $viewContent .= '<p>Liste des applications</p>';
        $viewContent .= '<table class="table">';
        $viewContent .= '<thead><tr><th>ID</th><th>Nom</th></tr></thead>';
        $viewContent .= '<tbody>';

        foreach ($applicationsData as $application) {
            $id = $application->getId();
            $nom = $application->getNom();
            $viewContent .= "<tr><td>{$id}</td><td>{$nom}</td></tr>";
        }

        $viewContent .= '</tbody>';
        $viewContent .= '</table>';
        $viewContent .= '</div>';

        return $viewContent;
    }

}

