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

namespace Vansteen\Sendinblue;

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
        $partnerkey = config('sendinblue.partnerkey');

        // Configure API key authorization: api-key
        $this->configuration = Configuration::getDefaultConfiguration()->setApiKey('api-key', $apikey);

        if ($partnerkey) {
            // (Optional) The partner key should be passed in the request headers as
            // partner-key along with api-key pair for successful authentication of partner.
            $this->configuration->setApiKey('partner-key', $partnerkey);
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
     */
    public function setConfiguration(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }
}
