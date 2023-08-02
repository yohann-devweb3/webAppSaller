<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Application;
use Themys\Models\Composant;
use Themys\Models\Module;


class ComposantController extends Controller
{

    public function indexAction($param = null)
    {
        $composantsData = [];

        $composantsData = Composant::find();
        // Construire le contenu de la vue sous forme de chaîne de caractères
        $viewContent = $this->buildViewContent($composantsData);

        // Passer le contenu de la vue à la vue
        $this->view->setVar( 'viewContent',$viewContent);
    }
    private function buildViewContent($composantsData)
    {
        $viewContent = '<div class="container">';
        $viewContent .= '<p>Liste des composants</p>';
        $viewContent .= '<table class="table">';
        $viewContent .= '<thead><tr><th>ID</th><th>Type</th><th>Charge</th><th>progression</th><th>libelle</th></tr></thead>';
        $viewContent .= '<tbody>';

        foreach ($composantsData as $row) {
            $id = $row->getId();
            $type= $row->getTypeLibelle();
            $charge= $row->getCharge();
            $progression= $row->getCharge();
            $libelleModule= $row->getLibelleModule();
            $viewContent .= "<tr><td>{$id}</td><td>{$type}</td>";
            $viewContent .= "<td>{$charge}</td><td>{$progression}</td><td>{$libelleModule}</td></tr>";
        }

        $viewContent .= '</tbody>';
        $viewContent .= '</table>';
        $viewContent .= '</div>';

        return $viewContent;
    }

}

