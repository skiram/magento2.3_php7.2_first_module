<?php


namespace Mdm\ApiTest\Model\Data;


use Mdm\ApiTest\Api\Data\ColorInterface;

class Color implements ColorInterface
{

    protected $id;

    protected $name;

    protected $color;

    protected $year;

    protected $pantoneValue;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ColorInterface|void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ColorInterface|void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param $year
     * @return ColorInterface|void
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param $color
     * @return ColorInterface|void
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getPantoneValue()
    {
        return $this->pantoneValue;
    }

    /**
     * @param string $pantoneValue
     * @return ColorInterface|void
     */
    public function setPantoneValue($pantoneValue)
    {
        $this->pantoneValue = $pantoneValue;
    }
}