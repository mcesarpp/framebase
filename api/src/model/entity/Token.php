<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Token
 *
 * @ORM\Table(name="token", uniqueConstraints={@ORM\UniqueConstraint(name="hash_UNIQUE", columns={"key"})}, indexes={@ORM\Index(name="fk_token_user_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Token
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="token_key", type="string", length=40, nullable=false)
     */
    private $tokenKey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=false)
     */
    private $creationDate = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiration_date", type="datetime", nullable=true)
     */
    private $expirationDate;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set key
     *
     * @param string $key
     * @return Token
     */
    public function setTokenKey($key)
    {
        $this->tokenKey = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return string 
     */
    public function getTokenKey()
    {
        return $this->tokenKey;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return Token
     */
    public function setCreationDate($datetime)
    {
        $this->creationDate = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set expiration
     *
     * @param \DateTime $expiration
     * @return Token
     */
    public function setExpirationDate($expiration)
    {
        $this->expirationDate = $expiration;

        return $this;
    }

    /**
     * Get expiration
     *
     * @return \DateTime 
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Set user
     *
     * @param \User $user
     * @return Token
     */
    public function setUser(\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User 
     */
    public function getUser()
    {
        return $this->user;
    }

}
