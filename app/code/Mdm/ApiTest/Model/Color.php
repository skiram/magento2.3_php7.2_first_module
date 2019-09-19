<?php
/**
 * Created by PhpStorm.
 * User: skiram
 * Date: 18/09/19
 * Time: 21:17
 */

namespace Mdm\ApiTest\Model;

use Mdm\ApiTest\Api\ColorInterface;
use Mdm\ApiTest\Helper\ColorHelper;

class Color implements ColorInterface
{

    /**
     * @var ColorHelper
     */
    protected $colorHelper;

    /**
     * Color constructor.
     * @param ColorHelper $colorHelper
     */
    public function __construct(ColorHelper $colorHelper)
    {
        $this->colorHelper = $colorHelper;
    }

    /**
     * @return mixed|\Zend\Http\Response
     */
    public function getList()
    {
        return $this->colorHelper->getColors();
    }
}
