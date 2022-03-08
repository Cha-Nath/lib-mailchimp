<?php

namespace Nlib\Mailchimp\Interfaces;

use stdClass;
use Nlib\Mailchimp\Interfaces\MailchimpInterface;

interface FieldInterface extends MailchimpInterface, EndpointInterface {

    /**
     *
     * @param string $listID
     * @return stdClass|null
     */
    public function getFields(string $listID) : ? stdClass;

    /**
     *
     * @param string $listID
     * @param string $memberID
     * @return stdClass|null
     */
    public function getField(string $listID, string $memberID) : ? stdClass;

    /**
     *
     * @param string $listID
     * @param array $values
     * @return stdClass|null
     */
    public function create(string $listID, array $values) : ? stdClass;

    /**
     *
     * @param string $listID
     * @param string $mergeID
     * @param array $values
     * @return stdClass|null
     */
    public function update(string $listID, string $mergeID, array $values) : ? stdClass;
}