<?php

namespace Drupal\od_webservice\Form;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\od_webservice\HtmlLoader\HtmlLoaderInterface;
use Drupal\od_webservice\HtmlProcessorInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ImportDomElementsForm.
 *
 * @package Drupal\od_webservice\Form
 */
class ImportDomElementsForm extends FormBase {

  /**
   * The HTML loader service.
   *
   * @var \Drupal\od_webservice\HtmlLoader\HtmlLoaderInterface
   */
  protected $htmlLoader;

  /**
   * The HTML processor plugin manager.
   *
   * @var \Drupal\od_webservice\HtmlProcessorManager
   */
  protected $htmlProcessorManager;

  /**
   * The entity manager.
   *
   * @var EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new Dom Elements import form.
   *
   * @param HtmlLoaderInterface $html_loader
   * @param HtmlProcessorInterface $html_processor_manager
   * @param EntityTypeManagerInterface $entity_type_manager
   */
  public function __construct(HtmlLoaderInterface $html_loader, HtmlProcessorInterface $html_processor_manager, EntityTypeManagerInterface $entity_type_manager) {
    $this->htmlLoader = $html_loader;
    $this->htmlProcessorManager = $html_processor_manager;
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('od_webservice.html_loader'),
      $container->get('plugin.manager.html_processor'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'import_dom_elements';
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $build['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Import'),
    ];

    return $build;
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = array();
    // @todo Change architecture. Make service? Use protected function?
    // @todo Redirect to od_webservice.html_client.data?
    /** @var \Drupal\od_webservice\Entity\HtmlClient[] $entities */
    $entities = $this->entityTypeManager->getStorage('html_client')->loadMultiple();
    foreach ($entities as $entity) {

      // Load HTML data from the endpoint.
      try {
        $dom = $this->htmlLoader->loadDom($entity->getEndpointUrl());
      }
      catch (\Exception $e) {
        watchdog_exception('od_webservice', $e);
        drupal_set_message($this->t('Failed to find data at %name.', array('%name' => $entity->label())), 'error');
        break;
      }

      // Execute processor plugins on the HTML data.
      foreach ($entity->getProcessors() as $plugin_id) {
        $result = NULL;

        // Load and execute HTML processor plugin.
        /** @var \Drupal\od_webservice\Plugin\HtmlProcessor\HtmlH1Processor $processor */
        $processor = $this->htmlProcessorManager->createInstance($plugin_id);
        if ($dom = $processor->setDom($dom)) {
          $result = $dom->process();
        }

        if ($result) {
          $key = $processor->getId();
          $values[$key] = $result;
        }
      }

      if ($values) {
        $this->entityTypeManager->getStorage('dom_elements')
          ->create($values)
          ->save();
      }
    }
  }
}
