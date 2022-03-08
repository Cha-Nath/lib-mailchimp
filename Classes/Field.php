<?php

namespace Nlib\Mailchimp\Classes;

use stdClass;
use Nlib\Mailchimp\Classes\Mailchimp;
use Nlib\Mailchimp\Interfaces\FieldInterface;

class Field extends Mailchimp implements FieldInterface {

    public function __construct() {
        $this->_base .= '/lists/{list_id}/merge-fields';
    }

    public function getFields(string $listID) : ? stdClass {

        $fields = $this->cURL($this->getEndpoint($listID))
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->get();

        return json_decode($fields);
    }

    public function getField(string $listID, string $memberID) : ? stdClass {

        $field = $this->cURL($this->getEndpoint($listID, $memberID))
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->get();

        return json_decode($field);
    }

    public function create(string $listID, array $values) : ? stdClass {

        $create = $this->cURL($this->getEndpoint($listID))
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->post($values);

        return json_decode($create);
    }

    public function update(string $listID, string $mergeID, array $values) : ? stdClass {

        $update = $this->cURL($this->getEndpoint($listID, $mergeID))
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->patch($values);

        return json_decode($update);
    }

    #region Getter

    public function getEndpoint(string $listID, string $mergeID = '') : string {
        return !empty($mergeID)
        ? str_replace(['{list_id}', '{merge_id}'], [$listID, $mergeID], $this->_base . '/{merge_id}')
        : str_replace('{list_id}', $listID, $this->_base);
    }

    #endregion
}