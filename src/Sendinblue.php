<?php

namespace Vansteen\Sendinblue;

use BadMethodCallException;
use SendinBlue\Client\Configuration;

/**
 * Wrapper for the Sendinblue's Configuration class.
 *
 * @category Class
 * @author   Thomas Van Steenwinckel
 * @link     https://github.com/vansteen/sendinblue
 */
class Sendinblue
{
    /**
     * An instance of the Sendinblue's Configuration class.
     * @var \SendinBlue\Client\Configuration
     */
    protected $configuration;

    /**
     * Constructor.
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
     * Gets the default configuration instance.
     *
     * @return \SendinBlue\Client\Configuration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * Sets the detault configuration instance.
     *
     * @param \SendinBlue\Client\Configuration $configuration An instance of the Configuration Object
     *
     * @return void
     */
    public function setConfiguration(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }
}
