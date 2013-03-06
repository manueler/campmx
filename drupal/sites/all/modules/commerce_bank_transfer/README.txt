-- INSTALLATION - INVOICE TEMPLATE --

To display the bank details on the invoices you need to do the following:
-> no "official" solution yet - but have a look here: http://drupal.org/project/commerce_pdf_invoice

-- MULTILINGUAL SITES --

Please note the difference between i18n variables and i18n constants !

constants: you can translate them in
-> **/admin/config/regional/translate/translate

variables: you have to translate them on the settings page for each language directly
-> en/admin/commerce/config/payment-methods ..
-> de/admin/commerce/config/payment-methods ..
-> fr/admin/commerce/config/payment-methods ..
-> es/admin/commerce/config/payment-methods ..
-> etc.
