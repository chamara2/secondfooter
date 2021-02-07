<?php

namespace Agalakotuwa\Secondfooter\Block;

use Agalakotuwa\Secondfooter\Helper\Data;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

/**
 * Class Secondfooter
 * @package Agalakotuwa\Secondfooter\Block
 */
class Secondfooter extends Template implements BlockInterface
{
    /**
     * @var
     */
    protected $storeManager;
    /**
     * @var Data
     */
    protected $moduleHelper;
    /**
     * @var \Magento\Framework\App\Request\Http
     */
    protected $request;

    /**
     * Secondfooter constructor.
     * @param Template\Context $context
     * @param Data $moduleHelper
     * @param \Magento\Framework\App\Request\Http $request
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Data $moduleHelper,
        \Magento\Framework\App\Request\Http $request,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->moduleHelper = $moduleHelper;
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function enableDisable()
    {
        return $this->moduleHelper->enableDisable();
    }

    /**
     * @return string
     */
    public function getButtonTitle()
    {
        return $this->moduleHelper->getButtonTitle();
    }

    /**
     * @return bool
     */
    public function checkOnProductPage(){
        if ($this->request->getFullActionName() == 'catalog_product_view') {
            return true;
        }else{
            return false;
        }
    }
}
