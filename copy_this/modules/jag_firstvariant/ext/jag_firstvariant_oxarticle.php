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
 * jag_firstvariant_oxarticle.php
 *
 * The jag_firstvariant_oxarticle class file.
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
class jag_firstvariant_oxarticle extends jag_firstvariant_oxarticle_parent
{
    protected $_oFirstVariant = null;
    
    /**
     * Returns first (from sorting) active variant.
	 *
	 * @return object
     */
    public function getFirstVariant()
    {
        startProfile(__FUNCTION__);
        $this->_blLoadVariants = true;
        $oVariants = $this->getVariants();

        if (!$this->isVariant()
            && $oVariants
            && count($oVariants) > 0
        ) {
            $oVariants->rewind();
            $aVariants = $oVariants->getArray();
        
            $oVariant = oxNew('oxarticle');
            $oVariant->load(current($aVariants)->getId());
            
            $this->_oFirstVariant = $oVariant;
        }
        stopProfile(__FUNCTION__);
        
        return $this->_oFirstVariant; 
    }

    /**
     * Returns true if the product has an variant.
	 *
	 * @return boolean
     */
    public function hasVariants()
    {
        return $this->_hasAnyVariant();
    }
    
	/**
     * Returns the picture url.
     *
     * @param string $iIndex The picture index.
	 *
	 * @return string
     */
    public function getPictureUrl($iIndex = '')
    {
        if ($this->_oFirstVariant && !isAdmin()) {
            return $this->_oFirstVariant->getPictureUrl($iIndex);
        } else {
            return parent::getPictureUrl($iIndex);
        }
    }
    
	/**
     * Returns the thumbnail url.
	 *
	 * @return string
     */
    public function getThumbnailUrl($bSsl = NULL)
    {
        if ($this->_oFirstVariant && !isAdmin()) {
            return $this->_oFirstVariant->getThumbnailUrl();
        } else {
            return parent::getThumbnailUrl();
        }
    }

	/**
     * Returns the icon url.
     *
     * @param string $iIndex The picture index.
	 *
	 * @return string
     */    
    public function getIconUrl($iIndex = '')
    {
        if ($this->_oFirstVariant && !isAdmin()) {
            return $this->_oFirstVariant->getIconUrl($iIndex);
        } else {
            return parent::getIconUrl($iIndex);
        }
    }
    
	/**
     * Returns the link url of the product.
     *
     * @param integer $iLang  The language id.
     * @param boolean $blMain True if it's the main product.
	 *
	 * @return string
     */
    public function getLink($iLang = null, $blMain = false  )
    {
        if ($this->_oFirstVariant && !isAdmin()) {
            return $this->_oFirstVariant->getLink($iLang, $blMain);
        } else {
            return parent::getLink($iLang, $blMain);
        }
    }
    
    /**
     * Assigns to oxarticle object some base parameters/values (such as detaillink, moredetaillink, etc).
     *
     * @param array $aRecord Representing current field values
     *
     * @return null
     */
    public function assign($aRecord)
    {
        parent::assign($aRecord);
		
        startProfile('jag_firstvariant_oxarticle::assign');
		
        if (!$this->isAdmin() && $this->_hasAnyVariant()) {
            $this->getFirstVariant();
        }
		
        stopProfile('jag_firstvariant_oxarticle::assign');
    }
}

