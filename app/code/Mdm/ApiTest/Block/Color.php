<?php
/**
 * Created by PhpStorm.
 * User: skiram
 * Date: 18/09/19
 * Time: 22:20
 */

namespace Mdm\ApiTest\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Mdm\ApiTest\Api\ColorInterface;

class Color extends Template
{

    /**
     * @var ColorInterface
     */
    protected $color;

    /**
     * Color constructor.
     * @param Context $context
     * @param ColorInterface $color
     * @param array $data
     */
    public function __construct(Context $context, ColorInterface $color, array $data = [])
    {
        $this->color = $color;
        parent::__construct($context, $data);
    }

    /**
     * @return array
     */
    public function getColors()
    {
        $jsonColor = $this->color->getList();
        $result = json_decode($jsonColor, true);

        return $result['data'] ?? [];
    }
}
