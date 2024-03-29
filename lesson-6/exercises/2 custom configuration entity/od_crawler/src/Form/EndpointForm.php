<?php

namespace Drupal\od_crawler\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class EndpointForm.
 */
class EndpointForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $endpoint = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $endpoint->label(),
      '#description' => $this->t("Label for the Crawler endpoint."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $endpoint->id(),
      '#machine_name' => [
        'exists' => '\Drupal\od_crawler\Entity\Endpoint::load',
      ],
      '#disabled' => !$endpoint->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $endpoint = $this->entity;
    $status = $endpoint->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Crawler endpoint.', [
          '%label' => $endpoint->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Crawler endpoint.', [
          '%label' => $endpoint->label(),
        ]));
    }
    $form_state->setRedirectUrl($endpoint->toUrl('collection'));
  }

}
