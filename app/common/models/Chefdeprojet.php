<?php

namespace Themys\Models;

class Chefdeprojet extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="boost_production", type="integer", nullable=true)
     */
    protected $boost_production;

    /**
     *
     * @var string
     * @Column(column="nom_prenom", type="string", length=50, nullable=true)
     */
    protected $nom_prenom;

    /**
     *
     * @var integer
     * @Column(column="id_collaborateur", type="integer", nullable=false)
     */
    protected $id_collaborateur;

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
     * Method to set the value of field boost_production
     *
     * @param integer $boost_production
     * @return $this
     */
    public function setBoostProduction($boost_production)
    {
        $this->boost_production = $boost_production;

        return $this;
    }

    /**
     * Method to set the value of field nom_prenom
     *
     * @param string $nom_prenom
     * @return $this
     */
    public function setNomPrenom($nom_prenom)
    {
        $this->nom_prenom = $nom_prenom;

        return $this;
    }

    /**
     * Method to set the value of field id_collaborateur
     *
     * @param integer $id_collaborateur
     * @return $this
     */
    public function setIdCollaborateur($id_collaborateur)
    {
        $this->id_collaborateur = $id_collaborateur;

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
     * Returns the value of field boost_production
     *
     * @return integer
     */
    public function getBoostProduction()
    {
        return $this->boost_production;
    }

    /**
     * Returns the value of field nom_prenom
     *
     * @return string
     */
    public function getNomPrenom()
    {
        return $this->nom_prenom;
    }

    /**
     * Returns the value of field id_collaborateur
     *
     * @return integer
     */
    public function getIdCollaborateur()
    {
        return $this->id_collaborateur;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("test");
        $this->setSource("chefdeprojet");
        $this->hasMany('id', 'Themys\Models\Equipe', 'id_chefdeprojet', ['alias' => 'Equipe']);
        $this->hasMany('id', 'Themys\Models\Projet', 'id_chefdeprojet', ['alias' => 'Projet']);
        $this->belongsTo('id_collaborateur', 'Themys\Models\Collaborateur', 'id', ['alias' => 'Collaborateur']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Chefdeprojet[]|Chefdeprojet|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Chefdeprojet|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
