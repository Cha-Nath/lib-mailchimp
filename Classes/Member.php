<?php

namespace Nlib\Mailchimp\Classes;

use Nlib\Mailchimp\Classes\Mailchimp;

class Member extends Mailchimp {

    public function __construct() {
        $this->_base .= '/lists/{list_id}/members';
    }

    public function getMembers(string $listID) {

        $members = $this->cURL($this->getEndpoint($listID))
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->get();

        return json_decode($members);
    }

    public function getMember(string $listID, string $email) {

        $member = $this->cURL($this->getEndpoint($listID, $email))
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->get();

        return json_decode($member);
    }

    public function create(string $listID, array $values) {

        $create = $this->cURL($this->getEndpoint($listID))
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->post($values);

        return json_decode($create);
    }

    public function update(string $listID, string $email, array $values) {

        $update = $this->cURL($this->getEndpoint($listID, $email))
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->patch($values);

        return json_decode($update);
    }

    public function replace(string $listID, string $email, array $values) {

        $replace = $this->cURL($this->getEndpoint($listID, $email))
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->put($values);

        return json_decode($replace);
    }

    #region Getter

    public function getEndpoint(string $listID, string $email = '') : string {
        return !empty($email)
        ? str_replace(['{list_id}', '{subscriber_hash}'], [$listID, md5($email)], $this->_base . '/{subscriber_hash}')
        : str_replace('{list_id}', $listID, $this->_base);
    }

    #endregion
}