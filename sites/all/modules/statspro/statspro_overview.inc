<?php
// $Id: statspro_overview.inc,v 1.1.2.17 2010/10/29 12:19:34 rsevero Exp $

/**
 * @file
 *   Overview report.
 *
 */

require_once drupal_get_path('module', 'statspro') .'/statspro_settings.inc';

/**
 * Callback function for overview page.
 */
function statspro_overview($period = '', $number_of_days = NULL) {
  require_once drupal_get_path('module', 'statspro') .'/statspro.inc';

  $statspro = new StatsPro();

  $last_run = variable_get('statspro_last_run', 0);
  $updated = $last_run ? format_date($last_run) : t('never');

  $output = t('Last statistics update: @updated', array('@updated' => $updated));

  // add settings form
  $output .= drupal_get_form(
    'statspro_overview_settings_form',
    $period,
    $number_of_days
  );

  if ($last_run) {
    $period_info = statspro_get_period_info(
      $_SESSION['statspro_period_overview'],
      $_SESSION['statspro_custom_number_days_overview']
    );

    ////////////////////////
    // common
    $output .= theme(
      'statspro_content',
      $period_info['period_name'],
      $statspro->get_stats(
        $period_info['period'],
        NULL,
        $statspro->absolute_amounts
      )
    );

    ////////////////////////
    // pi, error and warnings
    $output .= theme(
      'statspro_log',
      $period_info['period_name'],
      $statspro->get_stats(
        $period_info['period'],
        $statspro->absolute_amounts
      )
    );
  }

  return $output;
}

function statspro_overview_settings_form(&$form_state, $period = '', $number_of_days = NULL) {
  set_default_session_values('_overview', $period, $number_of_days);

  $form = statspro_settings_form(
    $_SESSION['statspro_period_overview'],
    $_SESSION['statspro_custom_number_days_overview']
  );

  statspro_include_link_to_advanced_help_pages($form);

  return $form;
}

/**
 * Implementation of hook_modulename_submit() for settings form.
 */
function statspro_overview_settings_form_submit($form, &$form_state) {
  $op = isset($form_state['values']['op']) ? $form_state['values']['op'] : '';
  if ($op == t('Reset to defaults')) {
    unset($_SESSION['statspro_period_overview']);
    unset($_SESSION['statspro_custom_number_days_overview']);
    drupal_set_message(t('The configuration options have been reset to their default values.'));
  }
  else {
    $_SESSION['statspro_period_overview'] = $form_state['values']['statspro_period'];
    if ($form_state['values']['statspro_period'] == 'custom_days') {
      $_SESSION['statspro_custom_number_days_overview'] = $form_state['values']['statspro_custom_number_days'];
    }
    drupal_set_message(t('The configuration options have been saved.'));
  }
}

function theme_statspro_content($period, $data) {
  $output = '<div id="content-area" style="margin-bottom: 30px">';

  if (is_array($data)) {
    if (statspro_get_available_charts_graphs()) {
      $users_data = array_slice($data, 0, 2);
      $output .= statspro_chart_summary(
        t('Users - !period', array('!period' => $period)),
        $users_data
      );
      $output .= "\n<br />\n";
      $nodes_comments_data = array_slice($data, 2, 3);
      $output .= statspro_chart_summary(
        t('Nodes and comments - !period', array('!period' => $period)),
        $nodes_comments_data
      );
    }

    // theme the table
    $header = array(t('Name'), t('Value'));
    $output .= theme('table', $header, $data);
  }
  else {
    $output .= t('No content data available for specified period.');
  }

  $output .= '</div>';

  return $output;
}

function theme_statspro_log($period, $data) {
  $output = '<div id="content-area">';

  if (is_array($data)) {
    if (statspro_get_available_charts_graphs()) {
      $all_users_data = array();
      $all_users_x_labels = array();
      $authenticated_users_data = array();
      $authenticated_users_x_labels = array();
      $odd = TRUE;
      foreach ($data as $serie) {
        if ($odd) {
          $all_users_x_labels[] = strip_tags($serie[0]);
          $all_users_data[] = $serie[1];
        }
        else {
          $authenticated_users_x_labels[] = strip_tags($serie[0]);
          $authenticated_users_data[] = $serie[1];
        }
        $odd = !$odd;
      }
      $all_users_data = array($all_users_data);
      $authenticated_users_data = array($authenticated_users_data);
      $output .= statspro_get_pie_chart(
        t('All users - !period', array('!period' => $period)),
        $all_users_data,
        $all_users_x_labels
      );
      $output .= "\n<br />\n";
      $output .= statspro_get_pie_chart(
        t('Authenticated users - !period', array('!period' => $period)),
        $authenticated_users_data,
        $authenticated_users_x_labels
      );
    }

    // theme the table
    $header = array(t('Name'), t('Value'));
    $output .= theme('table', $header, $data);
  }
  else {
    $output .= t('No access and log files available for specified period.');
  }

  $output .= '</div>';

  return $output;
}

/**
 * General chart function for overview page.
 * 
 * @param <string> $title
 * @param <array> $stats
 * @return <string> 
 */
function statspro_chart_summary($title, $stats) {
  $data = array();
  $x_labels = array();

  foreach ($stats as $result) {
    $data[strip_tags($result[0])] = array($result[1]);
  }

  if (count($data) == 0) {
    return '';
  }
  else {
    return statspro_get_bar_chart($title, $data, array('quantity'), TRUE);
  }
}
