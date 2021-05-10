<?php

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class RepresentativeType
 *
 * @method static RepresentativeType AGENT()
 * @method static RepresentativeType PUBLICIST()
 * @method static RepresentativeType MANAGER()
 *
 * @package App\Enum
 */
class RepresentativeType extends Enum
{
    private const AGENT = 'agent';
    private const PUBLICIST = 'publicist';
    private const MANAGER = 'manager';
}