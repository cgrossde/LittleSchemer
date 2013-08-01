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

class InsertRTest extends PHPUnit_Framework_TestCase {

	public function testInsertRDefined() {
		$insertRExists = function_exists('insertR');

		$this->assertTrue($insertRExists);
	}

	/**
     * @depends testInsertRDefined
     */
	public function testNoNeedleInList() {
		$expected = array(
			'atom1',
			'atom2',
			'atom3',
			'atom1'
		);
		$new = 'not';
		$old = 'top';
		$actual = insertR($new, $old, $expected);

		$this->assertEquals($expected, $actual);
	}

	/**
     * @depends testInsertRDefined
     */
	public function testNeedleInList() {
		$expected = array(
			'tacos', 'tamales', 'and', 'jalapeno', 'salsa'
		);

		$list = array(
			'tacos', 'tamales', 'and', 'salsa'
		);

		$new = 'jalapeno';
		$old = 'and';

		$actual = insertR($new, $old, $list);
		$this->assertEquals($expected, $actual);
	}

	/**
	 * @expectedException InvalidArgumentException
     * @depends testInsertRDefined
     */
	public function testListOfLists() {
		$list = array(
			'tacos', 'tamales', 'and', array('burritos')
		);

		$new = 'burritos';
		$old = 'salsa';

		insertR($new, $old, $list);
	}
}
?>