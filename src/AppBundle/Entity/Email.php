<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table(name="emails")
 * @ORM\Entity
 */
class Email
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;


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
     * Set email
     *
     * @param string $email
     * @return Email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @ORM\OneToMany(targetEntity="NewsletterEmail", mappedBy="email")
     * @ORM\JoinColumn(name="id", referencedColumnName="email_id")
     **/
    private $campaigns;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->campaigns = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add campaign
     *
     * @param \AppBundle\Entity\NewsletterEmail $campaign
     * @return Email
     */
    public function addCampaign(\AppBundle\Entity\NewsletterEmail $campaign)
    {
        $this->campaigns[] = $campaign;

        return $this;
    }

    /**
     * Remove campaign
     *
     * @param \AppBundle\Entity\NewsletterEmail $campaign
     */
    public function removeCampaign(\AppBundle\Entity\NewsletterEmail $campaign)
    {
        $this->campaigns->removeElement($campaign);
    }

    /**
     * Get campaign
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCampaign()
    {
        return $this->campaign;
    }
}
