<?php

/**
 * @file
 * Contains \Drupal\od_pegi\Form\OdPegiSettingsForm.
 */

namespace Drupal\od_pegi\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Displays theme configuration for entire site and individual themes.
 */
class OdPegiSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    // ...
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    // ...
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // ...
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // ...
  }

}
