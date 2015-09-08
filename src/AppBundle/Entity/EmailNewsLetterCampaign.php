<?php
/**
 * Created by PhpStorm.
 * User: marius.melega
 * Date: 9/3/2015
 * Time: 5:52 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class EmailNewsLetterCampaign
 * @package AppBundle\Entity
 *
 * @ORM\Entity
 *
 * @ORM\Table(name="emails_newsletter_campaigns")
 */
class EmailNewsLetterCampaign
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Email
     *
     * @ORM\ManyToOne(targetEntity="Email", inversedBy="emailNewsletterCampaign")
     * @ORM\JoinColumn(name="id", referencedColumn="email_id")
     */
    protected $email;
}