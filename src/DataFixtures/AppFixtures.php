<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Adoptant;
use App\Entity\Dog;
use App\Entity\Annonce;
use App\Entity\Annonceur;
use App\Entity\Breed;
use App\Entity\Categorie;
use App\Entity\DamandeAdoption;
use App\Entity\Image;
use App\Entity\Message;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        ////////////ADOPTANT////////////

        $adoptants = [];
        for ($i = 0; $i < 20; $i++) {
            $adoptant = new Adoptant();
            $adoptant->setNom('nom '.$i);
            $adoptant->setPrenom('prenom '.$i);
            $adoptant->setEmail('email '.$i);
            $adoptant->setTelephone('telephone '.$i);
            $adoptant->setVille('ville '.$i);
            $adoptant->setDepartement('departement '.$i);
            $adoptant->setResidence('residence '.$i);
            $adoptant->setEmail('email '.$i);
            $adoptant->setMotDePasse('mdp '.$i);
            $manager->persist($adoptant);
            $adoptants[$i] = $adoptant;
        }

        ////////////MESSAGE////////////

        $messages = [];
        for ($i = 0; $i < 20; $i++) {
            $message = new Message();
            $message->setText('text '.$i);
            $manager->persist($message);
            $messages[$i] = $message;
        }

        ////////////DEMANDE ADOPTION////////////

        $damandeAdoptions = [];
        for ($i = 0; $i < 20; $i++) {
            $damandeAdoption = new DamandeAdoption();
            $damandeAdoption->addAdoptant($adoptants[$i]);
            $damandeAdoption->addMessage($messages[$i]);
            $manager->persist($damandeAdoption);
            $damandeAdoptions[$i] = $damandeAdoption;
        }

        ////////////BREED////////////

        $breeds = [];
        for ($i = 0; $i < 20; $i++) {
            $breed = new Breed();
            $breed->setNom('nom '.$i);
            $manager->persist($breed);
            $breeds[$i] = $breed;
        }


        ////////////IMAGE////////////

        $images = [];
        for ($i = 0; $i < 20; $i++) {
            $image = new Image();
            $image->setUrlImage('url '.$i);
            $manager->persist($image);
            $images[] = $image;
        }


        ////////////DOGS////////////
        $dogs = [];
        for ($i = 0; $i < 20; $i++) {
            $dog = new Dog();
            $dog->addBreed($breeds[$i]);
            // $dog->setAnnonce($annonces[$i]);
            $dog->addImage($images[$i]);
            $dog->setNom('nom '.$i);
            $dog->setAntecedents('antecedents '.$i);
            $dog->setDescription('description '.$i);
            $dog->setEstAdopte($i % 2 == 0);
            $dog->setEstTolerant($i % 2 == 0);
            $dog->setIfLof($i % 2 == 0);
            $manager->persist($dog);
            $dogs[] = $dog;
        }


        ////////////ANNONCES////////////

        $annonces = [];
        for ($i = 0; $i < 20; $i++) {
            $annonce = new Annonce();
            // for ($j = 0; $j <= mt_rand(1, 3); $j++) {
                // $number = mt_rand(0, 19);
                // $dog = $dogs[$number];
                $annonce->addDog($dogs[$i]);
                $annonce->addDamandeAdoption($damandeAdoptions[$i]);
            // }
            $annonce->setTitre('titre '.$i);
            $annonce->setDateMAJ(new \DateTime("now"));
            $manager->persist($annonce);

            $annonces[$i] = $annonce;
        }

        ////////////ANNONCEUR////////////

        $annonceurs = [];
        for ($i = 0; $i < 20; $i++) {
            $annonceur = new Annonceur();
            $annonceur->addAnnonce($annonces[$i]);
            $annonceur->setNom('nom '.$i);
            $annonceur->setPrenom('prenom '.$i);
            $annonceur->setEmail('email '.$i);
            $annonceur->setTelephone('telephone '.$i);
            $annonceur->setVille('ville '.$i);
            $annonceur->setDepartement('departement '.$i);
            $annonceur->setResidence('residence '.$i);
            $annonceur->setEmail('email '.$i);
            $annonceur->setMotDePasse('mdp '.$i);
            $manager->persist($annonceur);
            $annonceurs[$i] = $annonceur;
        }


        ////////////CATEGORIE////////////

        $categories = [];
        for ($i = 0; $i < 20; $i++) {
            $categorie = new Categorie();
            $categorie->addAnnonceur($annonceurs[$i]);
            $categorie->setDesignation('designation '.$i);
            $manager->persist($categorie);
            $categories[$i] = $categorie;
        }


        ////////////ADMIN////////////


        for ($i = 0; $i < 20; $i++) {
            $admin = new Admin();
            $admin->setNom('nom '.$i);
            $admin->setPrenom('prenom '.$i);
            $admin->setEmail('email '.$i);
            $admin->setTelephone('telephone '.$i);
            $admin->setVille('ville '.$i);
            $admin->setDepartement('departement '.$i);
            $admin->setResidence('residence '.$i);
            $admin->setEmail('email '.$i);
            $admin->setMotDePasse('mdp '.$i);
            $manager->persist($admin);
        }
        $manager->flush();
    }
}
