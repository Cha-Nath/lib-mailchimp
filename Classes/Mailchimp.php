<?php

namespace Nlib\Mailchimp\Classes;

use nlib\Instance\Traits\InstanceTrait;
use Nlib\Mailchimp\Interfaces\MailchimpInterface;

class Mailchimp implements MailchimpInterface {

    use InstanceTrait;

    private $_user = 'user';
    private $_base = 'https://{server}.api.mailchimp.com/3.0/';
    private $_pwd;
    private $_server;

    public function init(string $user, string $pwd, string $server) {
        $this->setUser($user)
        ->setPwd($pwd)
        ->setServer($server)
        ->setBase(str_replace('{server}', $this->getServer(), $this->getBase()));
    }

    #region Getter

    public function getUser() : string { return $this->_user; }
    public function getPwd() : string { return $this->_pwd; }
    public function getServer() : string { return $this->_server; }
    public function getBase() : string { return $this->_base; }

    #endregion

    #region Setter

    public function setUser(string $user) : self { $this->_user = $user; return $this; }
    public function setPwd(string $pwd) : self { $this->_pwd = $pwd; return $this; }
    public function setServer(string $server) : self { $this->_server = $server; return $this; }
    public function setBase(string $base) : self { $this->_base = $base; return $this; }

    #endregion
}