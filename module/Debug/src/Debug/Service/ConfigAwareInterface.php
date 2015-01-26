<?php
namespace Debug\Service;

interface ConfigAwareInterface {
    public function setConfig($config);
    public function getConfig();
}