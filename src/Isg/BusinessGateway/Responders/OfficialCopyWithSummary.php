<?php
namespace Isg\BusinessGateway\Responders;

use Isg\BusinessGateway\ResponderParts\ActualPrice;

interface OfficialCopyWithSummary extends Result
{
    /**
     * Retrieve the actual fee payable for this request.
     * Returned array is in the following format:
     *
     * @return ActualPrice
     */
    public function getActualPrice() : ActualPrice;

    /**
     * Check whether this response contains any fee payment information.
     * @return bool
     */
    public function hasActualPrice() : bool;

    /**
     * Check whether this response contains an attachment.
     * @return bool
     */
    public function hasAttachment() : bool;

    /**
     * Retrieve the attachment data for this response.
     * @return string
     */
    public function getAttachment() : string;
    public function getAttachmentFormat() : string;
    public function getPropertyAddresses() : array;
}
