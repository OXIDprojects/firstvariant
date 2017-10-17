<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License
 * for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this programm.  If not, see <http://www.gnu.org/licenses/>.
 *
 * jag_gotofirstvariant_details.php
 *
 * The jag_gotofirstvariant_details class file.
 *
 * PHP versions 5
 *
 * @category  jag_firstvariant
 * @package   jag_firstvariant
 * @author    Eric Jankowfsky UG (haftungsbeschränkt) <entwicklung@eric-jankowfsky.de>
 * @copyright 2011 Eric Jankowfsky Module UG (haftungsbeschränkt)
 * @version   SVN: $Id$
 * @link      http://www.eric-jankowfsky.de
 * @license	  GPL
 */
class jag_gotofirstvariant_details extends jag_gotofirstvariant_details_parent
{
    /**
     * Inits the product view.
     *
     * @return null
     */
    public function init()
    {
        parent::init();
 
        $oProduct = $this->getProduct();

        if ($oProduct->hasVariants()) {
            $oFirstVariant = $oProduct->getFirstVariant();
            if ($oFirstVariant) {
                $link = $oFirstVariant->getLink();
                $oxutils = oxRegistry::getUtils();
                $oxutils->redirect($link, false, 301);
            }
        }
    }

    /**
     * Prepairs the product object for the view and returns it.
     *
     * @return mixed
     */
    /*public function getProduct()
    {
        $myConfig = $this->getConfig();
        $myUtils = oxUtils::getInstance();

        if ( $this->_oProduct === null ) {
            //this option is only for lists and we must reset value
            //as blLoadVariants = false affect "ab price" functionality
            $myConfig->setConfigParam( 'blLoadVariants', true );

            $sOxid = oxConfig::getParameter( 'anid' );

            //object is not yet loaded
            $this->_oProduct = oxNew( 'oxarticle' );
            //$this->_oProduct->setSkipAbPrice( true );

            if ( !$this->_oProduct->load( $sOxid ) ) {
                $myUtils->redirect( $myConfig->getShopHomeURL() );
                $myUtils->showMessageAndExit( '' );
            }
        }

        //additional checks
        if ( !$this->_blIsInitialized ) {
            $blContinue = true;
			
            if ( !$this->_oProduct->isVisible() ) {
                $blContinue = false;
            } elseif ( $this->_oProduct->oxarticles__oxparentid->value ) {
                $oParent = $this->_getParentProduct( $this->_oProduct->oxarticles__oxparentid->value );
                if ( !$oParent || !$oParent->isVisible() ) {
                    $blContinue = false;
                }
            }

            if ( !$blContinue ) {
                $myUtils->redirect( $myConfig->getShopHomeURL() );
                $myUtils->showMessageAndExit( '' );
            }

            $this->_processProduct( $this->_oProduct );
            $this->_blIsInitialized = true;
        }

        return $this->_oProduct;
    }*/
}
