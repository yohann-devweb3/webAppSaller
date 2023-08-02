<?php

namespace Themys\Models;

class Client extends \Phalcon\Mvc\Model
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
     * @Column(column="ss2i", type="integer", nullable=true)
     */
    protected $ss2i;

    /**
     *
     * @var string
     * @Column(column="ridet", type="string", length=10, nullable=true)
     */
    protected $ridet;

    /**
     *
     * @var string
     * @Column(column="raison_sociale", type="string", length=50, nullable=true)
     */
    protected $raison_sociale;
    const _TYPE_1_SS2I = 1;
    const _TYPE_2_TIERCE = 0;
    /**
     * @var mixed
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
     * Method to set the value of field ss2i
     *
     * @param integer $ss2i
     * @return $this
     */
    public function setSs2i($ss2i)
    {
        $this->ss2i = $ss2i;

        return $this;
    }

    /**
     * Method to set the value of field ridet
     *
     * @param string $ridet
     * @return $this
     */
    public function setRidet($ridet)
    {
        $this->ridet = $ridet;

        return $this;
    }

    /**
     * Method to set the value of field raison_sociale
     *
     * @param string $raison_sociale
     * @return $this
     */
    public function setRaisonSociale($raison_sociale)
    {
        $this->raison_sociale = $raison_sociale;

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
     * Returns the value of field ss2i
     *
     * @return integer
     */
    public function getSs2i()
    {
        return $this->ss2i;
    }
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * Returns the value of field ridet
     *
     * @return string
     */
    public function getRidet()
    {
        return $this->ridet;
    }

    /**
     * Returns the value of field raison_sociale
     *
     * @return string
     */
    public function getRaisonSociale()
    {
        return $this->raison_sociale;
    }

    public function getTypeSS2i(){
        switch ($this->getSs2i()){
            case self::_TYPE_1_SS2I : return 'SS2I';
            case self::_TYPE_2_TIERCE : return '-';
        }
    }
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("test");
        $this->setSource("client");
        $this->hasMany('id', 'Themys\Models\Commander', 'id', ['alias' => 'Commander']);
        $this->hasMany('id', 'Themys\Models\Projet', 'id_client', ['alias' => 'Projet']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Client[]|Client|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Client|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
