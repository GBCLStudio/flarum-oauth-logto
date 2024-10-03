<?php
/*
 * This file is part of gbcl/logto.
 *
 * Copyright (c) 2024 GBCLStudio.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace GBCLStudio\OAuthLogto;

use Flarum\Extend;
use FoF\OAuth\Extend as OAuthExtend;

return [
    (new Extend\Frontend('forum'))
        ->css(__DIR__.'/less/forum.less'),

    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    new Extend\Locales(__DIR__.'/locale'),

    (new OAuthExtend\RegisterProvider(Providers\Logto::class)),
];
