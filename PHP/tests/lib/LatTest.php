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

class LatTest extends PHPUnit_Framework_TestCase {

	public function testLatDefined() {
		$latExists = function_exists('lat');

		$this->assertTrue($latExists);
	}

	/**
     * @depends testLatDefined
     */
	public function testListWithLists() {
		$list = array(
			'atom1',
			'atom2',
			'atom3',
			array('atom2', 'atom4'),
			'atom1',
			array('listInList'),
			'atom7'
		);

		$this->assertFalse(lat($list));
	}

	/**
     * @depends testLatDefined
     */
	public function testListWithAtoms() {
		$list = array(
			'atom1',
			'atom2',
			'atom3',
			'atom1',
			'atom7'
		);

		$this->assertTrue(lat($list));
	}
}
?>