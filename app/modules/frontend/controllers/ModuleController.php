<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Module;


class ModuleController extends Controller
{
    public function indexAction($param = null)
    {
        // Récupérer les applications
        $moduleData = Module::find();

        // Construire le contenu de la vue sous forme de chaîne de caractères
        $viewContent = $this->buildViewContent($moduleData);

        // Passer le contenu de la vue à la vue
        $this->view->setVar( 'viewContent',$viewContent);
    }
    private function buildViewContent($moduleData)
    {
        $viewContent = '<div class="container">';
        $viewContent .= '<p>Liste des modules</p>';
        $viewContent .= '<table class="table">';
        $viewContent .= '<thead><tr><th>ID</th><th>Nom</th></tr></thead>';
        $viewContent .= '<tbody>';

        foreach ($moduleData as $row) {
            $id = $row->getId();
            $libelle = $row->getLibelle();
            $viewContent .= "<tr><td>{$id}</td><td>{$libelle}</td></tr>";
        }

        $viewContent .= '</tbody>';
        $viewContent .= '</table>';
        $viewContent .= '</div>';

        return $viewContent;
    }
}

