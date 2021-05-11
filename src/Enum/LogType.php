<?php

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class LogType
 *
 * @method static LogType CELEBRITY_UPDATE()
 * @method static LogType REPRESENTATIVE_UPDATE()
 * @method static LogType CELEBRITY_REPRESENTATIVE_UPDATE()
 *
 * @package App\Enum
 */
class LogType extends Enum
{
    private const CELEBRITY_UPDATE = 'celebrity_update';
    private const REPRESENTATIVE_UPDATE = 'representative_update';
    private const CELEBRITY_REPRESENTATIVE_UPDATE = 'celebrity_representative_update';
}