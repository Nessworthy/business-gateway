<?php
namespace Isg\BusinessGateway\Responders;

interface EnquiryByPropertyDescription extends Result
{
    public function getTitles(): array;
}
