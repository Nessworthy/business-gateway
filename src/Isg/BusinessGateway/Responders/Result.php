<?php declare(strict_types = 1);
namespace Isg\BusinessGateway\Responders;

interface Result
{
    /**
     * @return string Retrieve the external reference we originally set which ties this particular request to a
     *     reference stored in your system.
     */
    public function getExternalReference() : string;

    public function getMessageDetails() : string;

    public function hasMessageDetails() : bool;
}
