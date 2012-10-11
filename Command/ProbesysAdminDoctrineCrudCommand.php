<?php

namespace Probesys\ProbesysAdminBundle\Command;

use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator;

class ProbesysAdminDoctrineCrudCommand extends \Sensio\Bundle\GeneratorBundle\Command\GenerateDoctrineCrudCommand
{
    protected function configure()
    {
        parent::configure();
        $this->setName('probesys-admin:generate:crud');
    }

    protected function getGenerator()
    {
        $generator = new DoctrineCrudGenerator($this->getContainer()->get('filesystem'), __DIR__.'/../Resources/skeleton/crud');
        $this->setGenerator($generator);
        return parent::getGenerator();
    }
}