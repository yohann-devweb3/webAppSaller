<?php
declare(strict_types=1);

namespace Themys\Modules\Frontend\Controllers;

class ChampionController extends ControllerBase
{

    public function indexAction($param=null)
    {
        $this->view->setVar('param',$param);
    }

}

