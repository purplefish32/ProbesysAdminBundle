<?php

namespace Probesys\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SettingType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('setting_name')
            ->add('setting_value')
        ;
    }

    public function getName()
    {
        return 'probesys_adminbundle_settingtype';
    }
}
