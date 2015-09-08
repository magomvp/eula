<?php
/**
 * Created by PhpStorm.
 * User: marius.melega
 * Date: 9/3/2015
 * Time: 4:28 PM
 */

namespace AppBundle\Tests\Entity;

use AppBundle\Entity;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NewsLetterCampaignTest extends WebTestCase
{

    /**
     * @dataProvider getNewsletterCampaigns
     */
    public function testEntity($fixture)
    {
        $entity = new Entity\NewsLetterCampaign();
        $this->assertInstanceOf('AppBundle\Entity\NewsLetterCampaign', $entity);

        $name = $fixture['name'];
        $entity->setName($name);
        $this->assertEquals($name,$entity->getName());
    }

    public function getNewsletterCampaigns()
    {
        return array(
            array(
                'id'=> 1,
                'name'=> 'Test',
                'subject' => 'tedst'
            ),
            array(
                'id'=> 2,
                'name'=> 'Test2',
                'subject' => 'tedstfdsfd'
            )
        );
    }
}