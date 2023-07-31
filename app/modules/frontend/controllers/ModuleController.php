<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Module;


class ModuleController extends Controller
{
    public function indexAction($param=null)
    {
        $modulesData = [];

        // Charger les données du module pour chaque client
        foreach (Module::find() as $module) {
            $id = $module->getId();
            $libelle = $module->getLibelle();

            // Ajouter les données du client au tableau $clientData
            $modulesData[] = [
                'id' => $id,
                'libelle' => $libelle,
            ];
        }

        $this->view->setVar('modules', $modulesData);
        // Charger la vue
        $this->view->pick('module/index');

    }

}

