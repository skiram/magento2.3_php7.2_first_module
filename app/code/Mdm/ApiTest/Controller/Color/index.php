<?php
/**
 * Created by PhpStorm.
 * User: skiram
 * Date: 18/09/19
 * Time: 22:08
 */

namespace Mdm\ApiTest\Controller\Color;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class index extends Action
{

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }
}
