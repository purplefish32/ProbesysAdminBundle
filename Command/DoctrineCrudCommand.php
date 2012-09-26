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

namespace Probesys\AdminBundle\Command;

use Probesys\GeneratorBundle\Generator\DoctrineCrudGenerator;
use Probesys\GeneratorBundle\Command\GenerateDoctrineCrudCommand as BaseGenerator;

/**
 * DoctrineCrudCommand
 *
 * @extends    BaseGenerator
 * @category   Command
 * @package    ProbesysAdminBundle
 * @subpackage ProbesysAdminBundle
 * @author     Donovan Tengblad <donovan.tengblad@probesys.com>
 * @copyright  2012 Donovan Tengblad.
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 * @version    0.1
 * @link       http://probesys.com
 */
class DoctrineCrudCommand extends BaseGenerator
{
    /**
     * Configuration
     *
     * @return void
     */
    protected function configure()
    {
        parent::configure();
        $this->setName('probesys:generate:crud');
        $this->setDescription('Probesys CRUD and backend generator');
    }

    /**
     * Get generator
     *
     * @return Generator
     */
    protected function getGenerator()
    {
        $generator = new DoctrineCrudGenerator($this->getContainer()->get('filesystem'), __DIR__.'/../Resources/skeleton/crud');

        $this->setGenerator($generator);

        return parent::getGenerator();
    }

}
