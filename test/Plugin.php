<?php //-->
/**
 * This file is part of the Eden PHP Library.
 * (c) 2014-2016 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

class Eve_L10n_Plugin extends PHPUnit_Framework_TestCase
{
    public function testImport()
    {
        $callback = Eve\L10n\Plugin::i()->import();
		
		$this->assertTrue(is_callable($callback));
	}
}