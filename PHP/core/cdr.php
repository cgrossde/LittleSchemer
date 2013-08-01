<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Christoph Gross <gross@blubyte.de>
 *
 *  All rights reserved
 *
 *  This script is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * cdr - returns list without first element
 *
 * Is only defined for non-empty lists
 * The cdr of any non-empty list is always 
 * another list
 *
 * @param array
 * @return array
 */
function cdr($list) {
	if(!is_array($list) || count($list) == 0)
		throw new InvalidArgumentException("cdr - only defined for non-empty lists.");

	array_shift($list);
	return $list;
}
 ?>