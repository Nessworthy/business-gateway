<?php
namespace Nessworthy\BusinessGateway\Responders;

interface EnquiryByPropertyDescription extends Result
{
    public function getTitles(): array;
}
