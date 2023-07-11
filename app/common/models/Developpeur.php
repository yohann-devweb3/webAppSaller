<?php

class Developpeur extends \Phalcon\Mvc\Model
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
     * @Column(column="competence", type="string", length='1','2','3', nullable=true)
     */
    protected $competence;

    /**
     *
     * @var integer
     * @Column(column="indice_production", type="integer", nullable=true)
     */
    protected $indice_production;

    /**
     *
     * @var integer
     * @Column(column="id_1", type="integer", nullable=false)
     */
    protected $id_1;

    /**
     *
     * @var integer
     * @Column(column="id_2", type="integer", nullable=false)
     */
    protected $id_2;

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
     * Method to set the value of field competence
     *
     * @param string $competence
     * @return $this
     */
    public function setCompetence($competence)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Method to set the value of field indice_production
     *
     * @param integer $indice_production
     * @return $this
     */
    public function setIndiceProduction($indice_production)
    {
        $this->indice_production = $indice_production;

        return $this;
    }

    /**
     * Method to set the value of field id_1
     *
     * @param integer $id_1
     * @return $this
     */
    public function setId1($id_1)
    {
        $this->id_1 = $id_1;

        return $this;
    }

    /**
     * Method to set the value of field id_2
     *
     * @param integer $id_2
     * @return $this
     */
    public function setId2($id_2)
    {
        $this->id_2 = $id_2;

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
     * Returns the value of field competence
     *
     * @return string
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * Returns the value of field indice_production
     *
     * @return integer
     */
    public function getIndiceProduction()
    {
        return $this->indice_production;
    }

    /**
     * Returns the value of field id_1
     *
     * @return integer
     */
    public function getId1()
    {
        return $this->id_1;
    }

    /**
     * Returns the value of field id_2
     *
     * @return integer
     */
    public function getId2()
    {
        return $this->id_2;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("test");
        $this->setSource("developpeur");
        $this->hasMany('id', 'Developper', 'id_3', ['alias' => 'Developper']);
        $this->hasMany('id', 'Projet', 'id', ['alias' => 'Projet']);
        $this->belongsTo('id_1', '\Equipe', 'id', ['alias' => 'Equipe']);
        $this->belongsTo('id_2', '\Collaborateur', 'id', ['alias' => 'Collaborateur']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Developpeur[]|Developpeur|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Developpeur|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
