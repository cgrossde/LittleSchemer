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
 * eq - returns true if two non-numeric atoms are equal
 *
 * Only accepts non-numeric atoms
 *
 * @param string $arg1
 * @param string $arg2
 * @return boolean
 */
function eq($arg1, $arg2) {
	if(!is_string($arg1) || preg_match('/^[0-9]$/', $arg1))
		throw new InvalidArgumentException("eq - arg1 needs to be a non-numeric atom");

	if(!is_string($arg2) || preg_match('/^[0-9]$/', $arg2))
		throw new InvalidArgumentException("eq - arg2 needs to be a non-numeric atom");

	return ($arg1 === $arg2);
}
?>