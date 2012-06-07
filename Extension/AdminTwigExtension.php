<?php
namespace Probesys\AdminBundle\Extension;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AdminTwigExtension extends \Twig_Extension
{
    protected $option_name;

    protected $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getFunctions()
    {
        return array(
            'getSetting'  => new \Twig_Function_Method($this, 'getSetting')
        );
    }

    public function getSetting($setting_name)
    {
		$setting = $this->doctrine->getRepository('ProbesysAdminBundle:Setting')->findOneBy(array('setting_name' => $setting_name));

		if ( ! isset( $setting ) ){
			return null;
		}

		return $setting->getSettingValue();
    }

    public function getName()
    {
        return 'probesys-admin';
    }
}