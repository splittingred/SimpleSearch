<?php
/**
 * SimpleSearch
 *
 * Copyright 2010 by Shaun McCormick <shaun@modxcms.com>
 *
 * This file is part of SimpleSearch, a simple search component for MODx
 * Revolution. It is loosely based off of AjaxSearch for MODx Evolution by
 * coroico/kylej, minus the ajax.
 *
 * SimpleSearch is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * SimpleSearch is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * SimpleSearch; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package simplesearch
 */
/**
 * Abstract class for providing custom search driver implementations.
 * 
 * @package simplesearch
 */
abstract class SimpleSearchDriver {
    public $search;
    public $modx;
    public $config;
    
    public $searchScores = array();

    function __construct(SimpleSearch &$search,array $config = array()) {
        $this->search =& $search;
        $this->modx =& $search->modx;
        $this->config = array_merge($config,array());
        $this->initialize();
    }

    abstract public function initialize();
    abstract public function search($string,array $scriptProperties = array());
    abstract public function index($id,array $data);
    abstract public function removeFromIndex($id);

    /**
     * Scores and sorts the results based on 'fieldPotency'
     *
     * @param array $resources
     * @param array $scriptProperties The $scriptProperties array
     * @return array Scored and sorted search results
     */
    protected function sortResults(array $resources,array $scriptProperties) {
        // Vars
        $searchStyle = $this->modx->getOption('searchStyle', $scriptProperties, 'partial');
        $docFields = explode(',', $this->modx->getOption('docFields', $scriptProperties, 'pagetitle,longtitle,alias,description,introtext,content'));
        $fieldPotency = array_map('trim', explode(',', $this->modx->getOption('fieldPotency', $scriptProperties,'')));
        foreach ($fieldPotency as $key => $field) {
            unset($fieldPotency[$key]);
            $arr = explode(':', $field);
            $fieldPotency[$arr[0]] = $arr[1];
        }
        // Score
        foreach ($resources as $doc_id => $doc) {
            foreach ($docFields as $field) {
                $potency = (array_key_exists($field, $fieldPotency)) ? (int) $fieldPotency[$field] : 1;
                foreach ($this->search->searchArray as $term) {
                    $qterm = preg_quote($term);
                    $regex = ($searchStyle == 'partial') ? "/{$qterm}/i" : "/\b{$qterm}\b/i";
                    $n_matches = preg_match_all($regex, $doc->{$field}, $matches);
                    $this->searchScores[$doc_id] += $n_matches * $potency;
                }
            }
        }
        // Sort
        arsort($this->searchScores);
        $list = array();
        foreach ($this->searchScores as $doc_id => $score) {
            array_push($list, $resources[$doc_id]);
        }
        return $list;
    }


    /**
     * Process the passed IDs
     *
     * @param string $ids The IDs to search
     * @param string $type The type of id filter
     * @param integer $depth The depth in the Resource tree to filter by
     * @return string Comma delimited string of the IDs
     */
    protected function processIds($ids = '',$type = 'parents',$depth = 10) {
        if (!strlen($ids)) return '';
        $ids = $this->cleanIds($ids);
    	switch ($type) {
            case 'parents':
                $idArray = explode(',', $ids);
                $ids = $idArray;
                foreach ($idArray as $id) {
                    $ids = array_merge($ids,$this->modx->getChildIds($id,$depth));
                }
                $ids = array_unique($ids);
                sort($ids);
                break;
        }
        $this->ids = $ids;
        return $this->ids;
    }

    /**
     * Clean IDs
     *
     * @param string $ids Comma delimited string of IDs
     * @return string Cleaned comma delimited string of IDs
     */
    public function cleanIds($ids) {
        $pattern = array (
            '`(,)+`', //Multiple commas
            '`^(,)`', //Comma on first position
            '`(,)$`' //Comma on last position
        );
        $replace = array (
            ',',
            '',
            ''
        );
        return preg_replace($pattern, $replace, $ids);
    }
}
