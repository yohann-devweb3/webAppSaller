<?php

namespace Themys\Models;

class Projet extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(column="libelle", type="string", length=50, nullable=true)
     */
    protected $libelle;

    /**
     *
     * @var integer
     * @Column(column="prix", type="integer", nullable=true)
     */
    protected $prix;

    /**
     *
     * @var string
     * @Column(column="statut", type="string", length='0','1','2','3','4', nullable=false)
     */
    protected $statut;
    const _NIVEAU_1_DISPONIBLE_ = 1;
    const _NIVEAU_2_ENCOURS_ = 2;
    const _NIVEAU_3_PROGRESSION_ = 3;
    const _NIVEAU_4_RECETTE_ = 4;
    const _NIVEAU_5_TERMINE_ = 5;
    /**
     *
     * @var integer
     * @Column(column="id_application", type="integer", nullable=true)
     */
    protected $id_application;

    /**
     *
     * @var integer
     * @Column(column="id_chefdeprojet", type="integer", nullable=true)
     */
    protected $id_chefdeprojet;

    /**
     *
     * @var integer
     * @Column(column="id_client", type="integer", nullable=true)
     */
    protected $id_client;

    /**
     *
     * @var integer
     * @Column(column="id_composant", type="integer", nullable=true)
     */
    protected $id_composant;

    /**
     *
     * @var integer
     * @Column(column="id_developpeur", type="integer", nullable=true)
     */
    protected $id_developpeur;

    /**
     *
     * @var integer
     * @Column(column="id_module", type="integer", nullable=true)
     */
    protected $id_module;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field libelle
     *
     * @param string $libelle
     * @return $this
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Method to set the value of field prix
     *
     * @param integer $prix
     * @return $this
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Method to set the value of field statut
     *
     * @param string $statut
     * @return $this
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Method to set the value of field id_application
     *
     * @param integer $id_application
     * @return $this
     */
    public function setIdApplication($id_application)
    {
        $this->id_application = $id_application;

        return $this;
    }

    /**
     * Method to set the value of field id_chefdeprojet
     *
     * @param integer $id_chefdeprojet
     * @return $this
     */
    public function setIdChefdeprojet($id_chefdeprojet)
    {
        $this->id_chefdeprojet = $id_chefdeprojet;

        return $this;
    }

    /**
     * Method to set the value of field id_client
     *
     * @param integer $id_client
     * @return $this
     */
    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;

        return $this;
    }

    /**
     * Method to set the value of field id_composant
     *
     * @param integer $id_composant
     * @return $this
     */
    public function setIdComposant($id_composant)
    {
        $this->id_composant = $id_composant;

        return $this;
    }

    /**
     * Method to set the value of field id_developpeur
     *
     * @param integer $id_developpeur
     * @return $this
     */
    public function setIdDeveloppeur($id_developpeur)
    {
        $this->id_developpeur = $id_developpeur;

        return $this;
    }

    /**
     * Method to set the value of field id_module
     *
     * @param integer $id_module
     * @return $this
     */
    public function setIdModule($id_module)
    {
        $this->id_module = $id_module;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Returns the value of field prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Returns the value of field statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }
    public function getTranslateStatut( ) : string
    {
        switch ($this->getStatut()){
            case self::_NIVEAU_1_DISPONIBLE_:return 'DISPONIBLE';
            case self::_NIVEAU_2_ENCOURS_ :return 'EN COURS';
            case self::_NIVEAU_3_PROGRESSION_:return 'PROGRESSION';
            case self::_NIVEAU_4_RECETTE_:return 'RECETTE';
            case self::_NIVEAU_5_TERMINE_:return 'TERMINE';
            default : return 'Pas de niveau' ;
        }
    }
    /**
     * Returns the value of field id_application
     *
     * @return integer
     */
    public function getIdApplication()
    {
        return $this->id_application;
    }

    /**
     * Returns the value of field id_chefdeprojet
     *
     * @return integer
     */
    public function getIdChefdeprojet()
    {
        return $this->id_chefdeprojet;
    }

    /**
     * Returns the value of field id_client
     *
     * @return integer
     */
    public function getIdClient()
    {
        return $this->id_client;
    }

    /**
     * Returns the value of field id_composant
     *
     * @return integer
     */
    public function getIdComposant()
    {
        return $this->id_composant;
    }

    /**
     * Returns the value of field id_developpeur
     *
     * @return integer
     */
    public function getIdDeveloppeur()
    {
        return $this->id_developpeur;
    }

    /**
     * Returns the value of field id_module
     *
     * @return integer
     */
    public function getIdModule()
    {
        return $this->id_module;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_equipe', 'Themys\Models\Equipe', 'id', ['alias' => 'Equipe']);
        $this->setSchema("test");
        $this->setSource("projet");
        $this->hasMany('id', 'Themys\Models\ProjetApplication', 'id_1', ['alias' => 'ProjetApplication']);
        $this->belongsTo('id_application', 'Themys\Models\Application', 'id', ['alias' => 'Application']);
        $this->belongsTo('id_chefdeprojet', 'Themys\Models\Chefdeprojet', 'id', ['alias' => 'Chefdeprojet']);
        $this->belongsTo('id_client', 'Themys\Models\Client', 'id', ['alias' => 'Client']);
        $this->belongsTo('id_composant', 'Themys\Models\Composant', 'id', ['alias' => 'Composant']);
        $this->belongsTo('id_developpeur', 'Themys\Models\Developpeur', 'id', ['alias' => 'Developpeur']);
        $this->belongsTo('id_module', 'Themys\Models\Module', 'id', ['alias' => 'Module']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Projet[]|Projet|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Projet|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
