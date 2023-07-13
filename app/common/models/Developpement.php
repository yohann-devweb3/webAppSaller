<?php

namespace Themys\Models;

class Developpement extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_composant", type="integer", nullable=false)
     */
    protected $id_composant;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_module", type="integer", nullable=false)
     */
    protected $id_module;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_application", type="integer", nullable=false)
     */
    protected $id_application;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_developpeur", type="integer", nullable=false)
     */
    protected $id_developpeur;

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
     * Returns the value of field id_composant
     *
     * @return integer
     */
    public function getIdComposant()
    {
        return $this->id_composant;
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
     * Returns the value of field id_application
     *
     * @return integer
     */
    public function getIdApplication()
    {
        return $this->id_application;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("test");
        $this->setSource("developpement");
        $this->belongsTo('id_composant', 'Themys\Models\Composant', 'id', ['alias' => 'Composant']);
        $this->belongsTo('id_module', 'Themys\Models\Module', 'id', ['alias' => 'Module']);
        $this->belongsTo('id_application', 'Themys\Models\Application', 'id', ['alias' => 'Application']);
        $this->belongsTo('id_developpeur', 'Themys\Models\Developpeur', 'id', ['alias' => 'Developpeur']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Developpement[]|Developpement|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Developpement|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
