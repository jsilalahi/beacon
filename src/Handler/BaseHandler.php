<?php

namespace DynEd\Beacon\Handler;

use Exception;

abstract class BaseHandler {

    public abstract function sendReport(Exception $e);

}