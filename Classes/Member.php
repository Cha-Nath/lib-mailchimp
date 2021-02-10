<?php

namespace Nlib\Mailchimp\Classes;

use Nlib\Mailchimp\Classes\Mailchimp;

class Member extends Mailchimp {

    public function __construct() {
        $this->_base .= '/lists/{list_id}/members';
    }

    public function getMemeber(string $listID, string $email) {

        $url = str_replace(['{list_id}', '{subscriber_hash}'], [$listID, md5($email)], $this->_base);

        $member = $this->cURL($url)
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->get();

        return json_decode($member);

    }

    public function getMembers(string $listID) {

        $url = str_replace('{list_id}', $listID, $this->_base);

        $members = $this->cURL($url)
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->get();

        return json_decode($members);
    }

    public function create() {

    }

    public function update() {}

    public function replace() {}
}