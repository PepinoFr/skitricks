<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Trick;
use Faker\Factory;

class TrickFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $user = new User();
        $user->setUsername('mathieu');
        $user->setEmail('testfixture@gmail.com');
        $user->setPassword('$2y$13$sEVgGnRII.iFEsLA0RZV1u3T41m5AUvTCxF4yFkRu.pZUUkBZzKEK');
        $user->setIsValidate('1');
        $manager->persist($user);

        $category = new Category();
        $category->setTitle('Les grabs');
        $manager->persist($category);

        $trick = new Trick();
        $content = "La figure de ski Japanese Air est une figure de freestyle spectaculaire et technique qui se caractérise par un saut avec un mouvement de rotation et une position de ski caractéristique. Cette figure est souvent réalisée dans les compétitions de ski freestyle, en particulier dans la catégorie des sauts acrobatiques.

Pour réaliser un Japanese Air, le skieur commence par se lancer sur une rampe ou une bosse, en prenant de la vitesse et en se préparant à sauter. Au moment de décoller, le skieur saute en l'air en prenant une position de rotation en arrière. Il commence alors à pivoter autour de son axe longitudinal, en tournant vers l'avant, tout en gardant les skis écartés et les pointes légèrement vers l'extérieur.

Le skieur continue la rotation jusqu'à ce qu'il ait effectué un tour complet dans les airs, à savoir une rotation de 360 degrés. Il doit alors se préparer à l'atterrissage, en gardant les skis écartés et les jambes fléchies pour absorber l'impact.

L'un des éléments clés de la réussite de cette figure est le maintien d'une position de ski stable et équilibrée pendant la rotation. Le skieur doit garder les skis bien écartés pour maintenir sa position de rotation et éviter de s'emmêler les skis pendant la figure. La position de ski doit également être suffisamment stable pour permettre au skieur de contrôler sa rotation et d'atterrir en toute sécurité.

Le Japanese Air est une figure très impressionnante qui nécessite une grande maîtrise technique et une bonne condition physique. Les skieurs qui parviennent à maîtriser cette figure peuvent réaliser des performances impressionnantes dans les compétitions de freestyle, tout en offrant un spectacle spectaculaire pour les spectateurs.";
        $trick->setName('japanese Air')
            ->setUser($user)
            ->setContent($content)
            ->setImage(2)
            ->setVideo('cqTBHlXKNCA|1IjARDZMdjs')
            ->setCategory($category)
            ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($trick);

        $trick2 = new Trick();
        $content= " Le nose grab est une figure de ski freestyle qui consiste à sauter en l'air et à attraper la pointe avant (nose) des skis avec la main. Cette figure est souvent réalisée lors de sauts sur des bosses ou des rampes et elle peut être combinée avec d'autres figures pour créer des enchaînements spectaculaires.
        Pour réaliser un nose grab, le skieur commence par prendre de la vitesse et se préparer à sauter. Au moment de décoller, il saute en l'air en gardant les jambes légèrement fléchies et en ramenant les skis vers le corps. Ensuite, le skieur tend le bras vers l'avant pour attraper la pointe avant des skis avec la main.
        
        Lors de cette figure, il est important de garder une position de ski stable et équilibrée en l'air pour éviter tout déséquilibre lors de l'atterrissage. Pour cela, le skieur doit garder les skis écartés et les jambes fléchies pour absorber l'impact de l'atterrissage. Le maintien de la position de ski stable permet également de maintenir le contrôle sur la trajectoire de descente et d'éviter les chutes.
        
        Le nose grab est une figure populaire dans les compétitions de ski freestyle, car elle est relativement facile à réaliser et peut être combinée avec d'autres figures pour créer des enchaînements spectaculaires. Les skieurs les plus expérimentés peuvent ajouter une rotation de 180 ou 360 degrés pendant la figure pour la rendre encore plus impressionnante.
        
        En somme, le nose grab est une figure de ski freestyle qui consiste à attraper la pointe avant des skis avec la main pendant un saut en l'air. C'est une figure relativement facile à réaliser pour les skieurs expérimentés et elle peut être combinée avec d'autres figures pour créer des enchaînements spectaculaires.";
        $trick2->setName('nose grabe')
            ->setUser($user)
            ->setContent($content)
            ->setImage(3)
            ->setVideo('MJZLgBFGuto|cwdyCFEb6jM')
            ->setCategory($category)
            ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($trick2);

        $category2 = new Category();
        $category2->setTitle('Rotations');
        $manager->persist($category2);

        $trick3 = new Trick();
        $content= "La figure de ski 360 est une figure de freestyle qui consiste à effectuer une rotation complète de 360 degrés dans les airs. Cette figure est réalisée lors de sauts sur des bosses ou des rampes et est souvent combinée avec d'autres figures pour créer des enchaînements spectaculaires.

Pour réaliser un 360, le skieur commence par prendre de la vitesse et se préparer à sauter. Au moment de décoller, il saute en l'air en gardant les skis écartés et les pointes légèrement vers l'extérieur. Il commence alors à pivoter autour de son axe longitudinal, en tournant vers l'avant, tout en gardant les skis parallèles.

Le skieur doit maintenir une position de ski stable et équilibrée pendant la rotation, en gardant les jambes fléchies et en contrôlant la position des skis. Il doit également garder un bon alignement corporel pour maintenir une trajectoire de descente stable et éviter les chutes.

Une fois que le skieur a effectué un tour complet dans les airs, il doit se préparer à l'atterrissage en gardant les skis écartés et les jambes fléchies pour absorber l'impact. Le maintien d'une position de ski stable et équilibrée est crucial pour une réception réussie et pour éviter tout risque de blessure.

Le 360 est une figure de ski freestyle très populaire et très impressionnante pour les spectateurs. Les skieurs les plus expérimentés peuvent ajouter des variations à cette figure, comme des rotations multiples ou des sauts acrobatiques pour encore plus de spectacle.

En somme, la figure de ski 360 consiste en une rotation complète de 360 degrés dans les airs pendant un saut sur une bosse ou une rampe. C'est une figure technique et spectaculaire qui peut être combinée avec d'autres figures pour créer des enchaînements encore plus impressionnants ";
        $trick3->setName('360')
            ->setUser($user)
            ->setContent($content)
            ->setImage(1)
            ->setVideo('ENalkvktYAI')
            ->setCategory($category2)
            ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($trick3);

        $trick4 = new Trick();
        $content= "La figure de ski 720 est une figure de freestyle qui consiste à effectuer deux rotations complètes de 360 degrés dans les airs. Cette figure est réalisée lors de sauts sur des bosses ou des rampes et est considérée comme l'une des figures les plus difficiles à réaliser en ski freestyle.

Pour réaliser un 720, le skieur commence par prendre de la vitesse et se préparer à sauter. Au moment de décoller, il saute en l'air en gardant les skis écartés et les pointes légèrement vers l'extérieur. Il commence alors à pivoter autour de son axe longitudinal, en tournant vers l'avant, tout en gardant les skis parallèles.

Le skieur doit maintenir une position de ski stable et équilibrée pendant la première rotation de 360 degrés. Ensuite, il doit se préparer pour la deuxième rotation en pivotant autour de son axe longitudinal, tout en gardant le contrôle de la position des skis. Pendant cette deuxième rotation, le skieur doit rester concentré et garder une position de ski stable et équilibrée pour préparer l'atterrissage.

Une fois que le skieur a effectué deux tours complets dans les airs, il doit se préparer à l'atterrissage en gardant les skis écartés et les jambes fléchies pour absorber l'impact. Le maintien d'une position de ski stable et équilibrée est crucial pour une réception réussie et pour éviter tout risque de blessure.

Le 720 est une figure de ski freestyle extrêmement difficile et spectaculaire pour les spectateurs. Seuls les skieurs les plus expérimentés peuvent réaliser cette figure, qui nécessite une grande habileté technique, une bonne condition physique et beaucoup d'entraînement. Les skieurs les plus talentueux peuvent ajouter des variations à cette figure, comme des sauts acrobatiques pour encore plus de spectacle.

En somme, la figure de ski 720 consiste en deux rotations complètes de 360 degrés dans les airs pendant un saut sur une bosse ou une rampe. C'est une figure très technique et très spectaculaire qui est réservée aux skieurs les plus expérimentés.";
        $trick4->setName('720')
            ->setUser($user)
            ->setContent($content)
            ->setImage(1)
            ->setVideo('kYytUespFBs|vN7YdmFgr8E')
            ->setCategory($category2)
            ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($trick4);
        $trick5 = new Trick();
        $content= "La figure de ski 1080 est une figure de freestyle qui consiste à effectuer trois rotations complètes de 360 degrés dans les airs. Cette figure est réalisée lors de sauts sur des bosses ou des rampes et est considérée comme l'une des figures les plus difficiles à réaliser en ski freestyle.

Pour réaliser un 1080, le skieur commence par prendre de la vitesse et se préparer à sauter. Au moment de décoller, il saute en l'air en gardant les skis écartés et les pointes légèrement vers l'extérieur. Il commence alors à pivoter autour de son axe longitudinal, en tournant vers l'avant, tout en gardant les skis parallèles.

Le skieur doit maintenir une position de ski stable et équilibrée pendant la première rotation de 360 degrés. Ensuite, il doit se préparer pour la deuxième rotation en pivotant autour de son axe longitudinal, tout en gardant le contrôle de la position des skis. Pendant cette deuxième rotation, le skieur doit rester concentré et garder une position de ski stable et équilibrée pour préparer la troisième rotation.

Une fois que le skieur a effectué trois tours complets dans les airs, il doit se préparer à l'atterrissage en gardant les skis écartés et les jambes fléchies pour absorber l'impact. Le maintien d'une position de ski stable et équilibrée est crucial pour une réception réussie et pour éviter tout risque de blessure.

Le 1080 est une figure de ski freestyle extrêmement difficile et spectaculaire pour les spectateurs. Seuls les skieurs les plus expérimentés peuvent réaliser cette figure, qui nécessite une grande habileté technique, une bonne condition physique et beaucoup d'entraînement. Les skieurs les plus talentueux peuvent ajouter des variations à cette figure, comme des sauts acrobatiques ou des grabs pour encore plus de spectacle.

En somme, la figure de ski 1080 consiste en trois rotations complètes de 360 degrés dans les airs pendant un saut sur une bosse ou une rampe. C'est une figure très technique et très spectaculaire qui est réservée aux skieurs les plus expérimentés et les plus talentueux.";
        $trick5->setName('1080')
            ->setUser($user)
            ->setContent($content)
            ->setImage(1)
            ->setVideo('quBqLQoT3iU')
            ->setCategory($category2)
            ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($trick5);

        $category3 = new Category();
        $category3->setTitle('Les flips');
        $manager->persist($category3);

        $trick6 = new Trick();
        $content= "La figure de ski front flip est une figure de freestyle qui consiste à effectuer une rotation avant complète de 360 degrés en sautant sur une bosse ou une rampe. Cette figure est considérée comme l'une des figures les plus acrobatiques et spectaculaires du ski freestyle.

Pour réaliser un front flip, le skieur commence par prendre de la vitesse et se préparer à sauter sur la bosse ou la rampe. Au moment de décoller, le skieur pousse sur ses jambes pour sauter en l'air en gardant les skis parallèles et les pointes légèrement vers l'avant. Ensuite, il doit fléchir les jambes pour pousser son corps vers l'avant et amorcer la rotation avant.

Le skieur doit garder les bras tendus devant lui pour aider à stabiliser la figure et maintenir un équilibre. Pendant la rotation, le skieur doit maintenir une position de ski stable et équilibrée, tout en surveillant son atterrissage. Une fois qu'il a effectué une rotation complète de 360 degrés, le skieur doit se préparer à l'atterrissage en fléchissant les jambes pour absorber l'impact.

La réalisation d'un front flip est très difficile et nécessite une grande habileté technique et une bonne condition physique. Les skieurs doivent s'entraîner pendant des années pour être capables de réaliser cette figure. Ils doivent également posséder une grande confiance en eux pour surmonter la peur de la chute et de l'échec.

Le front flip est une figure très spectaculaire pour les spectateurs, qui apprécient la complexité et la difficulté de cette figure. Les skieurs les plus talentueux peuvent ajouter des variations à cette figure, comme des grabs pour encore plus de spectacle.

En somme, la figure de ski front flip consiste en une rotation avant complète de 360 degrés pendant un saut sur une bosse ou une rampe. C'est une figure très acrobatique et spectaculaire qui est réservée aux skieurs les plus expérimentés et les plus talentueux.";
        $trick6->setName('front flips')
            ->setUser($user)
            ->setContent($content)
            ->setImage(2)
            ->setVideo('c_LUWXkGSYU|ghwZvrJi2fg')
            ->setCategory($category3)
            ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($trick6);

        $trick7 = new Trick();
        $content= "";
        $trick7->setName('back flip')
            ->setUser($user)
            ->setContent($content)
            ->setImage(1)
            ->setVideo('ghwZvrJi2fg|UYqVARb7RfQ')
            ->setCategory($category3)
            ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($trick7);

        $manager->flush();
    }
}
