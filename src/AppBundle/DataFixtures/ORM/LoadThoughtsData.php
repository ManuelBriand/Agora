<?php


namespace AppBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Thoughts;
use Doctrine\Common\DataFixtures\FixtureInterface;

class LoadThoughtsData extends Fixture implements FixtureInterface
{
    const MAX = 50;
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create("fr_FR");
        $thought = [];

        for($i = 0; $i <= self::MAX; $i++) {
            $thought[$i] = new Thoughts();
            $thought[$i]->setAuthor($faker->name);
            $thought[$i]->setTitle($faker->word);
            $thought[$i]->setContent($faker->sentence($nbWords = 6, $variableNbWords = true));
            $thought[$i]->setCategories($faker->randomElement($array = array ('humour','poesie','fulgurance')));
            $thought[$i]->setEmail($faker->email);
            $thought[$i]->setVisible($faker->randomElement($array = array (1, 0)));
            $manager->persist($thought[$i]);
        }
        $manager->flush();
    }

}