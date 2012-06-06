<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");;
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace WindowsAzure\Common\Internal\Atom;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;

/**
 * The category class of the ATOM standard.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @packageversion@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class Category
{
    /**
     * The term of the category. 
     *
     * @var string  
     */
    protected $term;

    /**
     * The scheme of the category. 
     *
     * @var string  
     */
    protected $scheme;

    /**
     * The label of the category. 
     * 
     * @var string 
     */ 
    protected $label;

    /**
     * The undefined content of the category. 
     *  
     * @var string 
     */
    protected $undefinedContent;
     
    /** 
     * Creates a Category instance with specified text.
     *
     * @param string $undefinedContent The undefined content of the category.
     *
     * @return none
     */
    public function construct($undefinedContent = Resources::EMPTYSTRING)
    {
        $this->undefinedContent = $undefinedContent;
    }

    /**
     * Creates an ATOM Category instance with specified xml string. 
     * 
     * @param string $xmlString an XML based string of ATOM CONTENT.
     * 
     * @return none
     */ 
    public function parseXml($xmlString)
    {
        $categoryXml = simplexmlloadstring($xmlString);
        $attributes  = $categoryXml->attributes();
        if (!empty($attributes['term'])) {
            $this->term = (string)$attributes['term'];
        }

        if (!empty($attributes['scheme'])) {
            $this->scheme = (string)$attributes['scheme'];
        }

        if (!empty($attributes['label'])) {
            $this->label = (string)$attributes['label'];
        }

        $this->undefinedContent =(string)$categoryXml;
    }

    /** 
     * Gets the term of the category. 
     *
     * @return string
     */
    public function getTerm()
    {   
        return $this->term;
    } 

    /**
     * Sets the term of the category.
     * 
     * @param string $term The term of the category.
     * 
     * @return none
     */
    public function setTerm($term)
    {
        $this->term = $term; 
    }

    /**
     * Gets the scheme of the category. 
     * 
     * @return string
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * Sets the scheme of the category. 
     * 
     * @param string $scheme The scheme of the category.
     * 
     * @return none
     */
    public function setScheme($scheme)
    {
        $this->scheme = $scheme;
    }

    /**
     * Gets the label of the category. 
     *
     * @return string The label. 
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Sets the label of the category. 
     * 
     * @param string $label The label of the category. 
     * 
     * @return none
     */ 
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * Gets the undefined content of the category. 
     * 
     * @return string
     */
    public function getUndefinedContent()
    {
        return $this->undefinedContent;
    }

    /**
     * Sets the undefined content of the category. 
     * 
     * @param string $undefinedContent The undefined content of the category. 
     *
     * @return none
     */
    public function setUndefinedContent($undefinedContent)
    {
        $this->undefinedContent = $undefinedContent;
    }
    
    /** 
     * Writes an XML representing the category. 
     * 
     * @param \XMLWriter $xmlWriter The XML writer.
     * 
     * @return none
     */
    public function writeXml($xmlWriter)
    {
        $xmlWriter->startElement('atom:category');
        $this->writeInnerXml($xmlWriter);
        $xmlWriter->endElement();
    }

    /** 
     * Writes an XML representing the category. 
     * 
     * @param \XMLWriter $xmlWriter The XML writer.
     * 
     * @return none
     */
    public function writeInnerXml($xmlWriter)
    {
        if (!empty($this->term)) {
            $xmlWriter->WriteAttribute('term', $this->term);
        }

        if (!empty($this->scheme)) {
            $xmlWriter->WriteAttribute('scheme', $this->scheme);
        }

        if (!empty($this->label)) {
            $xmlWriter->WriteAttribute('label', $this->label);
        }

        if (!empty($this->content)) {
            $xmlWriter->WriteRaw($this->content);
        }

    }
}
?>
