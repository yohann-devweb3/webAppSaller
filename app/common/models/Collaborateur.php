<?php

namespace Themys\Models;

class Collaborateur extends \Phalcon\Mvc\Model
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
     * @Column(column="prime_dembauche", type="integer", nullable=true)
     */
    protected $prime_dembauche;

    /**
     *
     * @var string
     * @Column(column="niveau_competence", type="string", length='1','2','3', nullable=true)
     */
    protected $niveau_competence;
    const _NIVEAU_1_STAGIAIRE_ = 1;
    const _NIVEAU_2_JUNIOR_ = 2;
    const _NIVEAU_3_SENIOR_ = 3;
    /**
     *
     * @var string
     * @Column(column="nom", type="string", length=35, nullable=true)
     */
    protected $nom;

    /**
     *
     * @var string
     * @Column(column="prenom", type="string", length=35, nullable=true)
     */
    protected $prenom;

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
     * Method to set the value of field prime_dembauche
     *
     * @param integer $prime_dembauche
     * @return $this
     */
    public function setPrimeDembauche($prime_dembauche)
    {
        $this->prime_dembauche = $prime_dembauche;

        return $this;
    }

    /**
     * Method to set the value of field niveau_competence
     *
     * @param string $niveau_competence
     * @return $this
     */
    public function setNiveauCompetence($niveau_competence)
    {
        $this->niveau_competence = $niveau_competence;

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
     * Method to set the value of field prenom
     *
     * @param string $prenom
     * @return $this
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

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
     * Returns the value of field prime_dembauche
     *
     * @return integer
     */
    public function getPrimeDembauche()
    {
        return $this->prime_dembauche;
    }

    /**
     * Returns the value of field niveau_competence
     *
     * @return string
     */
    public function getNiveauCompetence()
    {
        return $this->niveau_competence;
    }

    public function translateNiveau( ) : string
    {
        return self::translateNiveauCompetence($this->getNiveauCompetence());
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
     * Returns the value of field prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("test");
        $this->setSource("collaborateur");
        $this->hasMany('id', 'Themys\Models\Chefdeprojet', 'id_collaborateur', ['alias' => 'Chefdeprojet']);
        $this->hasMany('id', 'Themys\Models\Developpeur', 'id_collaborateur', ['alias' => 'Developpeur']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Collaborateur[]|Collaborateur|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Collaborateur|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

    public static function enumerateNiveauxCompetence()
    {
        return [
            [
                'id' => self::_NIVEAU_1_STAGIAIRE_,
                'libelle' => self::translateNiveauCompetence(self::_NIVEAU_1_STAGIAIRE_)
            ],
            [
                'id' => self::_NIVEAU_2_JUNIOR_,
                'libelle' => self::translateNiveauCompetence(self::_NIVEAU_2_JUNIOR_)
            ],
            [
                'id' => self::_NIVEAU_3_SENIOR_,
                'libelle' => self::translateNiveauCompetence(self::_NIVEAU_3_SENIOR_)
            ],
        ];
    }

    private static function translateNiveauCompetence(int $niveau)
    {
        switch ($niveau){
            case self::_NIVEAU_1_STAGIAIRE_:return 'STAGIAIRE';
            case self::_NIVEAU_2_JUNIOR_ :return 'JUNIOR';
            case self::_NIVEAU_3_SENIOR_:return 'SENIOR';
            default : return 'Pas de niveau' ;
        }
    }
}
