<?php
/**
 * Created by PhpStorm.
 * User: peterzhang
 * Date: 2020/8/2
 * Time: 7:56 PM
 */
namespace IO\Github\Wechaty\Puppet\Schemas\Query;

use IO\Github\Wechaty\Puppet\Util\ReflectionUtil;

abstract class AbstractQueryFilter {
    public static function getProperties($class) {
        return ReflectionUtil::getPublicProperties($class);
    }

    public static function reflection($class) {
        ReflectionUtil::reflection($class);
    }

    public function __toString() {
        $name = ReflectionUtil::getClassName($this);
        $values = ReflectionUtil::getPropertiesValue($this);
        $strs = array();
        foreach($values as $key => $value) {
            $strs[] = "$key=$value";
        }
        $str = implode(",", $strs);
        $str = "$name($str)";
        return $str;
    }
}