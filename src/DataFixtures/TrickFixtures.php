<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Trick;
use Faker\Factory;

class TrickFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 1; $i <= 3 ; $i++) {
            $category = new Category();
            $category->setTitle($faker->sentence());
            $manager->persist($category);
            for ($j = 1; $j <= 3; $j++){
                $trick = new Trick();
                $content = '<p>' . join($faker->paragraphs(5),'</p</p>') . '</p>';
                $trick->setName($faker->sentence())
                    ->setContent($content)
                    ->setImage($faker->imageUrl())
                    ->setCategory($category)
                    ->setCreatedAt(new \DateTimeImmutable());

                $manager->persist($trick);

                for ($k = 1; $k <= 3; $k++){
                    $comment = new Comment();
                    $comment->setText($faker->sentence())
                            ->setCreatedAt(new \DateTimeImmutable())
                            ->setTrick($trick);
                    $manager->persist($comment);
                }
            }
        }
        $manager->flush();
    }
}
