<?php

require_once('GenerateActions.php');
require_once('GenerateExceptions.php');

$gen_actions = new GenerateActions();
$gen_actions->generate();

$gen_exceptions = new GenerateExceptions();
$gen_exceptions->generate();