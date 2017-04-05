<?php

/**
 * Created by PhpStorm.
 * User: DEV2
 * Date: 27/03/2017
 * Time: 13:39
 */
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\PanelProduction;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PanelProductionCommand extends ContainerAwareCommand
{
    public function configure() {
        $this
            ->setName('app:rdo')
            ->setDescription('blblblblb');
    }

    public function execute(InputInterface $input, OutputInterface $output) {
       //$this->updateTableProdFileSQL();
       $this->defaultV();

    } // execute

    public function convertMAC($mac) {
        $tab_mac = explode("-",$mac);
        $rlt = implode("",$tab_mac);
        return $rlt;

    }

    public function uploadBDD_RDO()
    {
        $fic = fopen("affichage.csv", "a+");
        // $tab=fgetcsv($fic,1024,',');
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $tabPP = array();

        while ($tab = fgetcsv($fic, 4096, ',')) {
            $pp = new PanelProduction();
            $pp->setId($tab[0]);
            $pp->setSerialnumber($tab[1]);
            $pp->setMadeAt($this->convertDate($tab[3]));
            $pp->setProfile($this->profileRDO($tab[7]));
            $pp->setStructure($this->structureRDO($tab[8]));
            $pp->setRal('RAL 7012 Gris Basalte');
            $pp->setCableBy($this->cableByRDO($tab[17]));
            $pp->setRegul(false);
            $pp->setBacklighting(false);
            $pp->setRebootModem(true);
            $pp->setTriLed($this->triLedRDO($tab[12]));
            $pp->setPowerSupply($this->powerSuplyRDO($tab[14]));
            $pp->setOrderSupply($this->orderSuplyRDO($tab[29]));
            $pp->setFlashCard($this->flashCardRDO($tab[26]));
            $pp->setVideoCard($this->videoCardRDO($tab[27]));
            $pp->setVideoOut($this->videoOutRDO($tab[28]));
            $pp->setModem($this->modemRDO($tab[21]));
            $pp->setAntenna($this->antennaRDO($tab[22]));
            $pp->setFixation($this->fixationRDO($tab[30]));
            $pp->setMacif($this->macifRDO($tab[36]));
            $pp->setProtection('Citel MSB10-400');
            $pp->setThermostat('30°');
            $pp->setFilter($this->filterRDO($tab[32]));
            $pp->setFan('Diam. 120');
            array_push($tabPP,$pp);
           // $em->persist($pp);
            // $em->flush();
        }
        return $tabPP;
    }

    public function convertDate($d) {
        $date = new \DateTime($d);
        return $date;
    }

    public function profileRDO($profil) {
        if($profil == 6 || $profil == 7 || $profil == 8 || $profil == 9 || $profil == 10 ||  $profil == 11 || $profil == 13 || $profil == 18 ) {
            return "PR116";
        }
        return "PR96";
    }

    public function structureRDO($struct) {
        if($struct == 1 ) {
            return "Simple Face";
        }
        else if($struct == 2) {
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
            case 29:
                return 'RAL 6002 Vert Feuillage';
            case 30:
                return 'RAL 5018 Bleu Turquoise';
            case 31:
                return 'RAL 9004 Noir de Sécurité';
            case 32:
                return 'RAL 7036 Gris Platine';
            case 33:
                return  'RAL 8019 Brun Gris';
            case 34:
                return 'RAL 8003 Brun Argile';
            case 36:
                return 'RAL 3005 Rouge Vin';
            case 37:
                return 'RAL 6005 Vert Mousse';
            case 38:
                return 'RAL 8016 Brun Acajou';
            case 39:
                return 'RAL 7039 Gris Quartz';
            case 40:
                return 'RAL 8015 Brun Marron';
            case 41:
                return 'RAL 7013 Gris Brun';
            case 42:
                return 'RAL 7001 Gris Argent';
            case 43:
                return 'RAL 6012 Vert Noir';
            case 44:
                return 'RAL 6009 Vert Sapin';
            case 45:
                return 'RAL 7034 Gris Jaune';
            case 46:
                return 'RAL 7038 Gris Agate';
            case 47:
                return 'RAL 7000 Gris Petit-Gris';
            case 48:
                return 'AKZO 2600 Sable';
            case 49:
                return 'RAL 5015 Bleu Ciel';
            case 50:
                return 'RAL 7006 Gris Beige';
            case 51:
                return 'RAL 7046 Gris Télé Gris 2';
            case 52:
                return  'RAL 8011 Brun Noisette';
            case 53:
                return 'RAL 7005 Gris Souris';
            case 54:
                return 'RAL 6020 Oxyde Chromique';
            case 55:
                return 'RAL 7024 Gris Graphite';
            case 56:
                return 'RAL 9017 Noir Trafic';
            case 57:
                return 'RAL 6026 Vert Opale';
            case 58:
                return  'RAL 6007 Vert Bouteille';
            case 59:
                return 'RAL 7033 Gris Ciment';
            case 60:
                return 'RAL 6004 Vert Bleu';
            case 61:
                return 'AKZO 2900 Gris';
            case 63:
                return 'RAL 7009 Gris Vert';
            case 64:
                return 'RAL 1015 Ivoire Clair';
            case 70:
                return 'AKZO 2400 Gris Sable';
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
        if ($regul == "NULL") {
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
            default:
                return 'Cree 00-00';
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
            case 2:
                return 'Meanwell USP500';
            case 5:
                return 'Emmerson Astec 3.3V';
            case 6:
                return 'Meanwell HRP-450-3.3';
            case 7:
                return 'Emmerson Astec 5V';
            case 9:
                return 'Meanwell HRP-450-5';
            case 10:
                return 'Emmerson Astec 4.6V G2';
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

    public function videoOutRDO($vo) {
        switch ($vo) {
            case 1:
                return 'EPM1534';
            case 2:
                return 'CENT127A';
            default:
                return 'CENT127A';
        }
    }

    public function modemRDO($modem) {
        switch($modem) {
            case 1:
                return 'Erco&Gener Genpro 18E';
            case 2:
                return 'T900';
            case 3:
                return 'SIM5360E';
            case 4:
                return  'T5320E (3G)';
            case 5:
                return 'Aucun';
            case 6:
                return 'WPEA 252NI (wifi)';
        }
    }

    public function antennaRDO($a) {
        if ($a == 1) {
            return 'GC500L ( patch )';
        }
        else {
            return 'GC664B ( chapeau )';
        }
    }

    public function fixationRDO($f) {
        switch ($f) {
            case 1:
                return 'Equerres internes';
            case 2:
                return  'Equerres externes';
            case 3:
                return 'Equerres inox';
            case 4:
                return 'Autres';
        }
    }

    public function macifRDO ($m) {
        switch ($m) {
            case 1:
                return 'Neuf';
            case 2:
                return 'Scellement Chimique';
            case 3:
                return 'Contre Plaque';
            case 4:
                return 'Réutilisation';
            case 5:
                return 'Pré-Fabriqué';
            default:
                return 'Autres';
        }

    }

    public function filterRDO ($f) {
        switch ($f) {
            case 1:
                return '16A';
            case 2:
                return '30A';
            case 3:
                return '5A';
        }
    }

    public function rebootModemRDO($m) {
        if ($m == 0) {
            return false;
        }
        else {
            return true;
        }
    }

    private function updateTableProdFileSQL() {
        $fic = fopen("affichage.csv", "a+");
        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        $tabPP = array();
        $tabId = array();
        while ($tab = fgetcsv($fic, 4096, ',')) {
            $pp = new PanelProduction();
            $pp->setSerialnumber($tab[1]);
            $pp->setMadeAt($this->convertDate($tab[3]));
            $pp->setProfile($this->profileRDO($tab[7]));
            $pp->setStructure($this->structureRDO($tab[8]));
            $pp->setRal($this->ralRDO($tab[10]));
            $pp->setCableBy($this->cableByRDO($tab[17]));
            $pp->setRegul($this->regulRDO($tab[20]));
            $pp->setBacklighting($tab[15]);
            $pp->setRebootModem($this->rebootModemRDO($tab[16]));
            $pp->setTriLed($this->triLedRDO($tab[12]));
            $pp->setPowerSupply($this->powerSuplyRDO($tab[14]));
            $pp->setOrderSupply($this->orderSuplyRDO($tab[29]));
            $pp->setFlashCard($this->flashCardRDO($tab[26]));
            $pp->setVideoCard($this->videoCardRDO($tab[27]));
            $pp->setVideoOut($this->videoOutRDO($tab[28]));
            $pp->setModem($this->modemRDO($tab[21]));
            $pp->setAntenna($this->antennaRDO($tab[22]));
            $pp->setFixation($this->fixationRDO($tab[30]));
            $pp->setMacif($this->macifRDO($tab[36]));
            $pp->setProtection('Citel MSB10-400');
            $pp->setThermostat('30°');
            $pp->setFilter($this->filterRDO($tab[32]));
            $pp->setFan('Diam. 120');
            array_push($tabPP,$pp);
            array_push($tabId,$tab[5]);
            $em->persist($pp);
            $em->flush();

        }
        fclose($fic);

        $file = fopen('update_prod.sql', 'r+');
        for ($i=0;$i<count($tabPP);$i++) {
            fputs($file,"UPDATE centoweb_panel SET id_panelproduction = '".$tabPP[$i]->getId()."' WHERE id=".$tabId[$i].";"."\n");
        }
        fclose($file);
    }

    public function defaultV() {
        $fic = fopen("centoweb.csv", "a+");
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $file = fopen('panel_prod_defaut.sql', 'r+');
        while ($tab = fgetcsv($fic, 4096, ',')) {
            $pp = new PanelProduction();
            $pp->setMadeAt($this->convertDate("2016-10-07"));
            $pp->setProfile("PR116");
            $pp->setStructure('Simple Face');
            $pp->setRal('RAL 7012 Gris Basalte');
            $pp->setCableBy('Eiffage');
            $pp->setRegul(false);
            $pp->setBacklighting(false);
            $pp->setRebootModem(false);
            $pp->setTriLed('Cree Xb-Wp');
            $pp->setPowerSupply('Meanwell HRP-450-5');
            $pp->setOrderSupply('Meanwell RD150 12');
            $pp->setFlashCard('16Go MSata W7');
            $pp->setVideoCard('CENT118E');
            $pp->setVideoOut('CENT127A');
            $pp->setModem('SIM5360E');
            $pp->setAntenna('GC664B ( chapeau )');
            $pp->setFixation('Equerres internes');
            $pp->setMacif('Neuf');
            $pp->setProtection('Citel MSB10-400');
            $pp->setThermostat('30°');
            $pp->setFilter('16A');
            $pp->setFan('Diam. 120');
            $em->persist($pp);
            $em->flush();
            fputs($file,"UPDATE centoweb_panel SET id_panelproduction = '".$pp->getId()."' WHERE id_afficheur=".$tab[0].";"."\n");
        }
        fclose($file);
    }

}