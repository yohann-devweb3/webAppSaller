<?php

class Developper extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id", type="integer", nullable=false)
     */
    protected $id;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_1", type="integer", nullable=false)
     */
    protected $id_1;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_2", type="integer", nullable=false)
     */
    protected $id_2;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_3", type="integer", nullable=false)
     */
    protected $id_3;

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
     * Method to set the value of field id_3
     *
     * @param integer $id_3
     * @return $this
     */
    public function setId3($id_3)
    {
        $this->id_3 = $id_3;

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
     * Returns the value of field id_3
     *
     * @return integer
     */
    public function getId3()
    {
        return $this->id_3;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("test");
        $this->setSource("developper");
        $this->belongsTo('id', '\Composant', 'id', ['alias' => 'Composant']);
        $this->belongsTo('id_1', '\Module', 'id', ['alias' => 'Module']);
        $this->belongsTo('id_2', '\Application', 'id', ['alias' => 'Application']);
        $this->belongsTo('id_3', '\Developpeur', 'id', ['alias' => 'Developpeur']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Developper[]|Developper|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Developper|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
