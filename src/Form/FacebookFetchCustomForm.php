<?php

namespace Drupal\facebook_fetch_custom\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class FacebookFetchCustomForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'facebook_fetch_custom_form';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Form constructor.
    $form = parent::buildForm($form, $form_state);
    // Default settings.
    $config = $this->config('facebook_fetch_custom.settings');
    // Page title field.
    $form['appId'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('YOUR APP ID:'),
      '#default_value' => $config->get('facebook_fetch_custom.appId'),
      '#description' => $this->t('Facebook app page ID.'),
    );

    $form['secret'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('YOUR APP SECRET:'),
      '#default_value' => $config->get('facebook_fetch_custom.secret'),
      '#description' => $this->t('Facebook app page secret.'),
    );

    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('facebook_fetch_custom.settings');
    $config->set('facebook_fetch_custom.secret', $form_state->getValue('secret'));
    $config->set('facebook_fetch_custom.appId', $form_state->getValue('appId'));
    $config->save();
    return parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'facebook_fetch_custom.settings',
    ];
  }

}