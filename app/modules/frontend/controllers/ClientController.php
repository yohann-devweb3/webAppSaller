<?php
declare(strict_types=1);

namespace Themys\modules\frontend\controllers;

use Phalcon\Mvc\Controller;
use Themys\Models\Client;


class ClientController extends Controller
{
    public function indexAction($param = null)
    {
        // Récupérer les clients depuis la source de données (exemple : une base de données)
        //$clients = Client::find(); // Supposons que cette méthode renvoie tous les clients

        // Tableau pour stocker les données des clients avec les clés 'ss2i', 'ridet' et 'raison_sociale'
        $clientData = [];

        // Charger les données du module pour chaque client
        foreach (Client::find() as $client) {
            $ss2i = $client->getTypeSS2i();
            $ridet = $client->getRidet();
            $raison_sociale = $client->getRaisonSociale();

            // Ajouter les données du client au tableau $clientData
            $clientData[] = [
                'ss2i' => $ss2i,
                'ridet' => $ridet,
                'raison_sociale' => $raison_sociale
            ];
        }

        // Transmettre les données des clients à la vue
        $this->view->setVar('clients', $clientData);

        // Charger la vue
        $this->view->pick('client/index');
    }


}

