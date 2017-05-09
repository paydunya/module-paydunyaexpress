<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Paydunya\Paydunyaexpress\Model\Ui;

use Magento\Checkout\Model\ConfigProviderInterface;

/**
 * Class ConfigProvider
 */
class ConfigProvider implements ConfigProviderInterface
{
    const CODE = 'paydunyaexpress';

    protected $dataHelper;

    /**
     * Payment ConfigProvider constructor.
     * @param \Magento\Payment\Helper\Data $dataHelper
     */
    public function __construct(
        \Paydunya\Paydunyaexpress\Helper\Data $dataHelper
    ) {
        $this->dataHelper = $dataHelper;
    }
    /**
     * Retrieve assoc array of checkout configuration
     *
     * @return array
     */

    public function getConfig()
    {
        return [
            'payment' => [
                self::CODE => [
                    'display_title' => $this->getDisplayTitle(),
                    'display_description' => $this->getDisplayDescription()
                ]
            ]
        ];
    }

    protected function getDisplayTitle()
    {
        return $this->dataHelper->getConfig('payment/paydunya/title');
    }

    protected function getDisplayDescription()
    {
        return $this->dataHelper->getConfig('payment/paydunya/description');
    }
}