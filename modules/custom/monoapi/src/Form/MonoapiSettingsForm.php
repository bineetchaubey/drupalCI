<?php

namespace Drupal\monoapi\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Monoapi settings for this site.
 */
class MonoapiSettingsForm extends ConfigFormBase {
    /** @var string Config settings */
  const SETTINGS = 'monoapi.settings';

  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'monoapi_admin_settings';
  }

  /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /** 
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);

    $form['example_thing'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Things'),
      '#default_value' => $config->get('example_thing'),
    ];  

    $form['other_things'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Other things'),
      '#default_value' => $config->get('other_things'),
    ]; 
    
    $form['api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('API key'),
      '#default_value' => $config->get('api_key'),
    ]; 
     

    return parent::buildForm($form, $form_state);
  }

  /** 
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
      // Retrieve the configuration
       $this->configFactory->getEditable(static::SETTINGS)
      // Set the submitted configuration setting
      ->set('example_thing', $form_state->getValue('example_thing'))
      // You can set multiple configurations at once by making
      // multiple calls to set()
      ->set('other_things', $form_state->getValue('other_things'))
      ->set('api_key', $form_state->getValue('api_key'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
