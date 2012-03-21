<?php
// $Id: statspro_tools.inc,v 1.1.2.1 2010/06/10 17:53:48 rsevero Exp $

/**
 * @file
 *   Include file for tools page
 *
 */

function statspro_tools() {
  $form = array();

  $form['intro'] = array(
    '#type' => 'markup',
    '#value' => '<div>' . t('On this page you find useful tools for Statistics maintenance.') . '</div>',
  );

  $form['cron_call_wrapper'] = array(
    '#type' => 'fieldset',
    '#title' => t('Manual cron call'),
  );
  $form['cron_call_wrapper']['intro_cron_call'] = array(
    '#type' => 'markup',
    '#value' => '<div>' . t('Call a cron job run to generate up to date statistics.') . '</div>',
  );
  $form['cron_call_wrapper']['cron_call'] = array(
    '#type' => 'submit',
    '#value' => t('Call cron')
  );

  $form['reset_stats_wrapper'] = array(
    '#type' => 'fieldset',
    '#title' => t('Reset data'),
  );
  $form['reset_stats_wrapper']['intro_reset_stats'] = array(
    '#type' => 'markup',
    '#value' => '<div>' . t('Clear all Statistics Pro tables.') . '</div>',
  );
  $form['reset_stats_wrapper']['reset_stats'] = array(
    '#type' => 'submit',
    '#value' => t('Reset'),
  );

  return $form;
}

function statspro_tools_submit($form, &$form_state) {
  switch ($form_state['values']['op']) {
    case t('Call cron'):
      drupal_set_message(t('Cron run called.'));
      drupal_goto('admin/reports/status/run-cron');
      break;

    case t('Reset'):
      drupal_set_message(t('Statistics Pro data cleared.'));
      statspro_reset_stats();
      break;
  }
}
