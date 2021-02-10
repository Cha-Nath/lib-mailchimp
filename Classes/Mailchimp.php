<?php

namespace Nlib\Mailchimp\Classes;

use nlib\cURL\Interfaces\cURLConstantInterface;
use nlib\cURL\Traits\cURLTrait;
use nlib\Instance\Traits\InstanceTrait;
use nlib\Log\Traits\DebugTrait;
use nlib\Log\Traits\LogTrait;
use Nlib\Mailchimp\Interfaces\MailchimpInterface;

class Mailchimp implements MailchimpInterface, cURLConstantInterface {

    use InstanceTrait;
    use cURLTrait;
    use LogTrait;
    use DebugTrait;

    private $_user = 'user';
    private $_base = 'https://{server}.api.mailchimp.com/3.0';
    private $_pwd;
    private $_server;

    public function init(string $user, string $pwd, string $server) {
        $this->setUser($user)
        ->setPwd($pwd)
        ->setServer($server);
        $this->_base = str_replace('{server}', $this->getServer(), $this->_base);
    }

    #region Getter

    public function getUser() : string { return $this->_user; }
    public function getPwd() : string { return $this->_pwd; }
    public function getServer() : string { return $this->_server; }
    public function getUserPwd() : string { return $this->_user . ':' . $this->_pwd; }

    #endregion

    #region Setter

    public function setUser(string $user) : self { $this->_user = $user; return $this; }
    public function setPwd(string $pwd) : self { $this->_pwd = $pwd; return $this; }
    public function setServer(string $server) : self { $this->_server = $server; return $this; }

    #endregion
}