<?php

class Composant extends \Phalcon\Mvc\Model
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
     * @Column(column="type", type="string", length='1','2','3', nullable=true)
     */
    protected $type;

    /**
     *
     * @var integer
     * @Column(column="charge", type="integer", nullable=true)
     */
    protected $charge;

    /**
     *
     * @var integer
     * @Column(column="progression", type="integer", nullable=true)
     */
    protected $progression;

    /**
     *
     * @var string
     * @Column(column="libelle", type="string", length=50, nullable=true)
     */
    protected $libelle;

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
     * Method to set the value of field type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Method to set the value of field charge
     *
     * @param integer $charge
     * @return $this
     */
    public function setCharge($charge)
    {
        $this->charge = $charge;

        return $this;
    }

    /**
     * Method to set the value of field progression
     *
     * @param integer $progression
     * @return $this
     */
    public function setProgression($progression)
    {
        $this->progression = $progression;

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
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the value of field charge
     *
     * @return integer
     */
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * Returns the value of field progression
     *
     * @return integer
     */
    public function getProgression()
    {
        return $this->progression;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("test");
        $this->setSource("composant");
        $this->hasMany('id', 'Developper', 'id', ['alias' => 'Developper']);
        $this->hasMany('id', 'ModuleComposant', 'id', ['alias' => 'ModuleComposant']);
        $this->hasMany('id', 'Projet', 'id', ['alias' => 'Projet']);
        $this->belongsTo('id', '\Module', 'id', ['alias' => 'Module']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Composant[]|Composant|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Composant|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
