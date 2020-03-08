<?php

namespace Vansteen\Sendinblue\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
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
        config(['sendinblue.apikey' => 'test_signing_secret']);
        config(['sendinblue.prefix' => null]);
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
        $this->assertEquals(\SendinBlue\Client\Configuration::class, get_class($config));
    }
}
