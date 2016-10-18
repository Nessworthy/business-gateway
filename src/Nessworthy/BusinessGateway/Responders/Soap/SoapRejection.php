<?php declare(strict_types=1);

namespace Nessworthy\BusinessGateway\Responders\Soap;

use Nessworthy\BusinessGateway\Responders\Rejection;

class SoapRejection implements Rejection
{
    private $rejection;

    public function __construct(stdClass $rejectionBody)
    {
        $this->rejection = $rejectionBody;
    }

    public function getExternalReference() : string
    {
        return $this->rejection->ExternalReference->_;
    }

    public function getErrorMessage() : string
    {
        return $this->rejection->RejectionResponse->Reason->_;
    }

    public function getErrorCode() : string
    {
        return $this->rejection->RejectionResponse->Code->_;
    }

    public function hasValidationMessages() : bool
    {
        return isset($this->rejection->RejectionResponse->ValidationErrors);
    }

    public function getValidationMessages() : array
    {
        $errors = [];
        if (!$this->hasValidationMessages()) {
            return $errors;
        }

        $validationErrors = $this->rejection->RejectionResponse->ValidationErrors;

        if (!is_array($validationErrors)) {
            $validationErrors = [$validationErrors];
        }

        foreach ($validationErrors as $validationError) {
            $errors[] = [
                'code' => $validationError->Code->_,
                'description' => $validationError->Description->_,
            ];
        }

        return $errors;
    }


}
