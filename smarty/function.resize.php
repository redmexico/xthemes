<?php
/**
 * xThemes for XOOPS
 * A theme framework to create stunning themes for XOOPS.
 *
 * Copyright © 2014 Eduardo Cortés
 * -----------------------------------------------------------------
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * -----------------------------------------------------------------
 * @package      xThemes
 * @author       Eduardo Cortés <yo@eduardocortes.mx>
 * @copyright    2009 - 2014 Eduardo Cortés
 * @license      GPL v2
 * @link         http://eduardocortes.mx
 * @link         http://xoopsmexico.net
 * @param mixed $options
 * @param mixed $tpl
 */

/**
 * <p>This file allows to create a thumbnails or different sizes versions of
 * an image in runtime.</p>
 *
 * <strong>Example of use:</strong>
 * <pre>
 * <img src="<{resize file=url_to_an_image w=width_value h=height_value}>">
 * </pre>
 */
function smarty_function_resize($options, $tpl)
{
    $file = RMHttpRequest::array_value('file', $options, 'string', '');
    $dir = RMHttpRequest::array_value('dir', $options, 'string', 'resizer');
    $width = RMHttpRequest::array_value('w', $options, 'integer', 0);
    $height = RMHttpRequest::array_value('h', $options, 'integer', 0);
    $params = new stdClass();
    $params->width = $width;
    $params->height = $height;
    $params->target = $dir;

    $resizer = new RMImageResizer();
    $image = $resizer->resize($file, $params);

    return $image->url;
}
