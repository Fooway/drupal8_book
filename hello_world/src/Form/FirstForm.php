<?php
 
/**
 * @file
 * Contains \Drupal\hello_world\Form\FirstForm.
 */
 
namespace Drupal\hello_world\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
 
class FirstForm extends FormBase {
 
  /**
   *  {@inheritdoc}
   */
  public function getFormId() {
    return 'first_form';
  }
 
  /**
   * {@inheritdoc}
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request object.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Use the Form API to define form elements.
    $form['user_search'] = array(
    '#type' => 'textfield',
    '#title' => '',
    '#autocomplete_route_name' => 'user.autocomplete',
    '#size' => 40,
    '#maxlength' => 60,
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Search'),
    );
    return $form;
  }
 
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // Validate the form values.
    if (preg_match('#[\d]#', $form_state->getValue('author'))) {
      $form_state->setErrorByName('author', $this->t("The author name '%author' is invalid.  You need to submit a name, a name does not contain numbers.", array('%author' => $form_state->getValue('author'))));
      return FALSE;
    }
    else {
      return TRUE;
    }
  }
 
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Do something useful.
    drupal_set_message('thanks for submitting the form!');
  }
 
}
