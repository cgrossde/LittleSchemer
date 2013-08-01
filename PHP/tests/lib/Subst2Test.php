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

class Subst2Test extends PHPUnit_Framework_TestCase {

	public function testSubst2Defined() {
		$subst2Exists = function_exists('subst2');

		$this->assertTrue($subst2Exists);
	}

	/**
     * @depends testSubst2Defined
     */
	public function testNoNeedleInList() {
		$expected = array(
			'atom1',
			'atom2',
			'atom3',
			'atom1'
		);
		$new = 'not';
		$old1 = 'top';
		$old2 = 'tap';
		$actual = subst2($new, $old1, $old2, $expected);

		$this->assertEquals($expected, $actual);
	}

	/**
     * @depends testSubst2Defined
     */
	public function testFirstNeedleInList() {
		$expected = array(
			'tacos', 'tamales', 'and', 'burritos'
		);

		$list = array(
			'tacos', 'tamales', 'and', 'salsa'
		);

		$new = 'burritos';
		$old1 = 'salsa';
		$old2 = 'tap';
		$actual = subst2($new, $old1, $old2, $expected);
		$this->assertEquals($expected, $actual);
	}

	/**
     * @depends testSubst2Defined
     */
	public function testSecondNeedleInList() {
		$expected = array(
			'tacos', 'tamales', 'and', 'burritos'
		);

		$list = array(
			'tacos', 'tamales', 'and', 'salsa'
		);

		$new = 'burritos';
		$old1 = 'tap';
		$old2 = 'salsa';
		$actual = subst2($new, $old1, $old2, $expected);
		$this->assertEquals($expected, $actual);
	}

	/**
	 * @expectedException InvalidArgumentException
     * @depends testSubst2Defined
     */
	public function testListOfLists() {
		$list = array(
			'tacos', 'tamales', 'and', array('burritos')
		);

		$new = 'burritos';
		$old = 'salsa';

		subst2($new, $old, $old, $list);
	}
}
?>