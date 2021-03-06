<?php
/**
 * Created by PhpStorm.
 * User: peterzhang
 * Date: 2020/7/20
 * Time: 1:18 PM
 */
namespace IO\Github\Wechaty\User;

class ContactSelf extends Contact {
    function avatar() {
        return parent::avatar();
    }

    function setAvatar($fileBox) {
        $this->_puppet->setContactAvatar($this->_id, $fileBox);
    }

    function setName(String $name) {
        $this->_puppet->contactSelfName($name);
        $this->sync();
    }

    function signature(String $signature) {
        $puppetId = $this->_puppet->selfId();
        if(!empty($puppetId)) {
            $this->_puppet->contactSelfSignature($signature);
            $this->sync();
        }
    }
}