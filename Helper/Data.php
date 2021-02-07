<?php

namespace Agalakotuwa\Secondfooter\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Data
 * @package Agalakotuwa\Secondfooter\Helper
 */
class Data extends AbstractHelper
{
    /**
     *
     */
    const ENABLE_DISABLE = 'footer_option_section/groupname/fieldid';
    /**
     *
     */
    const BUTTON_TITLE = 'footer_option_section/groupname/button_text';

    /**
     * Data constructor.
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * @return bool
     */
    public function enableDisable()
    {
        return $this->scopeConfig->getValue(
            self::ENABLE_DISABLE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return string
     */
    public function getButtonTitle()
    {
        return $this->scopeConfig->getValue(
            self::BUTTON_TITLE,
            ScopeInterface::SCOPE_STORE
        );
    }
}
