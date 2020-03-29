<?php

/**
 * @package    Vansteen\Sendinblue
 * @author     Thomas Van Steenwinckel <code@1234.pm>
 * @link       https://github.com/vansteen/laravel-sendinblue
 * @license    https://github.com/vansteen/laravel-sendinblue/blob/master/license.md (MIT License)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vansteen\Sendinblue\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use SendinBlue\Client\Configuration;
use Vansteen\Sendinblue\Facades\Sendinblue;
use Vansteen\Sendinblue\SendinblueServiceProvider;

/**
 * This is the abstract test case class.
 *
 * @category Class
 * @author   Thomas Van Steenwinckel
 * @link     https://github.com/vansteen/sendinblue
 */
class TestCase extends OrchestraTestCase
{
    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        config(['sendinblue.apikey' => 'test_apikey']);
        config(['sendinblue.partnerkey' => 'test_partnerkey']);
    }

    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [SendinblueServiceProvider::class];
    }

    /**
     * Get the facade class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Sendinblue' => Sendinblue::class,
        ];
    }

    public function testGetConfigurationisSendinBlueClient()
    {
        $config = Sendinblue::getConfiguration();
        $this->assertEquals(\SendinBlue\Client\Configuration::class, \get_class($config));
    }

    public function testSetConfigurationisDone()
    {
        $config = new Configuration();
        $sendinblue = new Sendinblue();
        $sendinblue::setConfiguration($config);
        $this->assertEquals($config, $sendinblue::getConfiguration());
    }

    public function testKeysAreSet()
    {
        $config = Sendinblue::getConfiguration();
        $this->assertEquals($config->getApiKey('api-key'), config('sendinblue.apikey'));
        $this->assertEquals($config->getApiKey('partner-key'), config('sendinblue.partnerkey'));
    }
}
