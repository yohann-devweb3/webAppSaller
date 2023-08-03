<?php

namespace Themys\Models;

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
    const _NIVEAU_1_FRONTEND_ = 1;
    const _NIVEAU_2_BACKEND_ = 2;
    const _NIVEAU_3_DATABASE_ = 3;
    /**
     *
     * @var integer
     * @Column(column="indice_production", type="integer", nullable=true)
     */
    protected $indice_production;

    /**
     *
     * @var integer
     * @Column(column="id_equipe", type="integer", nullable=false)
     */
    protected $id_equipe;

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
     * Method to set the value of field id_equipe
     *
     * @param integer $id_equipe
     * @return $this
     */
    public function setIdEquipe($id_equipe)
    {
        $this->id_equipe = $id_equipe;

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
     * Returns the value of field competence
     *
     * @return string
     */
    public function getCompetence()
    {
        return $this->competence;
    }
    public function getTranslateCompetence( ) : string
    {
        return self::translateNiveauCompetence($this->getCompetence());
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
     * Returns the value of field id_equipe
     *
     * @return integer
     */
    public function getIdEquipe()
    {
        return $this->id_equipe;
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
        $this->setSource("developpeur");
        $this->hasMany('id', 'Themys\Models\Developpement', 'id_developpeur', ['alias' => 'Developpement']);
        $this->hasMany('id', 'Themys\Models\Projet', 'id_developpeur', ['alias' => 'Projet']);
        $this->belongsTo('id_equipe', 'Themys\Models\Equipe', 'id', ['alias' => 'Equipe']);
        $this->belongsTo('id_collaborateur', 'Themys\Models\Collaborateur', 'id', ['alias' => 'Collaborateur']);
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
    public static function enumerateNiveauxCompetence()
    {
        return [
            [
                'id' => self::_NIVEAU_1_FRONTEND_,
                'libelle' => self::translateNiveauCompetence(self::_NIVEAU_1_FRONTEND_)
            ],
            [
                'id' => self::_NIVEAU_2_BACKEND_,
                'libelle' => self::translateNiveauCompetence(self::_NIVEAU_2_BACKEND_)
            ],
            [
                'id' => self::_NIVEAU_3_DATABASE_,
                'libelle' => self::translateNiveauCompetence(self::_NIVEAU_3_DATABASE_)
            ],
        ];
    }

    private static function translateNiveauCompetence(int $niveau)
    {
        switch ($niveau){
            case self::_NIVEAU_1_FRONTEND_:return 'FRONTEND';
            case self::_NIVEAU_2_BACKEND_ :return 'BACKEND';
            case self::_NIVEAU_3_DATABASE_:return 'DATABASE';
            default : return 'Pas de niveau' ;
        }
    }
}
