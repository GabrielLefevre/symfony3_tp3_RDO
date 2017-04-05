<?php

/**
 * Created by PhpStorm.
 * User: DEV2
 * Date: 28/03/2017
 * Time: 09:11
 */
class RDO
{
    private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function createEntity($pp) {
        $this->em->persist($pp);
        $this->em->flush();
    }

}