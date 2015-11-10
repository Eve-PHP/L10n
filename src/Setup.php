<?php //-->
/**
 * This file is part of the Eden PHP Library.
 * (c) 2014-2016 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

namespace Eve\Plugin\L10n;

use Eden\Registry\Index as Registry;

/**
 * l10n Middleware Plugin Class
 *
 * @package  Eve
 * @category Plugin
 * @author   Christian Blanquera <cblanquera@openovate.com>
 * @standard PSR-2
 */
class Setup extends Base
{
    /**
     * @const int INSTANCE Flag that designates singleton when using ::i()
     */
    const INSTANCE = 1;
    
    /**
     * Main route method
     *
     * @return function
     */
    public function import(array $l10n = array())
    {
        //remember this scope
        $self = $this;

        //You can add validators here
        return function ($request, $response) use ($self, $l10n) {
            //before we do anything, lets's check for l10n and i18n
            $host = $request->get('server', 'HTTP_HOST');
            
            //if we can't find the host
            if (!isset($l10n[$host]) || $l10n[$host] === 'default') {
                //just use the default settings
                $host = 'default';
            }
            
            //if it's a redirect
            if (is_string($l10n[$host])) {
                eve()->redirect('http://'.$l10n[$host]);
            }
            
            //load the languages
            foreach ($l10n[$host]['i18n'] as $i => $i18n) {
                $translations = eve()->settings('i18n/'.$i18n);
                
                if ($i === 0) {
                    eve()->defaultLanguage = eve('language', $translations);
                }
                
                $request->set('i18n', $i18n, $translations);
            }
            
            //set the locale
            $request->set('l10n', $l10n[$host]);
        };
    }
}
