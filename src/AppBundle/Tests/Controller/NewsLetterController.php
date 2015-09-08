<?php
/**
 * Created by PhpStorm.
 * User: marius.melega
 * Date: 9/3/2015
 * Time: 5:23 PM
 */

namespace AppBundle\Tests\Controller;


use AppBundle\Entity\NewsletterCampaign;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Parser;

class NewsLetterController
{
    /**
     * @DI\Inject("app.newsletter_sender")
     * @var NewsletterSender
     */
    public $newsletterSender;

    /**
     * @DI\Inject("doctrine.orm.default_entity_manager")
     *
     * @var EntityManager
     */
    public $entityManager;

    public function saveAction()
    {
        $newsletterCampaign = new NewsletterCampaign();
        $newsletterCampaign->setName('Nume Companie');
        $newsletterCampaign->setSubject('Subiect de test');

        $this->entityManager->persist($newsletterCampaign);
        $this->entityManager->flush();
    }

    /**
     * @Route("/newsletter/send", name="newsletter_send")
     * @return Response
     */
    public function sendAction()
    {
        $yaml = new Parser();
        $values = $yaml->parse(file_get_contents(__DIR__ . "/../Resources/config/newsletter.yml"));
        var_dump($values);
        foreach($values['newsletter']['email_list'] as $value)
        {
            if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                //throw exception
            }
        }

        return new Response();
    }
}