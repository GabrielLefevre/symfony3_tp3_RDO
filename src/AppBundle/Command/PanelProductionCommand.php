<?php

/**
 * Created by PhpStorm.
 * User: DEV2
 * Date: 27/03/2017
 * Time: 13:39
 */
namespace AppBundle\Command;

use AppBundle\Entity\PanelProduction;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PanelProductionCommand extends Command
{
    public function configure() {
        $this
            ->setName('app:rdo')
            ->setDescription('blblblblb');
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $ligne = 1;
        $fic = fopen("affichage.csv", "a+");
        $tab=fgetcsv($fic,1024,',');
        while($ligne<2)
        {
            $champs = count($tab);
            $output->writeln([
                '==========================',
                $ligne,
                '==========================']);


            for($i=0; $i<$champs; $i ++)
            {
                $output->writeln(
                    $tab[$i]);
            }
            $ligne++;
        }

        while($tab=fgetcsv($fic,1024,',')) {
            $pp = new PanelProduction();
            $pp->setId($tab[0]);
            $pp->setSerialnumber($tab[1]);
            $pp->setMadeAt($tab[3]);
            $pp->setProfile($this->profileRDO($tab[7]));
            $pp->setStructure($this->structureRDO($tab[8]));
            $pp->setRal($this->ralRDO($tab[10]));
            $pp->setCableBy($this->cableByRDO($tab[17]));
            $pp->setRegul($this->regulRDO($tab[20]));
            $pp->setBacklighting($tab[15]);
            $pp->setRebootModem(); // ???????
            $pp->setTriLed($this->triLedRDO($tab[12]));
            $pp->setPowerSupply($this->powerSuplyRDO($tab[14]));
            $pp->setOrderSupply($this->orderSuplyRDO($tab[29]));
            $pp->setFlashCard($this->flashCardRDO($tab[26]));
            $pp->setVideoCard($this->videoCardRDO($tab[27]));




        }




    } // execute

    public function profileRDO($profil) {
        if($profil == 6 || $profil == 7 || $profil == 8 || $profil == 9 || $profil == 10 ||  $profil == 11 || $profil == 13 || $profil == 18 ) {
            return "PR116";
        }
        return "PR96";
    }

    public function structureRDO($struct) {
        if($struct === 1 ) {
            return "Simple Face";
        }
        else if($struct === 2) {
            return "Double Face";
        }
        else {
            return "Mural";
        }
    }

    public function ralRDO($ral) {
        switch($ral){
            case 1:
                return 'RAL 9005 Noir Foncé';
            case 2:
                return 'RAL 8017 Brun Chocolat';
            case 3:
                return 'RAL 7043 Gris Trafic B';
            case 5:
                return 'AKZO 2525 Manganese';
            case 6:
                return 'AKZO 2500 Vert';
            case 7:
                return 'RAL 7011 Gris Fer';
            case 8:
                return 'RAL 7021 Gris Noir';
            case 9:
                return 'RAL 7012 Gris Basalte';
            case 10:
                return 'RAL 6015 Olive Noir';
            case 11:
                return 'RAL 7004 Gris de Sécurité';
            case 12:
                return 'RAL 5002 Bleu Outremer';
            case 13:
                return 'RAL 9007 Aluminium Gris';
            case 16:
                return 'RAL 7016 Gris Anthracite';
            case 17:
                return 'AKZO 900 Gris';
            case 18:
                return 'RAL 8014 Brun Sépia';
            case 19:
                return 'AKZO 2650 Brun';
            case 20:
                return 'RAL 9003 Blanc de Sécutité';
            case 21:
                return 'RAL 3003 Rouge Rubis';
            case 22:
                return 'RAL 7015 Gris Ardoise';
            case 23:
                return 'RAL 3004 Rouge Pourpre';
            case 24:
                return 'RAL 7022 Gris Terre d\'ombre';
            case 25:
                return 'RAL 5023 Bleu Distant';
            case 26:
                return 'RAL 7026 Gris Granit';
            case 27:
                return 'BG4515BF4 MG Gris Satine Metal Givre';
            case 28:
                return 'RAL 900 Sable Noir';
        }
    }

    public function cableByRDO($cable) {
        if($cable == 1) {
            return "Centaure Systems";
        }
        else {
            return "Eiffage";
        }
    }

    public function regulRDO($regul) {
        if ($regul == null) {
            return false;
        }
        return true;
    }

    public function triLedRDO ($led) {
        switch ($led){
            case 1:
                return 'Cree Xb-Wp';
            case 2:
                return 'Cree Xb-Wq';
            case 3:
                return 'Cree Xb-Wr';
            case 4:
                return 'Cree Ya-Wp';
            case 5:
                return 'Cree Ya-Wq';
            case 6:
                return 'Cree Ya-Wr';
            case 7:
                return 'Osram V1-5';
            case 8:
                return 'Osram V1-6';
            case 9:
                return 'Cree Wb-A4';
            case 10:
                return 'Cree Wb-A5';
            case 11:
                return 'Cree Xa-A4';
            case 12:
                return 'Cree Xb-A5';
            case 13:
                return 'Cree Ya-Ws';
            case 14:
                return 'Cree Yb-Ws';
            case 15:
                return '2U2W1T-AA';
            case 16:
                return '2U2W2T-AB';
        }
    }

    public function powerSuplyRDO($ps) {
        switch ($ps){
            case 3:
                return  'Emerson Astec 5v';
            case 4:
                return  'Meanwell HRP-450-3.3';
            case 1:
                return 'Meanwell HRP-450-5';
            case 8:
                return  'Meanwell USP 500';
        }
    }

    public function orderSuplyRDO($os) {
        switch ($os){
            case 1:
                return  'Meanwell S100F 12';
            case 2:
                return  'Meanwell RD150 12';
            case 3:
                return 'Meanwell RD50 12';
        }
    }

    public function flashCardRDO($fc) {
        switch ($fc){
            case 1:
                return  '2Go WES W7';
            case 2:
                return  '8Go WES W7';
            case 3:
                return '16Go MSata W7';
        }
    }

    public function videoCardRDO($vc) {
        switch ($vc){
            case 1:
                return  'CENT118B';
            case 2:
                return  'CENT118C';
            case 3:
                return 'CENT118E';
        }
    }


}

// $tab=fgetcsv($fic,1024,';')