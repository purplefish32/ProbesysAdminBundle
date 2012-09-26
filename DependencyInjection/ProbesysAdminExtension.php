<?php
/**
 * MIT License
 * ===========
 *
 * Copyright (c) 2012 Donovan Tengblad <donovan.tengblad@probesys.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
 * CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @category   Command
 * @package    ProbesysAdminBundle
 * @subpackage ProbesysAdminBundle
 * @author     Donovan Tengblad <donovan.tengblad@probesys.com>
 * @copyright  2012 Donovan Tengblad.
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 * @version    0.1
 * @link       http://probesys.com
 */

namespace Probesys\AdminBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ProbesysAdminExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $yamlloader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $yamlloader->load("form_extensions.yml");

        if (isset($config['form'])) {
            if (isset($config['form']['render_fieldset'])) {
                $container->setParameter(
                    'probesys_admin.form.render_fieldset',
                    $config['form']['render_fieldset']
                );
            }
            if (isset($config['form']['show_legend'])) {
                $container->setParameter(
                    'probesys_admin.form.show_legend',
                    $config['form']['show_legend']
                );
            }
            if (isset($config['form']['show_child_legend'])) {
                $container->setParameter(
                    'probesys_admin.form.show_child_legend',
                    $config['form']['show_child_legend']
                );
            }
            if (isset($config['form']['error_type'])) {
                $container->setParameter(
                    'probesys_admin.form.error_type',
                    $config['form']['error_type']
                );
            }
        }
        if (isset($config['navbar'])) {
            $xmlloader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
            $yamlloader->load("navbar_extension.yml");
            if (isset($config['navbar']['template'])) {
                $container->setParameter(
                    'probesys_admin.navbar.template',
                    $config['navbar']['template']
                );
            }
        }
    }
    protected function loadExamples(ContainerBuilder $container)
    {
        //$xmlloader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/examples'));
        $yamlloader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/examples'));
        $yamlloader->load("example_menu.yml");
        $yamlloader->load("example_navbar.yml");
    }
}
