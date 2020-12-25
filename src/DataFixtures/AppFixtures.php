<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');

        for($i=0;$i<15;$i++)
        {
            $post=new Post();
            $post->setTitle($faker->sentence($nbWords=5, $variableNbWords = true))
                ->setContent($faker->text($maxNbChars = 10000))
                ->setPublished($faker->dateTime($max = 'now', $timezone = null))
                ->setUrlAlias($faker->slug);

            $manager->persist($post);
        }

        $manager->flush();
    }
}
