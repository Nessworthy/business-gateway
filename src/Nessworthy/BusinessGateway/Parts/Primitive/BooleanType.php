<?php
namespace Nessworthy\BusinessGateway\Parts\Primitive;

/**
 * The base type to represent a boolean.
 * @package Nessworthy\BusinessGateway\Parts\Primitive
 */
class BooleanType extends BaseSimpleType
{
    /**
     * Convert the data into a more suitable form.
     * @param mixed $var
     * @return bool
     */
    protected function convertType($var)
    {
        if(in_array($var, ['true', 'false'], true) === true) {
            return $this->convertToType($var);
        }

        if(!is_bool($var)) {
            throw new \InvalidArgumentException('Expected BooleanType to be a boolean one of: \'true\', \'false\', neither given.');
        }

        return (bool) $var;
    }

    /**
     * @throws \InvalidArgumentException
     * @param string $bool
     * @return string
     */
    private function convertToType($bool) {
        if($bool === 'true') {
            return true;
        }
        if($bool === 'false') {
            return false;
        }
        throw new \InvalidArgumentException('ConvertToType expects argument 1 to be \'true\' or \'false\', neither given.');
    }

    /**
     * BooleanType constructor.
     * @param $bool bool|string
     */
    public function __construct($bool) {
        $bool = $this->convertType($bool);

        return parent::__construct($bool);
    }
}