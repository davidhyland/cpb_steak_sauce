<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(PATH_THIRD . 'steak_sauce/config.php');

$plugin_info = array(
	'pi_name'			=>  ADD_ON_NAME,
	'pi_version'		=>  ADD_ON_V,
	'pi_author'			=> 'Curtis Blackwell',
	'pi_author_url'		=> 'http://curtisblackwell.com',
	'pi_description'	=> 'Converts letters to numbers and vice versa.',
	'pi_usage'			=>  Steak_sauce::usage()
);

/*
	cpb Steak Sauce Class

	@package	cpb Steak Sauce
	@author		Curtis Blackwell
	@link		http://curtisblackwell.com/expressionengine-add-ons/plugins/steak-sauce
	@license	http://creativecommons.org/licenses/by-sa/3.0/
*/

class Steak_sauce {

	function Steak_sauce() {

		$this->EE =& get_instance();

		$int_to_let = array(
			1	=> 'a',
			2	=> 'b',
			3	=> 'c',
			4	=> 'd',
			5	=> 'e',
			6	=> 'f',
			7	=> 'g',
			8	=> 'h',
			9	=> 'i',
			10	=> 'j',
			11	=> 'k',
			12	=> 'l',
			13	=> 'm',
			14	=> 'n',
			15	=> 'o',
			16	=> 'p',
			17	=> 'q',
			18	=> 'r',
			19	=> 's',
			20	=> 't',
			21	=> 'u',
			22	=> 'v',
			23	=> 'w',
			24	=> 'x',
			25	=> 'y',
			26	=> 'z'
		);

		$tag_data = $this->EE->TMPL->tagdata;

		if (is_numeric($tag_data)) {

			if ($tag_data < 1 || $tag_data >26) {
				$this->return_data = '';
			} else {
				$uppercase = ($this->EE->TMPL->fetch_param('uppercase')=='yes') ? true : false;
				$this->return_data = ($uppercase) ? strtoupper($int_to_let[$tag_data]) : $int_to_let[$tag_data];
			}

		} else {

			$int_to_let = array_flip($int_to_let);
			$this->return_data = $int_to_let[$tag_data];

		}

	}



	/* --------------------------------------------------------------------

		Usage

		This function describes how the plugin is used.

		@access	public
		@return	string

	 */

	function usage() {
	ob_start();
	?>

	cpb Steak Sauce
	===============

	cpb Steak Sauce is an ExpressionEngine 2 plugin that converts integers to their corresponding letters and vice versa. For example, a = 1, b = 2, c = 3, etc.

	Installation
	------------

	Upload the steak_sauce folder to system/expressionengine/third_party


	Usage
	-----

	Simply wrap the tags around the integer or letter like so:

		{exp:steak_sauce}a{/exp:steak_sauce} returns "1"
		{exp:steak_sauce}1{/exp:steak_sauce} returns "a"
		{exp:steak_sauce uppercase='yes'}1{/exp:steak_sauce} returns "A"


	### Example Usage

	I'm using this to convert Matrix {row_count}s to letters on a personal project cataloguing my vinyl records (Side A, Side B, etc.).

	Known Issues
	------------

	Due to a lack of knowledge, this plugin is limited to lowercase letters. I'll probably update it to support capital letters as well once I learn some more PHP.


	<?php
	$buffer = ob_get_contents();

	ob_end_clean();

	return $buffer;
	}

}

// End of file pi.steak_sauce.php
// Location: ./system/expressionengine/third_party/steak_sauce/pi.steak_sauce.php

?>