<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Responders;

interface Response
{
    public function isSuccessful() : bool;

    public function isRejected() : bool;

    public function isAcknowledged() : bool;

    public function isOther() : bool;

    public function getRejectionData();

    public function getAcknowledgementData();

    public function getResultData();
}
