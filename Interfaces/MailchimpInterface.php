<?php

namespace Nlib\Mailchimp\Interfaces;

interface MailchimpInterface {

    /**
     *
     * @param string $config
     * @return self
     */
    public function init(string $configs);

    /**
     *
     * @return string
     */
    public function getUser() : string;

    /**
     *
     * @return string
     */
    public function getPwd() : string;

    /**
     *
     * @return string
     */
    public function getServer() : string;

    /**
     *
     * @param string $user
     * @return self
     */
    public function setUser(string $user);

    /**
     *
     * @param string $pwd
     * @return self
     */
    public function setPwd(string $pwd);

    /**
     *
     * @param string $server
     * @return self
     */
    public function setServer(string $server);
}