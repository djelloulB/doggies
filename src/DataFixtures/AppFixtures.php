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
            $breeds = ['Caniche','Autre','Berger','Berger belge Malinois','Bouledogue francais','Chien loup de Saarloos','Berger picard','Berger des Pyrenees','Labrador', 'Golden Retriever', 'Berger Allemand', 'Cavalier King Charles', 'Beagle', 'Husky de Sib??rie', 'Teckel', 'Bouvier Bernois', 'Jack Russell', 'Berger Blanc Suisse', 'Shih Tzu', 'Saint-Bernard', 'Malamute de Alaska'];
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
            ['img\BLAZE\443776_0.jpg','img\BLAZE\443776_1.jpg','img\BLAZE\443776_2.jpg','img\BLAZE\443776_3.jpg','img\BLAZE\443776_4.jpg'],
            ['img\LORD GASPARD II\507184_0.jpg','img\LORD GASPARD II\507184_1.jpg','img\LORD GASPARD II\507184_2.jpg','img\LORD GASPARD II\507184_3.jpg','img\LORD GASPARD II\507184_4.jpg'],
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
        $dogs = [[$bs[0],'Arturo','A eu la galle',"Arturo est un ancien chien de cirque. Recueilli par un riche milliardaire apr??s la mort de ses parents trap??zistes. Arturo sait que ses parents ne sont pas morts accidentellement. En voulant se venger, il d??couvre le transformisme.  Gr??ce ?? ses dons en m??tamorphose il fit plusieurs missions impossibles. Mais ?? la suite de trouble de stress post-traumatique il d??veloppa des symptomes de trouble de l'identit??. Arturo est une vrais diva qui n??cessite un budget toilettage cons??quent qui sera entierement prise en charge par sa retraite d'ancien combattant.",false, true, true],

        [$bs[1],'Blaze ','Pas vaccin??',"Blaze est une cr??me de chien. Calme, propre, il peut rester seul sans faire de b??tises. Il s'adaptera rapidement dans son nouveau foyer. Il devra ??tre le seul animal de la famille. Il sait se montrer bon gardien, il faudra donc faire attention avec les inconnus et il ne pourra pas vivre avec des enfants.",false, true, false],

        [$bs[2],'Lord gaspard 2','non castr??',"Arriv?? le 23 ao??t 2018 de Guadeloupe apr??s un pass?? douloureux puisqu'il ??tait battu lorsqu'il dormait et utilis?? pour des combats de chiens; Lord a rapidement rejoint un foyer pendant plusieurs mois, avant de revenir au refuge en mai 2019. M??me si celui-ci n'a pas toujours ??t?? tendre envers lui, Lord ne garde aucune rancoeur envers l'humain avec lequel il est adorable. Toutefois, de par son pass??, nous pr??f??rons le placer sans enfants (contacter le refuge pour plus de renseignements). V??ritable gourmand, Lord sait faire assis et donne la patte si on le lui demande. Agr??able ?? promener, Lord est une bonne patte. Il ne tire pas en laisse et est plut??t tranquille; sauf lorsqu'il se retrouve face ?? ses cong??n??res, avec lesquels il peut se montrer r??actif. Joueur (il adore par ailleurs son ballon), Lord est un chien reconnaissant; qui m??rite de d??couvrir ce qu'est une vraie vie de chien !",false, true, true],

        [$bs[3],'Max','Puces frequentes',"Le beau Max nous vient d'un autre refuge apr??s y avoir pass?? deux ans... C'est un chien adorable, tr??s c??lin, qui cherche par tous les moyens ?? nous faire plaisir, tr??s gourmand, sage en balade (un peu coquin avec les voitures mais son ancien refuge a fait un gros travail l?? dessus qui a tr??s bien march??). Il cherche des adoptants connaisseurs de sa race, et pouvant continuer l'??ducation positive avec lui car c'est ce qu'il demande. Il devra ??tre le seul animal du foyer et ne pourra pas vivre avec de jeunes enfants. Un placement en maison sans escaliers sera mieux pour lui car du fait de son ??ge il commence ?? avoir de petites faiblesses. N'h??sitez pas ?? venir le rencontrer, et ne vous fiez pas ?? sa pr??sentation la premi??re fois que vous le voyez, il ne reste pas longtemps comme ??a mais oui effectivement il faudra revenir le voir plusieurs fois !",false, true, true],

        [$bs[4],'Pouik','A eu un accident',"Pouik est une adorable chienne tr??s courageuse et patiente. Arriv??e au refuge avec ses 7 chiots, elle a pass?? ses 2 derniers mois en famille d'accueil pour plus de confort avec ses b??b??s. Depuis leurs retours au refuge, les petits n'ont pas eu de mal ?? trouver leur nouveau foyer. A son tour de trouver le sien pour la vie. Pouik est une chienne calme, tr??s c??line, et ?? l'??coute. Elle tol??re les autres chiens si ils la laissent tranquille. Par contre madame n'aime pas du tout les chats et est une vraie chasseuse lorsqu'elle a flair?? quelque chose! Un jardin clos sera n??cessaire.",false, true, false],

        [$bs[5],'Pyppers','chien battu',"Craintive et peu s??re d'elle, Pyppers doit partir imp??rativement avec un autre chien de son gabarit d??j?? pr??sent au foyer et en pavillon bien cl??tur??.",false, true, true],

        [$bs[6],'Saya',"gardien d'ath??na","Saya a ??t?? retir??e pour mauvais traitements, elle vivait dans une cave et n'a donc jamais connu le monde ext??rieur. Son pass?? tr??s difficile fait qu'elle est tr??s r??active ?? toute nouvelle stimulation (animaux, inconnus, bruits, gestes brusques...), et elle aura besoin de ma??tres avertis connaissant bien les chiens. Et lorsqu'elle aura confiance en vous, vous d??couvrirez une chienne hyper c??line, ob??issante et tellement attachante! Saya ne s'entend pas avec les autres animaux et devra donc ??tre le seul animal du foyer. N'h??sitez pas ?? contacter le refuge pour avoir plus d'informations sur la belle Saya.",false, true, false],

        [$bs[7],'Shiper','arr??te de chiper',"Notre gentil Shiper est le doyen du refuge, c'est un chien au regard attendrissant. Il n'est plus tout jeune et la vie au refuge ne lui convient pas. Un environnement calme sans enfant sera n??cessaire. Il n'aime pas la contrainte et aime avoir sa tranquillit??. Il a ??t?? trouv?? errant de ce fait nous ne connaissons pas son pass??. Venez vite le rencontrer et lui offrir sa chance , l'hiver au refuge est rude pour nos papies et mamies.",false, true, true]];
  
        foreach ($dogs as $key => $d) {
            $dog = new Dog();
            $dog->addBreed($d[0]);
            $imagesForDog = $images[$key];
            foreach ($imagesForDog as $imageForDog) {
                $pathWithoutImg = substr($imageForDog, 4);
                $image = new Image();
                $image->setImageName($pathWithoutImg);
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

        $annonces = [];
        for ($i = 0; $i < count($dogs); $i++) {
            $annonces[] = [$do[$i],'Annonce'.$i,new \DateTime("now")];
        }

    
        foreach ($annonces as $ann) {
            $annonce = new Annonce();
            $annonce->addDog($ann[0]);
            $annonce->setTitre($ann[1]);
            $annonce->setDateMAJ(new \DateTime("now"));
            $manager->persist($annonce);
            $annon[] = $annonce;
        }

        ////////////ANNONCEUR////////////
        $annonceurs = array(
            1 => array (
                "image"  => 'https://www.wikichien.fr/wp-content/uploads/sites/4/60cd9e2dbe351-1024x576.jpeg',
                "nom" => 'CHARRETTE ',
                "prenom"   => 'JANINE',
                "email" => "info@lagaidocienne",
                "motDePasse" => "",
                'residence' => '1101 Chemin de Cladier',
                'ville'=> 'Saint-Paul-les-Fonts',
                'telephone'=> '0608900580',
                'departement' => 'Gard',
                
            ),2 => array (
                "image"  => 'https://www.wikichien.fr/wp-content/uploads/sites/4/lac_jpeg-400x298.jpg',
                "nom" => 'GAUBERT',
                "prenom"   => 'NICOLAS',
                "email" => "gaubert@fr.fr",
                "motDePasse" => "",
                'residence' => '42 Rue des Pyr??n??es',
                'ville'=> 'BAZET',
                'telephone'=> '0630154560',
                'departement' => 'Hautes-Pyr??n??es',
                
            ), 3 =>     
            array (
                "image"  => 'https://v.fastcdn.co/u/dacf0b1a/50971768-0-50436040-0-SPA-1.png',
                "nom" => 'Refuge de Lyon-Marennes',
                "prenom"   => 'Pierre',
                "email" => "info@lagaidocienne",
                "motDePasse" => "",
                'residence' => '660, chemin de Chantemerle',
                'ville'=> 'BAZET',
                'telephone'=> '0610203040',
                'departement' => 'Hautes-Pyr??n??es'
            )
        );
        $listAnnonceurs = [];
        foreach($annonceurs as $annonceur) {
            $a = new Annonceur();
           
            $a->setNom($annonceur["nom"]);
            $a->setPrenom($annonceur["prenom"]);
            $a->setTelephone($annonceur["telephone"]);
            $a->setVille($annonceur["ville"]);
            $a->setDepartement($annonceur["departement"]);
            $a->setResidence($annonceur["residence"]);
            $a->setEmail($annonceur["email"]);
            $a->setMotDePasse($this->passwordHasher->hashPassword($a,'123'));
            $a->setImage($annonceur["image"]);
            //$manager est une variable de type entity manager
            $manager->persist($a);
            $listAnnonceurs[] = $a;
        }
       

        ////////////CATEGORIE////////////

        $catego = [];
            //On creer un objet categorie
            $categorie = new Categorie();
            //On va parcourir nos annonceurs pour leur affecter une categorie
            foreach($listAnnonceurs as $annonceur){
                $annonceur->setCategorie($categorie);
            }
            //on ajoute une designation a notre objet categorie
            $categorie->setDesignation('SPA');
            $manager->persist($categorie);
            $catego[] = $categorie;
     

        ////////////ADMIN////////////

            $ad = [];
            $admins = [['Melanger','Antoine','0686822860','Aix-en-Provence','Bouche du Rhone','les palmiers','antoine.melanger@laposte.net','123'],['Derieux','Yannick','0472392832','Oullins','Rh??ne','Irini','yderieux@stagiaire-humanbooster.com','123'],['Berabez','Djelloul','0426303122','Beni Djellil','bejaia','village beni djellil','djelloul.be@gmail.com','123']
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
