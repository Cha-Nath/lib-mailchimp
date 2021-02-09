<?php

namespace Nlib\Mailchimp\Classes;

use Nlib\Mailchimp\Interfaces\MailchimpInterface;

class Mailchimp implements MailchimpInterface {

    private $_user;
    private $_pwd;
    private $_server;

    public function init(string $user, string $pwd, string $server) { $this->setUser($user)->setPwd($pwd)->setServer($server); }

    #region Getter

    public function getUser() : string { return $this->_user; }
    public function getPwd() : string { return $this->_pwd; }
    public function getServer() : string { return $this->_server; }

    #endregion

    #region Setter

    public function setUser(string $user) : self { $this->_user = $user; return $this; }
    public function setPwd(string $pwd) : self { $this->_pwd = $pwd; return $this; }
    public function setServer(string $server) : self { $this->_server = $server; return $this; }

    #endregion
}