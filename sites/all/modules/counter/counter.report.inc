<?php
// $Id: counter.report.inc,v 1.2 2009/10/26 04:58:57 thenicespider Exp $
/**
 * @file
 * Report page callback file for the counter module.
 */

/**
 * Menu callback;
 */
function counter_report() {

  $items_per_page = variable_get('counter_report_page_item',50);

  $sql       = "SELECT * FROM {counter} ORDER BY counter_id DESC";
  //$sql_count = db_rewrite_sql('SELECT COUNT(*) FROM {counter}');
  $sql_count = db_query('SELECT COUNT(*) FROM {counter}');

  //$results = pager_query($sql, $items_per_page, 0, $sql_count);
  $results = pager_query($sql, $items_per_page); 

  $rows = array();

  $page = isset($_GET['page']) ? $_GET['page'] : '';
  $i = 0 + ($page  * $items_per_page);

  $header = array(t('#'), t('ID'), t('IP Address'), t('Created Date'), t('Access page'));

  while ( $data = db_fetch_object($results) ) {
    $rows[] = array(
      ++$i,
      $data->counter_id,
      $data->counter_ip,
      $data->counter_date,
      $data->counter_page
    );
  }

  $output  = "";
  $output .= theme('table', $header, $rows);
  $output .= theme('pager', NULL, $items_per_page, 0);

  return $output;
}