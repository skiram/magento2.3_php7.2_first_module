<?php
/**
 * Created by PhpStorm.
 * User: skiram
 * Date: 18/09/19
 * Time: 21:15
 */

namespace Mdm\ApiTest\Api;

/**
 * Interface ColorInterface
 * @package Mdm\ApiTest\Api
 */
interface ColorInterface
{

    /**
     * @return \Mdm\ApiTest\Api\Data\ColorInterface[]
     */
    public function getList();
}
