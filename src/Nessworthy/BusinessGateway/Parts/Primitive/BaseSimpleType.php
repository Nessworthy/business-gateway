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

    /**
     * @inheritDoc
     */
    public function sanityCheck()
    {
        // By default, simple types are sanitised on construction, and don't need further checking.
        // Override this if you need to do this retroactively.
        return true;
    }
}