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
 * subst - Replaces new with first occurence of either old1 old2 in a lat
 * @param  string $new
 * @param  string $old
 * @param  array $list
 * @return array
 */
function subst2($new, $old1, $old2, $list) {
	if( null($list) )
		return array();

	if( eq( $old1, car($list) ) || eq( $old2, car($list) ) )
		return cons( $new, cdr($list) );
	else
		return cons( car($list), subst2($new, $old1, $old2, cdr($list)));
}
?>