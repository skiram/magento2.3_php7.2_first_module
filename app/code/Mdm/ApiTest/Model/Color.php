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
use Mdm\ApiTest\Api\Data\ColorInterfaceFactory;


class Color implements ColorInterface
{

    /**
     * @var ColorHelper
     */
    protected $colorHelper;

    /**
     * @var ColorInterfaceFactory
     */
    protected $colorFactory;

    /**
     * Color constructor.
     * @param ColorHelper $colorHelper
     * @param ColorInterfaceFactory $colorFactory
     */
    public function __construct(
        ColorHelper $colorHelper,
        ColorInterfaceFactory $colorFactory
)
    {
        $this->colorFactory = $colorFactory;
        $this->colorHelper = $colorHelper;
    }

    /**
     * @return \Mdm\ApiTest\Api\Data\ColorInterface[]
     */
    public function getList()
    {
        $data = $this->colorHelper->getColors();
        $colors = [];

        foreach ($data as $item){
            /**
             * @var $color \Mdm\ApiTest\Api\Data\ColorInterface
             */
            $color = $this->colorFactory->create();
            $color->setId($item['id']);
            $color->setColor($item['color']);
            $color->setName($item['name']);
            $color->setYear($item['year']);
            $color->setPantoneValue($item['pantone_value']);
            $colors[] = $color;
        }

         return $colors;
    }
}
