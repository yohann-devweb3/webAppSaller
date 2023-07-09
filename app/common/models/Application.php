<?php

namespace Themys\Models;

class Application extends \Phalcon\Mvc\Model
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
     * @Column(column="nom", type="string", length=50, nullable=false)
     */
    protected $nom;

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
     * Method to set the value of field nom
     *
     * @param string $nom
     * @return $this
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

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
     * Returns the value of field nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("test");
        $this->setSource("application");
     /*   $this->hasMany('id', 'Themys\Models\ApplicationModule', 'id_1', ['alias' => 'ApplicationModule']);
        $this->hasMany('id', 'Themys\Models\Commander', 'id_1', ['alias' => 'Commander']);
        $this->hasMany('id', 'Themys\Models\Developpement', 'id_application', ['alias' => 'Developpement']);
        $this->hasMany('id', 'Themys\Models\Projet', 'id_application', ['alias' => 'Projet']);
        $this->hasMany('id', 'Themys\Models\ProjetApplication', 'id', ['alias' => 'ProjetApplication']);*/
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Application[]|Application|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Application|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
