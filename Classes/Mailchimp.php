<?php

namespace Nlib\Mailchimp\Classes;

use nlib\cURL\Interfaces\cURLConstantInterface;
use nlib\cURL\Traits\cURLTrait;
use nlib\Instance\Traits\InstanceTrait;
use nlib\Log\Traits\DebugTrait;
use nlib\Log\Traits\LogTrait;
use Nlib\Mailchimp\Interfaces\MailchimpInterface;
use nlib\Missing\Exceptions\MissingException;
use nlib\Missing\Traits\MissingTrait;
use nlib\Yaml\Traits\ParserTrait;

abstract class Mailchimp implements MailchimpInterface, cURLConstantInterface {

    use InstanceTrait;
    use cURLTrait;
    use LogTrait;
    use DebugTrait;
    use MissingTrait;
    use ParserTrait;

    protected $_base = 'https://{server}.api.mailchimp.com/3.0';

    private $_user = 'user';
    private $_pwd;
    private $_server;
    
    abstract public function getEndpoint(string $listID, string $var = '');

    public function init(string $config) : self {

        $configs = $this->Parser()->get($config);
        try {

            if(!$this->is_missing(['user', 'pwd', 'server'], $configs))
                throw new MissingException($this->getMissings(), __CLASS__ . '::' . __FUNCTION__);
        
            $this->setUser($configs['user'])
            ->setPwd($configs['pwd'])
            ->setServer($configs['server']);

            $this->_base = str_replace('{server}', $this->getServer(), $this->_base);

        } catch(MissingException $MissingException) {
            $this->dlog([$MissingException->getThrow() => json_encode($MissingException->getMissings())]);
        }

        return $this;
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