<?php

namespace Nlib\Mailchimp\Interfaces;

interface EndpointInterface {

    /**
     *
     * @param string $listID
     * @param string $var
     * @return string
     */
    public function getEndpoint(string $listID, string $var = '') : string;
}