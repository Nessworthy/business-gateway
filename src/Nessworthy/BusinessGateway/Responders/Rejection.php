<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Responders;

interface Rejection
{
    public function getExternalReference() : string;

    public function getErrorMessage() : string;

    public function getErrorCode() : string;

    public function hasValidationMessages() : bool;

    public function getValidationMessages() : array;
}