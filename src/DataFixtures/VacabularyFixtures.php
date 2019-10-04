<?php

namespace App\DataFixtures;

use App\Entity\Vacabulary;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class VacabularyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $vacabulary = new Vacabulary();
        $vacabulary->setWord('hesitate');
        $vacabulary->setTranscription('/ˈhɛzɪteɪt/');
        $vacabulary->setTranslate('стесняться');
        $vacabulary->setExample('She hesitated slightly before answering the detective\'s question.
"Do you love me?" she asked. He hesitated and then said, "I\'m not sure."');

        $manager->persist($vacabulary);
        $manager->flush();
    }
}
