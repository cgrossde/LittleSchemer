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

class MultiremberTest extends PHPUnit_Framework_TestCase {

	public function testMultiremberDefined() {
		$multiremberExists = function_exists('multirember');

		$this->assertTrue($multiremberExists);
	}

	/**
     * @depends testMultiremberDefined
     */
	public function testNoNeedleInList() {
		$expected = array(
			'atom1',
			'atom2',
			'atom3',
			'atom1'
		);
		$needle = 'not';

		$actual = multirember($needle, $expected);

		$this->assertEquals($expected, $actual);
	}

	/**
     * @depends testMultiremberDefined
     */
	public function testRemoveNeedleFromList() {
		$expected = array(
			'atom2',
			'atom3'
		);
		$haystack = array(
			'atom1',
			'atom2',
			'atom3'
		);
		$needle = 'atom1';

		$actual = multirember($needle, $haystack);

		$this->assertEquals($expected, $actual);
	}

	/**
     * @depends testMultiremberDefined
     */
	public function testRemoveTwoNeedlesFromList() {
		$expected = array(
			'atom2',
			'atom3'
		);
		$haystack = array(
			'atom1',
			'atom2',
			'atom3',
			'atom1'
		);
		$needle = 'atom1';

		$actual = multirember($needle, $haystack);

		$this->assertEquals($expected, $actual);
	}

	/**
     * @depends testMultiremberDefined
     */
	public function testRemoveNeedlesFromListOfNeedles() {
		$expected = array();
		$haystack = array(
			'atom1',
			'atom1'
		);
		$needle = 'atom1';

		$actual = multirember($needle, $haystack);

		$this->assertEquals($expected, $actual);
	}
}
?>