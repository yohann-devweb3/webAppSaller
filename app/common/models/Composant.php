<?php

namespace Themys\Models;

use Phalcon\Validation;

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
     *
     * @var integer
     * @Column(column="id_module", type="integer", nullable=true)
     */
    protected $id_module;

    const _TYPE_1_FRONTEND = 1;
    const _TYPE_2_BACKEND= 2;
    const _TYPE_3_DATABASE = 3;

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
     * Returns the value of field type
     *
     * @return string
     */
    public function getType()
    {
        return intval($this->type);
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
        $this->setSchema("test");
        $this->setSource("composant");
        $this->hasMany('id', 'Themys\Models\Developpement', 'id_composant', ['alias' => 'Developpement']);
        $this->hasMany('id', 'Themys\Models\ModuleComposant', 'id', ['alias' => 'ModuleComposant']);
        $this->hasMany('id', 'Themys\Models\Projet', 'id_composant', ['alias' => 'Projet']);
        $this->belongsTo('id_module', 'Themys\Models\Module', 'id', ['alias' => 'Module']);
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


    /**
     * @return string|void
     */
    public function getTypeLibelle(){
        switch ($this->getType()){
            case self::_TYPE_1_FRONTEND : return 'FRONTEND';
            case self::_TYPE_2_BACKEND : return  'BACKEND';
            case self::_TYPE_3_DATABASE: return 'DATABASE';
        }
    }
    /**
     * Returns the libelle of the associated module.
     *
     * @return string|null
     */
    public function getLibelleModule(): ?string
    {
        $module = Module::findFirst($this->getIdModule());

        if ($module) {
            return $module->getLibelle();
        }

        return null;
    }
    public function  validation(){
        $validator= new Validation();
        $validator->add(
             'type',
            new Validation\Validator\InclusionIn(
                 [
                     'template' => 'le champ :field doit avoir une avoir une valeur comprise entre 0 et 5',
                     'message'=>'le champ :field doit avoir une avoir une valeur comprise entre 0 et 5',
                     'domain' => [
                         self::_TYPE_1_FRONTEND,
                         self::_TYPE_2_BACKEND,
                         self::_TYPE_3_DATABASE,
                     ],
                 ]
            )
        );
        return $this->validate($validator);
    }
}
