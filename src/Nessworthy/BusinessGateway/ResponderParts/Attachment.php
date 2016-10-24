<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\ResponderParts;

class Attachment
{
    private $data;
    private $format;

    public function __construct(string $attachmentData, string $format)
    {
        $this->data = $attachmentData;
        $this->format = $format;
    }

    public function getData() : string
    {
        return $this->data;
    }
}
