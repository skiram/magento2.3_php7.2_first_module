<?php


namespace Mdm\ApiTest\Api\Data;


interface ColorInterface
{

    /**
     * get color id.
     *
     * @api
     * @return int
     */
    public function getId();

    /**
     * Set color id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * get color name.
     *
     * @api
     * @return string
     */
    public function getName();

    /**
     * Set color name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * get color year.
     *
     * @api
     * @return string
     */
    public function getYear();

    /**
     * Set color name
     *
     * @param string $name
     * @return $this
     */
    public function setYear($year);

    /**
     * get color.
     *
     * @api
     * @return string
     */
    public function getColor();

    /**
     * Set color name
     *
     * @param string $name
     * @return $this
     */
    public function setColor($color);

    /**
     * get color pantone value.
     *
     * @api
     * @return string
     */
    public function getPantoneValue();

    /**
     * Set color pantone_value
     *
     * @param string $pantoneValue
     * @return $this
     */
    public function setPantoneValue($pantoneValue);

}