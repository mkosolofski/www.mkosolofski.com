<?php
/**
 * Contains MKosolofski\Site\DoctrineBundle\Contact
 *
 * @package MKosolofski
 * @subpackage Site\DoctrineBundle\Entity
 */

namespace MKosolofski\Site\DoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact")
 *
 * @package MKosolofski
 * @subpackage Site\DoctrineBundle\Entity
 * @author Matthew Kosolofski <matthew.Kosolofski@gmail.com>
 */
class Contact
{
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @var integer
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     * @Assert\NotBlank(message="Please specify a company.")
     * @Assert\Length(min=0, max=50, maxMessage="Company name cannot be longer than 50 characters.")
     * @var string
     */
    private $company;

	/**
     * @ORM\Column(type="string", length=50, nullable=false)
     * @Assert\NotBlank(message="Please specify a first name.")
     * @Assert\Length(min=2, max=50, maxMessage="Please specify a first name between 2 and 50 characters.")
     * @var string
     */
    private $firstName;
    
    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     * @Assert\NotBlank(message="Please specify a last name.")
     * @Assert\Length(min=2, max=50, maxMessage="Please specify a first name between 2 and 50 characters.")
     * @var string
     */
    private $lastName;
    
    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\Email(message="Please specify an email.")
     * @Assert\Length(min=0, max=50, maxMessage="Please specify an email no longer than 100 characters.")
     * @var string
     */
    private $email;
    
    /**
     * @ORM\Column(type="string", length=1000, nullable=false)
     * @Assert\Email(message="Please specify a message.")
     * @Assert\Length(min=0, max=1000, maxMessage="Please specify a message no longer than 1000 characters.")
     * @var string
     */
    private $message;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $dateCreated;

	/**
	 * Returns the id
	 *  
	 * @return int
	 */
    public function getId()
    {
        return $this->id;
    }
    
    /**
	 * Returns the company.
	 *  
	 * @return string
	 */
    public function getCompany()
    {
        return $this->company;
    }

	/**
	 * Sets the company.
     *
	 * @param string $company
	 * @return $this
	 */
    public function setCompany($company): Contact
    {
        $this->company = $company;
        return $this;
    }
    
	/**
	 * Returns the first name.
	 *  
	 * @return string
	 */
    public function getFirstName()
    {
        return $this->firstName;
    }

	/**
	 * Sets the first name.
     *
	 * @param string $firstName
	 * @return $this
	 */
    public function setFirstName($firstName): Contact
    {
        $this->firstName = $firstName;
        return $this;
    }
    
	/**
	 * Returns the last name.
	 *  
	 * @return string
	 */
    public function getLastName()
    {
        return $this->lastName;
    }

	/**
	 * Sets the last name.
     *
	 * @param string $lastName
	 * @return $this
	 */
    public function setLastName($lastName): Contact
    {
        $this->lastName = $lastName;
        return $this;
    }
    
	/**
	 * Returns the email.
	 *  
	 * @return string
	 */
    public function getEmail()
    {
        return $this->email;
    }

	/**
	 * Sets the email.
     *
	 * @param string $email
	 * @return $this
	 */
    public function setEmail($email): Contact
    {
        $this->email = $email;
        return $this;
    }
    
	/**
	 * Returns the message.
	 *  
	 * @return string
	 */
    public function getMessage()
    {
        return $this->message;
    }

	/**
	 * Sets the message.
     *
	 * @param string $message
	 * @return $this
	 */
    public function setMessage($message): Contact
    {
        $this->message = $message;
        return $this;
    }
}
