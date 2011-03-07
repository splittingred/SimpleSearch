<?php
/**
 * SimpleSearch
 *
 * Copyright 2009-2011 by Shaun McCormick <shaun@modx.com>
 *
 * SimpleSearch is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * SimpleSearch is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * SimpleSearch; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package simplesearch
 */
/**
 * Base Hooks handling class
 *
 * @package simplesearch
 */
class siHooks {
    /**
     * @var array $errors A collection of all the processed errors so far.
     * @access public
     */
    public $errors = array();
    /**
     * @var array $hooks A collection of all the processed hooks so far.
     * @access public
     */
    public $hooks = array();
    /**
     * @var modX $modx A reference to the modX instance.
     * @access public
     */
    public $modx = null;
    /**
     * @var SimpleSearch $search A reference to the SimpleSearch instance.
     * @access public
     */
    public $search = null;
    /**
     * @var string If a hook redirects, it needs to set this var to use proper
     * order of execution on redirects/stores
     * @access public
     */
    public $redirectUrl = null;

    public $facets = array();
    public $currentFacet = 'default';

    /**
     * The constructor for the fiHooks class
     *
     * @param SimpleSearch &$simplesearch A reference to the SimpleSearch class instance.
     * @param array $config Optional. An array of configuration parameters.
     * @return fiHooks
     */
    function __construct(SimpleSearch &$search,array $config = array()) {
        $this->search =& $search;
        $this->modx =& $search->modx;
        $this->config = array_merge(array(
        ),$config);
    }

    /**
     * Loads an array of hooks. If one fails, will not proceed.
     *
     * @access public
     * @param array $hooks The hooks to run.
     * @param array $fields The fields and values of the form
     * @param array $customProperties An array of extra properties to send to the hook
     * @return array An array of field name => value pairs.
     */
    public function loadMultiple($hooks,array $fields = array(),array $customProperties = array()) {
        if (empty($hooks)) return array();
        if (is_string($hooks)) $hooks = explode(',',$hooks);

        $this->hooks = array();
        $this->fields =& $fields;
        foreach ($hooks as $hook) {
            $hook = trim($hook);
            $success = $this->load($hook,$this->fields,$customProperties);
            if (!$success) return $this->hooks;
            /* dont proceed if hook fails */
        }
        return $this->hooks;
    }

    /**
     * Load a hook. Stores any errors for the hook to $this->errors.
     *
     * @access public
     * @param string $hook The name of the hook. May be a Snippet name.
     * @param array $fields The fields and values of the form.
     * @param array $customProperties Any other custom properties to load into a custom hook.
     * @return boolean True if hook was successful.
     */
    public function load($hook,array $fields = array(),array $customProperties = array()) {
        $success = false;
        if (!empty($fields)) $this->fields =& $fields;
        $this->hooks[] = $hook;

        $reserved = array('load','_process','__construct','getErrorMessage');
        if (method_exists($this,$hook) && !in_array($hook,$reserved)) {
            /* built-in hooks */
            $success = $this->$hook($this->fields);

        } else if ($snippet = $this->modx->getObject('modSnippet',array('name' => $hook))) {
            /* custom snippet hook */
            $properties = array_merge($this->search->config,$customProperties);
            $properties['simplesearch'] =& $this->search;
            $properties['hook'] =& $this;
            $properties['fields'] = $this->fields;
            $properties['errors'] =& $this->errors;
            $success = $snippet->process($properties);

        } else {
            /* no hook found */
            $this->modx->log(modX::LOG_LEVEL_ERROR,'[SimpleSearch] Could not find hook "'.$hook.'".');
            $success = true;
        }

        if (is_array($success) && !empty($success)) {
            $this->errors = array_merge($this->errors,$success);
            $success = false;
        } else if ($success != true) {
            $this->errors[$hook] .= ' '.$success;
            $success = false;
        }
        return $success;
    }

    /**
     * Gets the error messages compiled into a single string.
     *
     * @access public
     * @param string $delim The delimiter between each message.
     * @return string The concatenated error message
     */
    public function getErrorMessage($delim = "\n") {
        return implode($delim,$this->errors);
    }
    
    /**
     * Adds an error to the stack.
     *
     * @access private
     * @param string $key The field to add the error to.
     * @param string $value The error message.
     * @return string The added error message with the error wrapper.
     */
    public function addError($key,$value) {
        $this->errors[$key] .= $value;
        return $this->errors[$key];
    }

    /**
     * Sets the value of a field.
     *
     * @param string $key The field name to set.
     * @param mixed $value The value to set to the field.
     * @return mixed The set value.
     */
    public function setValue($key,$value) {
        $this->fields[$key] = $value;
        return $this->fields[$key];
    }

    /**
     * Sets an associative array of field name and values.
     *
     * @param array $values A key/name pair of fields and values to set.
     */
    public function setValues(array $values = array()) {
        foreach ($values as $key => $value) {
            $this->setValue($key,$value);
        }
    }

    /**
     * Gets the value of a field.
     *
     * @param string $key The field name to get.
     * @return mixed The value of the key, or null if non-existent.
     */
    public function getValue($key) {
        if (array_key_exists($key,$this->fields)) {
            return $this->fields[$key];
        }
        return null;
    }

    /**
     * Gets an associative array of field name and values.
     *
     * @return array $values A key/name pair of fields and values.
     */
    public function getValues() {
        return $this->fields;
    }

    /**
     * Processes string and sets placeholders
     *
     * @param string $str The string to process
     * @param array $placeholders An array of placeholders to replace with values
     * @return string The parsed string
     */
    public function _process($str,array $placeholders = array()) {
        foreach ($placeholders as $k => $v) {
            $str = str_replace('[[+'.$k.']]',$v,$str);
        }
        return $str;
    }

    /**
     * Set a URL to redirect to after all hooks run successfully.
     *
     * @param string $url The URL to redirect to after all hooks execute
     */
    public function setRedirectUrl($url) {
        $this->redirectUrl = $url;
    }

    public function addFacet($facet,array $results = array(),$total = false) {
        $this->facets[$facet] = array();
        $this->facets[$facet]['results'] = $results;
        if ($total === false) {
            $total = count($results);
        }
        $this->facets[$facet]['total'] = $total;
        return $this->facets[$facet];
    }
    public function addResultToFacet($facet,$result) {
        $this->facets[$facet]['results'][] = $result;
    }
}