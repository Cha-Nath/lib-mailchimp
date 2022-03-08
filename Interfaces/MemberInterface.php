<?php

namespace Nlib\Mailchimp\Interfaces;

use stdClass;

use Nlib\Mailchimp\Interfaces\MailchimpInterface;

interface MemberInterface extends MailchimpInterface, EndpointInterface {

    /**
     *
     * @param string $listID
     * @return stdClass|null
     */
    public function getMembers(string $listID) : ? stdClass;

    /**
     *
     * @param string $listID
     * @param string $email
     * @return stdClass|null
     */
    public function getMember(string $listID, string $email) : ? stdClass;

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
     * @param string $email
     * @param array $values
     * @return stdClass|null
     */
    public function update(string $listID, string $email, array $values) : ? stdClass;

    /**
     *
     * @param string $listID
     * @param string $email
     * @param array $values
     * @return stdClass|null
     */
    public function replace(string $listID, string $email, array $values) : ? stdClass;
}