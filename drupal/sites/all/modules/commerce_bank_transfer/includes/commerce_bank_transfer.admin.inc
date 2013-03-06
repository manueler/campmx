<?php

/**
 * @file
 * Administrative forms for the Commerce Bank Transfer module.
 */


/**
 * Form callback: allows the user to confirm an "offline" bank transfer
 */
function commerce_bank_transfer_confirm_form($form, &$form_state, $order, $transaction) {
  $form_state['order'] = $order;
  $form_state['transaction'] = $transaction;

  // Load and store the payment method instance for this transaction.
  $payment_method = commerce_payment_method_instance_load($transaction->instance_id);
  $form_state['payment_method'] = $payment_method;

  $balance = commerce_payment_order_balance($order);

  if ($balance['amount'] > 0 && $balance['amount'] < $transaction->amount) {
    $default_amount = $balance['amount'];
  }
  else {
    $default_amount = $transaction->amount;
  }

  // Convert the price amount to a user friendly decimal value.
  $default_amount = commerce_currency_amount_to_decimal($default_amount, $transaction->currency_code);

  $description = implode('<br />', array(
    t('Order balance: @balance', array('@balance' => commerce_currency_format($balance['amount'], $balance['currency_code']))),
  ));

  $form['amount'] = array(
    '#type' => 'textfield',
    '#title' => t('Confirm bank transfer amount'),
    '#description' => $description,
    '#default_value' => $default_amount,
    '#field_suffix' => check_plain($transaction->currency_code),
    '#size' => 16,
  );

  $form = confirm_form($form,
    t('What amount do you want to confirm?'),
    'admin/commerce/orders/' . $order->order_id . '/payment',
    '',
    t('Confirm'),
    t('Cancel'),
    'confirm'
  );

  return $form;
}

/**
 * Validate handler: ensure a valid amount is given.
 */
function commerce_bank_transfer_confirm_form_validate($form, &$form_state) {
  $transaction = $form_state['transaction'];
  $amount = $form_state['values']['amount'];

  // Ensure a positive numeric amount has been entered for capture.
  if (!is_numeric($amount) || $amount <= 0) {
    form_set_error('amount', t('You must specify a positive numeric amount to capture.'));
  }

  // Ensure the amount is less than or equal to the transaction amount.
  if ($amount > commerce_currency_amount_to_decimal($transaction->amount, $transaction->currency_code)) {
    form_set_error('amount', t('You cannot confirm more than transaction amount.'));
  }
}

/**
 * Submit handler: confirm the "offline" payment
 */
function commerce_bank_transfer_confirm_form_submit($form, &$form_state) {
  $transaction = $form_state['transaction'];
  $amount = $form_state['values']['amount'];


  // Update the transaction amount to the actual confirmed amount.
  $transaction->amount = commerce_currency_decimal_to_amount($amount, $transaction->currency_code);

  $transaction->status = COMMERCE_PAYMENT_STATUS_SUCCESS;

  // Append a confirmed indication to the result message.
  $transaction->message .= '<br />' . t('Confirmed: @date', array('@date' => format_date(REQUEST_TIME, 'short')));

  commerce_payment_transaction_save($transaction);
  drupal_set_message(t('Payment confirmed successfully.'));

  $form_state['redirect'] = 'admin/commerce/orders/' . $form_state['order']->order_id . '/payment';
}
