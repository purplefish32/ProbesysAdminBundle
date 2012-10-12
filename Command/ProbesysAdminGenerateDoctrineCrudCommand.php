<?php

namespace Probesys\AdminBundle\Command;

use Probesys\AdminBundle\Generator\DoctrineCrudGenerator;
use Sensio\Bundle\GeneratorBundle\Command\GenerateDoctrineCrudCommand as GenerateDoctrineCrudCommand;

class ProbesysAdminGenerateDoctrineCrudCommand extends GenerateDoctrineCrudCommand
{
    protected function configure()
    {
        parent::configure();
        $this->setName('probesys-admin:doctrine:generate:crud');
    }

    protected function getGenerator()
    {
        $generator = new DoctrineCrudGenerator($this->getContainer()->get('filesystem'), __DIR__.'/../Resources/skeleton/crud');
        $this->setGenerator($generator);
        return parent::getGenerator();
    }

    public function setGenerator($generator)
    {
        $this->generator = $generator;
    }
}
