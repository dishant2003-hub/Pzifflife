<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('_startsWith')) {
	function _startsWith($haystack, $needle)
	{
		// search backwards starting from haystack length characters from the end
		return $needle === '' || strrpos($haystack, $needle, -strlen($haystack)) !== false;
	}
}

/**
 * Get string before specific charcter/word
 * @param  string $string    string from where to get
 * @param  substring $substring search for
 * @return string
 */
function strbefore($string, $substring)
{
	$pos = strpos($string, $substring);
	if ($pos === false) {
		return $string;
	}
	return (substr($string, 0, $pos));
}

function strafter($string, $substring)
{
	$pos = strpos($string, $substring);
	if ($pos === false) {
		return $string;
	}
    return substr($string, strpos($string, $substring) + strlen($substring));
}

/**
 * General function for all datatables, performs search,additional select,join,where,orders
 * @param  array $aColumns           table columns
 * @param  mixed $sIndexColumn       main column in table for bettter performing
 * @param  string $sTable            table name
 * @param  array  $join              join other tables
 * @param  array  $where             perform where in query
 * @param  array  $additionalSelect  select additional fields
 * @param  string $sGroupBy group results
 * @return array
 */
function data_tables_init($aColumns, $sIndexColumn, $sTable, $join = [], $where = [], $additionalSelect = [], $sGroupBy = '', $searchAs = [], $extra_orderby = '')
{
    $CI          = & get_instance();
    $__post      = $CI->input->post();
    $havingCount = '';
    
    /*
     * Paging
     */
    $sLimit = '';
    if ((is_numeric($CI->input->post('start'))) && $CI->input->post('length') != '-1') {
        $sLimit = 'LIMIT ' . intval($CI->input->post('start')) . ', ' . intval($CI->input->post('length'));
    }
    $_aColumns = [];
    foreach ($aColumns as $column) {
        // if found only one dot
        if (substr_count($column, '.') == 1 && strpos($column, ' as ') === false) {
            $_column = explode('.', $column);
            if (isset($_column[1])) {
				array_push($_aColumns, $column);
            } else {
                array_push($_aColumns, $_column[0]);
            }
        } else {
            array_push($_aColumns, $column);
        }
    }

    /*
     * Ordering
     */
    $dueDateColumns = [];
    $sOrder         = '';
    if ($CI->input->post('order')) {
        $sOrder = 'ORDER BY ';

        if(!empty($extra_orderby)){
            $sOrder .= $extra_orderby . " , ";
        }
        foreach ($CI->input->post('order') as $key => $val) {
            $columnName = $aColumns[intval($__post['order'][$key]['column'])];
            $dir        = strtoupper($__post['order'][$key]['dir']);

            if (strpos($columnName, ' as ') !== false || strpos($columnName, ' AS ') !== false) {
                if(strpos($columnName, 'SELECT ') !== false){
                    $columnName = $val['column'];
                }else{
                    $columnName = strbefore($columnName, ' as');
                }
            }
            // first checking is for eq tablename.column name
            // second checking there is already prefixed table name in the column name
            // this will work on the first table sorting - checked by the draw parameters
            // in future sorting user must sort like he want and the duedates won't be always last
			if ((in_array($sTable . '.' . $columnName, $dueDateColumns) || in_array($columnName, $dueDateColumns)) ) {
                $sOrder .= $columnName . ' IS NULL ' . $dir . ', ' . $columnName;
            }else {
				$sOrder .=  $columnName;
			}
            $sOrder .= ' ' . $dir . ', ';
        }
        if (trim($sOrder) == 'ORDER BY') {
            $sOrder = '';
        }
        $sOrder = rtrim($sOrder, ', ');
        // if(!empty($extra_orderby)){
        //     $sOrder .= " , ".$extra_orderby;
        // }
    }

    /*
     * Filtering
     * NOTE this does not match the built-in DataTables filtering which does it
     * word by word on any field. It's possible to do here, but concerned about efficiency
     * on very large tables, and MySQL's regex functionality is very limited
     */
    $sWhere = '';
    $having = "";
    if ((isset($__post['search'])) && $__post['search']['value'] != '') {
        $search_value = $__post['search']['value'];
        $search_value = trim($search_value);
        $sWhere       = ' (';
        for ($i = 0; $i < count($aColumns); $i++) {
            $columnName = $aColumns[$i];
            if (strpos($columnName, ' as ') !== false || strpos($columnName, ' AS ') !== false) {
                if(strpos($columnName, 'SELECT ') !== false){
                    if(!empty($search_value)){
                        $having = strafter($columnName, ') as ')." LIKE '%" . $search_value . "%' ";
                    }
                }else{
                    $columnName = strbefore($columnName, ' as');
                }
            }
            
            if (stripos($columnName, 'AVG(') !== false || stripos($columnName, 'SUM(') !== false) {
            } else {
                if (isset($__post['columns'][$i]) && $__post['columns'][$i]['searchable'] == 'true') {
                    if(isset($searchAs[$i])) {
                        $columnName = $searchAs[$i];
                    }
                    if($having==""){
                        $sWhere .= 'convert(' . $columnName . ' USING utf8)' . " LIKE '%" . $search_value . "%' OR ";
                    }
                }
            }
        }
        
        if (count($additionalSelect) > 0) {
            foreach ($additionalSelect as $searchAdditionalField) {
                if (strpos($searchAdditionalField, ' as ') !== false) {
                    $searchAdditionalField = strbefore($searchAdditionalField, ' as');
                }
                if (stripos($columnName, 'AVG(') !== false || stripos($columnName, 'SUM(') !== false) {
                } else {
                    // Use index
                    $sWhere .= 'convert(' . $searchAdditionalField . ' USING utf8)' . " LIKE '" . $search_value . "%' OR ";
                }
            }
        }
        $sWhere = substr_replace($sWhere, '', -3);
        $sWhere .= ')';
    } else {
        // Check for custom filtering
        $searchFound = 0;
        $sWhere      = ' (';
        for ($i = 0; $i < count($aColumns); $i++) {
            if (isset($__post['columns'][$i]) && $__post['columns'][$i]['searchable'] == 'true') {
                $search_value = $__post['columns'][$i]['search']['value'];

                $columnName = $aColumns[$i];
                if (strpos($columnName, ' as ') !== false || strpos($columnName, ' AS ') !== false) {
                    if(strpos($columnName, 'SELECT ') !== false){
                        if(!empty($search_value)){
                            $having = strafter($columnName, ') as ')." LIKE '%" . $search_value . "%' ";
                        }
                    }else{
                        $columnName = strbefore($columnName, ' as');
                    }
                }
                if ($search_value != '') {
                    if($having==""){
                        $sWhere .= 'convert(' . $columnName . ' USING utf8)' . " LIKE '%" . $search_value . "%' OR ";
                        if (count($additionalSelect) > 0) {
                            foreach ($additionalSelect as $searchAdditionalField) {
                                $sWhere .= 'convert(' . $searchAdditionalField . ' USING utf8)' . " LIKE '" . $search_value . "%' OR ";
                            }
                        }
                        $searchFound++;
                    }
                }
            }
        }
        if ($searchFound > 0) {
            $sWhere = substr_replace($sWhere, '', -3);
            $sWhere .= ')';
        } else {
            $sWhere = '';
        }
    }

    /*
     * SQL queries
     * Get data to display
     */
    $_additionalSelect = '';
    if (count($additionalSelect) > 0) {
        $_additionalSelect = ',' . implode(',', $additionalSelect);
    }
    $where = implode(' ', $where);

    if ($sWhere == '') {
        $where = trim($where);
        if (_startsWith($where, 'AND') || _startsWith($where, 'OR')) {
            if (_startsWith($where, 'OR')) {
                $where = substr($where, 2);
            } else {
                $where = substr($where, 3);
            }
            $where = 'WHERE ' . $where;
        }
    }

    $join = implode(' ', $join);

    $sHaving = "";
    if(!empty($having)){
        if(!empty($sGroupBy) && (strpos($sGroupBy, 'having') !== false || strpos($sGroupBy, 'HAVING') !== false)){
            $sHaving = " AND " . $having;
        }else{
            $sHaving = " HAVING " . $having;
        }
    }

    $sQuery = '
    SELECT SQL_CALC_FOUND_ROWS ' . str_replace(' , ', ' ', implode(', ', $_aColumns)) . ' ' . $_additionalSelect . "
    FROM $sTable
    " . $join . "
    ".(!empty($sWhere) || !empty($where) ? ' WHERE ': '')."
    $sWhere
    ".(!empty($sWhere) ? ' AND ': '')."
    " . $where . "
    $sGroupBy
    $sHaving
    $sOrder
    $sLimit
    ";

    // echo "<pre>"; print_r($sQuery); exit();

	$CI->db->query('SET SQL_BIG_SELECTS=1');
    $rResult = $CI->db->query($sQuery)->result_array();

    /*$hookData = do_action('datatables_sql_query_results', [
        'results' => $rResult,
        'table'   => $sTable,
        'limit'   => $sLimit,
        'order'   => $sOrder,
    ]);*/

//    $rResult = $hookData['results'];

    /* Data set length after filtering */
    $sQuery = '
    SELECT FOUND_ROWS()
    ';
    $_query         = $CI->db->query($sQuery)->result_array();
    $iFilteredTotal = $_query[0]['FOUND_ROWS()'];
    if (_startsWith($where, 'AND')) {
        $where = 'WHERE ' . substr($where, 3);
    }
    /* Total data set length */
    $sQuery = '
    SELECT COUNT(' . $sTable . '.' . $sIndexColumn . ")
    FROM $sTable " . $join . ' '.(!empty($sWhere) || !empty($where) ? ' WHERE ': '').' ' . $where;
    $_query = $CI->db->query($sQuery)->result_array();
    $iTotal =!empty($_query) ? $_query[0]['COUNT(' . $sTable . '.' . $sIndexColumn . ')']:'0';
    /*
     * Output
     */
    $output = [
        'draw'                 => $__post['draw'] ? intval($__post['draw']) : 0,
        'iTotalRecords'        => $iTotal,
        'iTotalDisplayRecords' => $iFilteredTotal,
        'aaData'               => [],
        ];

    return [
        'rResult' => $rResult,
        'output'  => $output,
        ];
}


/**
 * Render table used for datatables
 * @param  array  $headings           [description]
 * @param  string $class              table class / added prefix table-$class
 * @param  array  $additional_classes
 * @return string                     formatted table
 */
/**
 * Render table used for datatables
 * @param  array   $headings
 * @param  string  $class              table class / add prefix eq.table-$class
 * @param  array   $additional_classes additional table classes
 * @param  array   $table_attributes   table attributes
 * @param  boolean $tfoot              includes blank tfoot
 * @return string
 */
function render_datatable($headings = [], $class = '', $additional_classes = [''], $table_attributes = [])
{
    $_additional_classes = '';
    $_table_attributes   = ' ';
    if (count($additional_classes) > 0) {
        $_additional_classes = ' ' . implode(' ', $additional_classes);
    }
    $CI      = & get_instance();
    $IEfix   = '';

    foreach ($table_attributes as $key => $val) {
        $_table_attributes .= $key . '=' . '"' . $val . '" ';
    }
    $table = '<table' . $_table_attributes . 'class="table table-bordered table-hover table-checkable table-' . $class . '' . $_additional_classes . '">';
    $table .= '<thead>';
    $table .= '<tr>';
    foreach ($headings as $heading) {
        if (!is_array($heading)) {
            $table .= '<th>' . $heading . '</th>';
        } else {
            $th_attrs = '';
            if (isset($heading['th_attrs'])) {
                foreach ($heading['th_attrs'] as $key => $val) {
                    $th_attrs .= $key . '=' . '"' . $val . '" ';
                }
            }
            $th_attrs = ($th_attrs != '' ? ' ' . $th_attrs : $th_attrs);
            $table .= '<th' . $th_attrs . '>' . $heading['name'] . '</th>';
        }
    }
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody></tbody>';
    $table .= '</table>';
    echo $table;
}

/**
 * Translated datatables language based on app languages
 * This feature is used on both admin and customer area
 * @return array
 */
function get_datatables_language_array()
{
    $lang = [
        'emptyTable'        => preg_replace("/{(\d+)}/", 'dt_entries', 'dt_empty_table'),
        'info'              => preg_replace("/{(\d+)}/", 'dt_entries', 'dt_info'),
        'infoEmpty'         => preg_replace("/{(\d+)}/", 'dt_entries', 'dt_info_empty'),
        'infoFiltered'      => preg_replace("/{(\d+)}/", 'dt_entries', 'dt_info_filtered'),
        'lengthMenu'        => '_MENU_',
        'loadingRecords'    => 'dt_loading_records',
        'processing'        => '<div class="dt-loader"></div>',
        'search'            => '<div class="input-group"><span class="input-group-addon"><span class="fa fa-search"></span></span>',
        'searchPlaceholder' => 'dt_search',
        'zeroRecords'       => 'dt_zero_records',
        'paginate'          => [
            'first'    => 'dt_paginate_first',
            'last'     => 'dt_paginate_last',
            'next'     => 'dt_paginate_next',
            'previous' => 'dt_paginate_previous'
			,
        ],
        'aria' => [
            'sortAscending'  => 'dt_sort_ascending',
            'sortDescending' => 'dt_sort_descending',
        ],
    ];

    return $lang;
}

/**
 * Function that will parse filters for datatables and will return based on a couple conditions.
 * The returned result will be pushed inside the $where variable in the table SQL
 * @param  array $filter
 * @return string
 */
function prepare_dt_filter($filter)
{
    $filter = implode(' ', $filter);
    if (_startsWith($filter, 'AND')) {
        $filter = substr($filter, 3);
    } elseif (_startsWith($filter, 'OR')) {
        $filter = substr($filter, 2);
    }

    return $filter;
}
