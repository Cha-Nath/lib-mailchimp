<?php

namespace Nlib\Mailchimp\Interfaces;

interface MailchimpInterface {

    /**
     *
     * @param string $user
     * @param string $pwd
     * @param string $server
     * @return void
     */
    public function init(string $user, string $pwd, string $server);

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
     * @return string
     */
    public function getBase() : string;

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

    /**
     *
     * @param string $base
     * @return self
     */
    public function setBase(string $base);
}