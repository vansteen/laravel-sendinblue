<?php

namespace Vansteen\Sendinblue;

use SendinBlue\Client\Configuration;
use BadMethodCallException;

/**
 * Wrapper for the Sendinblue's Configuration class
 *
 * @category Class
 * @package  Vansteen\Sendinblue
 * @author   Thomas Van Steenwinckel
 * @link     https://github.com/vansteen/sendinblue
 */
class Sendinblue
{
    /**
     * An instance of the Sendinblue's Configuration class
     * @var \SendinBlue\Client\Configuration
     */
    protected $configuration;

    /**
     * Constructor
     */
    public function __construct()
    {
        $apikey = config('sendinblue.apikey');
        $prefix = config('sendinblue.prefix');

        // Configure API key authorization: api-key
        $this->configuration = Configuration::getDefaultConfiguration()->setApiKey('api-key', $apikey);

        if ($prefix) {
            // Setup prefix (e.g. Bearer) for API key, if needed
            $this->configuration->setApiKeyPrefix('api-key', $prefix);
        }
    }

    /**
     * Gets the default configuration instance
     *
     * @return \SendinBlue\Client\Configuration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * Sets the detault configuration instance
     *
     * @param \SendinBlue\Client\Configuration $configuration An instance of the Configuration Object
     *
     * @return void
     */
    public function setConfiguration(Configuration $configuration)
    {
        return $this->configuration = $configuration;
    }

    /**
     * Pass any method calls onto $this->configuration
     *
     * @param string $method The name of the method being called.
     * @param array $arguments An enumerated array containing the parameters.
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        if (is_callable([$this->configuration, $method])) {
            return call_user_func_array([$this->configuration, $method], $arguments);
        } else {
            throw new BadMethodCallException("Method $method does not exist");
        }
    }

    /**
     * Pass any static method calls onto $this->configuration
     *
     * @param string $method The name of the method being called.
     * @param array $arguments An enumerated array containing the parameters.
     *
     * @return mixed
     */
    public static function __callStatic($method, $arguments)
    {
        if (is_callable([$this->configuration, $method])) {
            return call_user_func_array([$this->configuration, $method], $arguments);
        } else {
            throw new BadMethodCallException("Method $method does not exist");
        }
    }
}
