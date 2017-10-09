<?php

/**
 * This Software is the property of jankowfsky AG and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license is
 * a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * metadata.php
 *
 * The metadata file.
 *
 * PHP versions 5
 *
 * @category  jag_firstvariant
 * @package   jag_firstvariant
 * @author    jankowfsky AG <entwicklung@jankowfsky.com>
 * @copyright 2012 jankowfsky AG
 * @version   SVN: $Id$
 * @link      http://www.jankowfsky.com
 */


/**
 * Metadata version
 */
$sMetadataVersion = '1.0';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'jag_firstvariant',
    'title'        => 'firstvariant',
    'description'  => 'OXID 4.6.0 EE/PE/CE<br/>',
    'version'      => '1.0.2',
    'author'       => 'Jankowfsky AG',
    'url'          => 'http://www.jankowfsky.com',
    'email'        => 'firstname@jankowfsky.com',
    'extend'       => array(
        'oxarticle'        => 'jag_firstvariant/ext/jag_firstvariant_oxarticle',
        'details'          => 'jag_firstvariant/ext/jag_gotofirstvariant_details',
    ),
);