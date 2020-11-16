<?php

namespace Infra\EventSourcing\CodeGeneration;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
interface CodeGenerator {

    function generate (array $dsl): string;
}
