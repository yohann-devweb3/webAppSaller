<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

class CollaborateurController extends ControllerBase
{

    public function indexAction($param=null)
    {
        $this->view->setVar('param',$param);
    }

}

