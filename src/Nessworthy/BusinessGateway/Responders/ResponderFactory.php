<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Responders;

class ResponderFactory
{
    const HANDLER_SOAP = 'Soap';

    public function create(string $serviceName, Response $response, $handlerType = self::HANDLER_SOAP)
    {
        $nameSpace = '\Nessworthy\BusinessGateway\Responders\\' . $handlerType . '\\';
        // Error?
        if ($response->isRejected()) {
            $className = $nameSpace . $handlerType . 'Rejection';
            return new $className($response->getRejectionData());
        } elseif ($response->isAcknowledged()) {
            $className = $nameSpace . $handlerType . 'Acknowledgement';
            return new $className($response->getAcknowledgedData());
        } elseif ($response->isSuccessful()) {
            $className = $nameSpace . $handlerType . $serviceName;
            return new $className($response->getResultData());
        } elseif ($response->isOther()) {
            throw new RespondOtherException('Returned result of type \'Other\' for ' . $serviceName . ' request.');
        } else {
            throw new RespondUnknownException('Unknown response type given for ' . $serviceName . ' request.');
        }
    }
}
