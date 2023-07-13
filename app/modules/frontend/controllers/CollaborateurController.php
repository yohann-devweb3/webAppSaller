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
        $collaborateurs = Collaborateur::find();
        $this->view->setVar('collaborateurs', $collaborateurs);

    }

}

