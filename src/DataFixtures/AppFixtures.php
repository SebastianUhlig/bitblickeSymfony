<?php

namespace App\DataFixtures;

use App\Entity\Page;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $title = 'page '. $i;
            $page = new Page();
            $page->setSlug($i === 0 ? 'home' : str_replace(' ', '-', $title));
            $page->setTitle($title);
            $page->setSubtitle($title);
            $page->setContent('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.');
            $manager->persist($page);
        }

        $manager->flush();
    }
}
