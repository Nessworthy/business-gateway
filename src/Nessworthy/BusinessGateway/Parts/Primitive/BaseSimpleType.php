<?php
namespace Nessworthy\BusinessGateway\Parts\Primitive;

use Nessworthy\BusinessGateway\Parts\SimpleType;

abstract class BaseSimpleType implements SimpleType
{
    protected $_;

    public function __construct($data) {
        $this->_ = $data;
    }

    /**
     * @inheritDoc
     */
    public function get_()
    {
        return $this->_;
    }

    public function __toString()
    {
        return $this->get_();
    }
}