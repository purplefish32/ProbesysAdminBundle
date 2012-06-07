<?php

namespace Probesys\AdminBundle\Command;

//use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator;
use Probesys\GeneratorBundle\Generator\DoctrineCrudGenerator;
use Probesys\GeneratorBundle\Command\GenerateDoctrineCrudCommand as BaseGenerator;

class DoctrineCrudCommand extends BaseGenerator
{
    protected function configure()
    {
        parent::configure();
        $this->setName('probesys:generate:crud');
        $this->setDescription('Probesys CRUD and backend generator');
    }

    protected function getGenerator()
    {
        $generator = new DoctrineCrudGenerator($this->getContainer()->get('filesystem'), __DIR__.'/../Resources/skeleton/crud');

        $this->setGenerator($generator);
        return parent::getGenerator();
    }

}