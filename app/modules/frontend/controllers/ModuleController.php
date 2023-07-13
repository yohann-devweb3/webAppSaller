<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Module;


class ModuleController extends Controller
{

    public function indexAction($param=null)
    {
        $modules = Module::find();
        $this->view->setVar('modules', $modules);

    }

}

