<?php

namespace App\DataFixtures;

use App\Entity\Collection;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CollectionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i=0; $i < 100; $i++) { 
            $collection = new Collection();
            $collection
                ->setTitle($faker->words(3, true))
                ->setDescription($faker->sentences(3, true))
                ->setDimensions($faker->numberBetween(5, 150))
                ->setPartsNumber($faker->randomDigit)
                ->setPrice($faker->numberBetween(50, 500))
                ->setPossession(0)
                ->setImage($faker->imageUrl(286, 286, 'cats'));
            $manager->persist($collection);
        }
        $manager->flush();
    }
}
