<?php
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class DespatchNameText
 * Holds a despatch name.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class DespatchNameText extends StringType
{
    /**
     * DespatchNameText constructor.
     * @param string $despatchName
     */
    public function __construct(string $despatchName)
    {
        $this->validateMinLength($despatchName, 1);
        $this->validateMaxLength($despatchName, 70);
        $this->validateRegEx($despatchName, '#^[A-Za-z0-9\s~!&quot;@#$%\'\(\)\*\+,\-\./:;=&gt;\?\[\\\]_\{\}\^&#xa3;&amp;]*$#');
        return parent::__construct($despatchName);
    }
}