<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Content;

use Isg\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class DespatchNameText
 * Holds a despatch name.
 * @package Isg\BusinessGateway\Parts\Content
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
        $this->validateRegEx(
            $despatchName,
            '#^[A-Za-z0-9\s~!&quot;@#$%\'\(\)\*\+,\-\./:;=&gt;\?\[\\\]_\{\}\^&#xa3;&amp;]*$#'
        );
        return parent::__construct($despatchName);
    }
}
