<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Adoptant;
use App\Entity\Dog;
use App\Entity\Annonce;
use App\Entity\Annonceur;
use App\Entity\Breed;
use App\Entity\Categorie;
use App\Entity\DemandeAdoption;
use App\Entity\Image;
use App\Entity\Message;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        ////////////ADOPTANT////////////

        // $adoptants = [];
        // for ($i = 0; $i < 20; $i++) {
        //     $adoptant = new Adoptant();
        //     $adoptant->setNom('nom '.$i);
        //     $adoptant->setPrenom('prenom '.$i);
        //     $adoptant->setTelephone('telephone '.$i);
        //     $adoptant->setVille('ville '.$i);
        //     $adoptant->setDepartement('departement '.$i);
        //     $adoptant->setResidence('residence '.$i);
        //     $adoptant->setEmail('email'.$i.'@gmail.com');

        //     $mdp = $this->passwordHasher->hashPassword($adoptant, 'mdp'.$i);
        //     $adoptant->setMotDePasse($mdp);

        //     $manager->persist($adoptant);
        //     $adoptants[$i] = $adoptant;
        // }

        ////////////MESSAGE////////////

        // $messages = [];
        // for ($i = 0; $i < 20; $i++) {
        //     $message = new Message();
        //     $message->setText('text '.$i);
        //     $manager->persist($message);
        //     $messages[$i] = $message;
        // }

        ////////////DEMANDE ADOPTION////////////

        // $demandeAdoptions = [];
        // for ($i = 0; $i < 20; $i++) {
        //     $demandeAdoption = new DemandeAdoption();
        //     $demandeAdoption->addAdoptant($adoptants[$i]);
        //     $demandeAdoption->addMessage($messages[$i]);
        //     $manager->persist($demandeAdoption);
        //     $demandeAdoptions[$i] = $demandeAdoption;
        // }

        // ////////////BREED////////////

        // $breeds = [];
        // for ($i = 0; $i < 20; $i++) {
        //     $breed = new Breed();
        //     $breed->setNom('nom '.$i);
        //     $manager->persist($breed);
        //     $breeds[$i] = $breed;
        // }


            ////////////BREED////////////
            $bs = [];
            $breeds = ['Labrador', 'Golden Retriever', 'Berger Allemand', 'Cavalier King Charles', 'Beagle', 'Husky de Sibérie', 'Teckel', 'Bouvier Bernois', 'Jack Russell', 'Berger Blanc Suisse', 'Shih Tzu', 'Saint-Bernard', 'Malamute de Alaska'];
            foreach ($breeds as $b) {
                $breed = new Breed();
                $breed->setNom($b);
                $manager->persist($breed);
                $bs[] = $breed;
            }

        ////////////IMAGE////////////
        $img = [];
        $images = [
            ['img\Arturo\43951_h300.jpg','img\Arturo\43956_h300.jpg','img\Arturo\43957_h300.jpg','img\Arturo\143960_w900h722cx294cy189.jpg','img\Arturo\arthuro.jpg'],
            ['img\BLAZE\443776_0.jpg','img\BLAZE\443776_1.jpg','img\BLAZE\443776_2.jpg','img\BLAZE\443776_3.jpg','img\BLAZE\443776_4.jpg'],['img\LORD GASPARD II\507184_0.jpg','img\LORD GASPARD II\507184_1.jpg','img\LORD GASPARD II\507184_2.jpg','img\LORD GASPARD II\507184_3.jpg','img\LORD GASPARD II\507184_4.jpg'],
            ['img\MAX\505833_0.jpg','img\MAX\505833_1.jpg','img\MAX\505833_2.jpg','img\MAX\505833_3.jpg','img\MAX\505833_4.jpg'],
            ['img\POUIK\507364_0.jpg','img\POUIK\507364_1.jpg','img\POUIK\507364_2.jpg','img\POUIK\507364_3.jpg','img\POUIK\507364.jpg'],
            ['img\PYPPERS\507330_0.jpg','img\PYPPERS\507330_1.jpg','img\PYPPERS\507330_2.jpg','img\PYPPERS\507330_3.jpg','img\PYPPERS\507330_4.jpg'],
            ['img\SAYA\274263_0.jpg','img\SAYA\274263_3.jpg','img\SAYA\274263_4.jpg','img\SAYA\274263_5.jpg','img\SAYA\274263_6.jpg'],
            ['img\SHIPER\485110_0.jpg','img\SHIPER\485110_1.jpg','img\SHIPER\485110_2.jpg','img\SHIPER\485110_3.jpg','img\SHIPER\485110.jpg']
        ];
        // foreach ($images as $imgs) {
        //     foreach ($imgs as $i) {
        //         $image = new Image();
        //         $image->setUrlImage($i);
        //         $manager->persist($image);
        //         $img[] = $image;
        //     }
        // }

        ////////////DOGS////////////
        $do = [];
        $dogs = [[$bs[0],'Patrick','A eu la galle','Contrairement à ce que son nom pourrait laisser entendre, le Berger australien n’est pas originaire d’Australie, mais du Pays basque.',false, true, true],

        [$bs[1],'Robert','Pas vacciné','Les ancêtres du Beagle étaient présents en Grèce antique comme l’attestent plusieurs sources. Les historiens supposent que ces chiens courants ont ensuite été importés par les Romains au moment de la conquête de l’Angleterre.',false, true, false],

        [$bs[2],'Gerard','non castré','Le Malamute de l’Alaska, plus simplement appelé Malamute, est un chien de traîneau aux origines anciennes, utilisé depuis très longtemps par la tribu inuit des Mahlemiuts, à qui il doit son nom',false, true, true],

        [$bs[3],'Alfred','Puces frequentes','Le Cavalier King Charles Spaniel est un petit épagneul originaire d’Angleterre. Ses origines sont anciennes : son ancêtre, le King Charles Spaniel était l’animal de prédilection du roi Charles II d’Angleterre, au XVIIe siècle, d’où son nom',false, true, true],

        [$bs[4],'George','A eu un accident','Le Berger allemand a vu le jour en Allemagne à la fin du XIXe siècle. La paternité de la race est attribuée à Marc Emil Frederic von Stephanitz.',false, true, false]];
        foreach ($dogs as $key => $d) {
            $dog = new Dog();
            $dog->addBreed($d[0]);
            $imagesForDog = $images[$key];
            foreach ($imagesForDog as $imageForDog) {
                $image = new Image();
                $image->setUrlImage($imageForDog);
                $manager->persist($image);
                $img[] = $image;
                $dog->addImage($image);
            }
            $dog->setNom($d[1]);
            $dog->setAntecedents($d[2]);
            $dog->setDescription($d[3]);
            $dog->setEstAdopte($d[4]);
            $dog->setEstTolerant($d[5]);
            $dog->setIfLof($d[6]);
            $manager->persist($dog);
            $do[] = $dog;
        }
        ////////////ANNONCES////////////

        $annon = [];
        $annonces = [[$do[0],'Annonce1',new \DateTime("now")],
        [$do[1],'Annonce2',new \DateTime("now")],
        [$do[2],'Annonce3',new \DateTime("now")],
        [$do[3],'Annonce4',new \DateTime("now")],
        [$do[4],'Annonce5',new \DateTime("now")]];
        foreach ($annonces as $ann) {
            $annonce = new Annonce();
            $annonce->addDog($ann[0]);
            $annonce->setTitre($ann[1]);
            $annonce->setDateMAJ(new \DateTime("now"));
            $manager->persist($annonce);
            $annon[] = $annonce;
        }

        ////////////ANNONCEUR////////////

        $annonceurs = [];
        $annonceur = new Annonceur();
        foreach($annon as $ann) {
            $annonceur->addAnnonce($ann);
        }
        $annonceur->setNom('spa');
        $annonceur->setPrenom('spa');
        $annonceur->setTelephone('0686822860');
        $annonceur->setVille('Marseille ');
        $annonceur->setDepartement('13 ');
        $annonceur->setResidence('les palmiers ');
        $annonceur->setEmail('email@gmail.com');

        $mdp = $this->passwordHasher->hashPassword($annonceur, '123');
        $annonceur->setMotDePasse($mdp);

        $manager->persist($annonceur);
        $annonceurs[] = $annonceur;

        ////////////CATEGORIE////////////

        $catego = [];
        $categories = [[$annonceurs[0], 'désignation c pk deja']];
        foreach ($categories as $cate) {
            $categorie = new Categorie();
            $categorie->addAnnonceur($cate[0]);
            $categorie->setDesignation($cate[1]);
            $manager->persist($categorie);
            $catego[] = $categorie;
        }

        ////////////ADMIN////////////

            $ad = [];
            $admins = [['Melanger','Antoine','0686822860','Aix-en-Provence','Bouche du Rhone','les palmiers','antoine.melanger@laposte.net','123'],['Derieux','Yannick','0472392832','Oullins','Rhône','Irini','yderieux@stagiaire-humanbooster.com','123'],['Berabez','Djelloul','0426303122','Beni Djellil','bejaia','village beni djellil','djelloul.be@gmail.com','123']
        ];
            foreach ($admins as $a) {
            $admin = new Admin();
            $admin->setNom($a[0]);
            $admin->setPrenom($a[1]);
            $admin->setTelephone($a[2]);
            $admin->setVille($a[3]);
            $admin->setDepartement($a[4]);
            $admin->setResidence($a[5]);
            $admin->setEmail($a[6]);
            $mdp = $this->passwordHasher->hashPassword($admin,$a[7]);
            $admin->setMotDePasse($mdp);
            $manager->persist($admin);
        }
        $manager->flush();
    }
}
