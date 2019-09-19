<?php
/**
 * Created by PhpStorm.
 * User: skiram
 * Date: 18/09/19
 * Time: 21:50
 */

namespace Mdm\ApiTest\Helper;

use Http\Client\Exception\HttpException;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Mdm\ApiTest\Api\ColorInterface;
use Mdm\ApiTest\Model\Requester;

class ColorHelper extends AbstractHelper
{
    const API_URL = 'https://reqres.in/api/unknown';

    /**
     * @var Requester
     */
    protected $requester;


    /**
     * ColorHelper constructor.
     * @param Context $context
     * @param Requester $requester
     */
    public function __construct(Context $context, Requester $requester)
    {
        $this->requester = $requester;
        parent::__construct($context);
    }

    /**
     * @return \Zend\Http\Response
     */
    public function getColors()
    {
        $response = $this->requester->get(self::API_URL, []);

        if ($response->getStatusCode() == 200) {
            return $response->getBody();
        }

        throw new HttpException('Error : ' . $response->getStatusCode());
    }
}
