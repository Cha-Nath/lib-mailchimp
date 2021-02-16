<?php

namespace Nlib\Mailchimp\Classes;

class Field extends Mailchimp {

    public function __construct() {
        $this->_base .= '/lists/{list_id}/merge-fields';
    }

    public function getFields(string $listID) {

        $fields = $this->cURL($this->getEndpoint($listID))
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->get();

        return json_decode($fields);
    }

    public function getField(string $listID, string $memberID) {

        $field = $this->cURL($this->getEndpoint($listID, $memberID))
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->get();

        return json_decode($field);
    }

    public function create(string $listID, array $values) {

        $create = $this->cURL($this->getEndpoint($listID))
        ->setEncoding(self::APPLICATION_JSON)
        ->setOptions([CURLOPT_USERPWD => $this->getUserPwd()])
        ->setDebug(...$this->dd())
        ->post($values);

        return json_decode($create);
    }

    public function update(string $listID, string $mergeID, array $values) {

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