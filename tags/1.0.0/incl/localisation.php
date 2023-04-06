<?php

/**
 * @author BAKKBONE Australia
 * @package PgfLocalisation
 * @license GNU General Public License (GPL) 3.0
**/

defined("PGF_EXEC") or die("Silence is golden");

define('PGF_TITLE', __('Relay Sender - Petals Exchange for Gravity Forms', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_TITLE_SHORT', __('Petals Exchange', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_SETTINGS_TITLE', __('Petals Exchange Settings', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FEED_TITLE', __('Petals Exchange Feed', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_MID', __('Petals Member Number', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_PASSWORD', __('Petals Exchange Password', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_SETTINGS_SHORT', __('Settings', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_HELP_TITLE', __('Documentation', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FEED_NAME', __('Feed Name', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_MAP_FIELDS', __('Map Fields', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_MAP_FIELDS_TOOLTIP', __('Link form fields to Petals API fields. See documentation <a href="https://www.petals-exchange.com/relay/transmission/ufo.htm" target="_blank">here</a>.', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_CL_TITLE', __('Conditional Logic', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_CL_CHECK', __('Enable Conditional Logic', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_CL_INSTRUCT', __('Transmit this order to Petals if', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_SENDID', __('Order Number', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_RECIPIENT', __('Recipient\'s Name', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_SURNAME', __('Recipient\'s Surname', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_ADDRESS', __('Street Address', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_TOWN', __('Town/City', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_STATE', __('State/Province', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_POSTALCODE', __('Postal Code', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_CRTYNAME', __('Country', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_CRTYCODE', __('Country Code', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_PHONE', __('Recipient\'s Phone', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_DESCRIPTION', __('Description', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_MESSAGE', __('Card Message', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_COMMENTS', __('Comments', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_MAKEUP', __('Makeup', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_DELDATE', __('Delivery Date', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_DELTIME', __('Delivery Time', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_TVALUE', __('Total Order Value', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_SUPPLIER', __('Designated Executing Florist', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_PRODUCTID', __('Petals Product ID', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_CONTACT_NAME', __('Customer Name', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_CONTACT_EMAIL', __('Customer Email', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_CONTACT_PHONE', __('Customer Phone', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_ADDRESSTYPE', __('Address Type', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_OCCASION', __('Occasion', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_UPSELL', __('Add-Ons', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_UPSELLAMT', __('Add-Ons Value', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_SENDID_TOOLTIP', __('<strong>MAX 6 CHARS</strong>
An order reference of up to 6 digits. Orders with duplicate or missing numbers, or numbers longer than 6 digits, will be rejected by Petals.', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_RECIPIENT_TOOLTIP', __('<strong>MAX 60 CHARS</strong>
Name of person receiving flowers', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_SURNAME_TOOLTIP', __('<strong>MAX 8 CHARS</strong>
Recipient\'s surname - first 8 characters', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_ADDRESS_TOOLTIP', __('<strong>MAX 100 CHARS</strong>', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_TOWN_TOOLTIP', __('<strong>MAX 30 CHARS</strong>', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_STATE_TOOLTIP', __('<strong>MAX 10 CHARS</strong>', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_POSTALCODE_TOOLTIP', __('<strong>MAX 15 CHARS</strong>', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_CRTYNAME_TOOLTIP', __('<strong>MAX 30 CHARS</strong>
Country in words', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_CRTYCODE_TOOLTIP', __('ISO 2 character code system for the country (e.g. AU, NZ, GB)', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_PHONE_TOOLTIP', __('<strong>MAX 25 CHARS</strong>
It is strongly recommended that you seek and provide contact numbers for recipients to reduce delivery problems. Be advised that some partners in some countries will not deliver without a telephone number.', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_DESCRIPTION_TOOLTIP', __('<strong>MAX 100 CHARS</strong>
Order description in words. This field should contain sufficient info to supply the order. For example; 6 red roses bouquet, paper wrapped plus bottle of sparkling wine. Additional information on make-up can be supplied in the make-up field. Special delivery and and other special instructions can be added to the comments field. Not all partners are able to pass on some or all of the make-up and comments fields due to legacy systems so please keep the material in these fields to the minimum.', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_MESSAGE_TOOLTIP', __('<strong>MAX 200 CHARS</strong>', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_COMMENTS_TOOLTIP', __('<strong>MAX 250 CHARS</strong>
Any comments, delivery notes, or special instructions', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_MAKEUP_TOOLTIP', __('<strong>MAX 200 CHARS</strong>
Provide optional information on how to make up the order. Note that this is only a guide. Petals Partners do not guarantee specific make-ups unless directly agreed between the Partners.', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_DELTIME_TOOLTIP', __('<strong>MAX 20 CHARS</strong>
Optional: text notes - e.g. am / pm, funeral time', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_TVALUE_TOOLTIP', __('<strong>MAX 6 CHARS</strong>
Total value of the order in the currency Petals has you registered to send and receive orders in. Format is $$$.¢¢, eg. 123.00 - must include the cents.', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_SUPPLIER_TOOLTIP', __('<strong>MAX 5 CHARS</strong>
Member number of the supplying florist. Normally this will be provided by Petals when it chooses a florist to supply the order. However, if you have a preference, you can insert a valid Petals member number in this field.', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_PRODUCTID_TOOLTIP', __('<strong>MAX 10 CHARS</strong>
The Petals product ID. Please refer to the pricing guide for product IDs and descriptions.', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_CONTACT_NAME_TOOLTIP', __('<strong>MAX 30 CHARS</strong>
Purchaser or other contact person\'s name for the sell side of this order. (Optional, but needed if Petals might need to contact the purchaser)', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_CONTACT_EMAIL_TOOLTIP', __('<strong>MAX 65 CHARS</strong>
Purchaser or other contact person\'s email for the sell side of this order. (Optional, but needed if Petals might need to contact the purchaser)', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_CONTACT_PHONE_TOOLTIP', __('<strong>MAX 25 CHARS</strong>
Purchaser or other contact person\'s business hours phone for the sell side of this order. (Optional, but needed if Petals might need to contact the purchaser)', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_ADDRESSTYPE_TOOLTIP', __('<strong>MAX 15 CHARS</strong>
Should be the ""location"" part of the address, ie. Home/Business/Hospital/Church etc', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_OCCASION_TOOLTIP', __('<strong>MAX 15 CHARS</strong>
Should be the occasion they select with the card message', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_UPSELL_TOOLTIP', __('<strong>MAX 100 CHARS</strong>
This is where you would include any add-ons such as chocolates, balloons etc', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_FIELD_UPSELLAMT_TOOLTIP', __('<strong>MAX 6 CHARS</strong>
This is where you would include the total value of all add ons', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_TRANSMIT_SUCCESS', __('Order successfully sent - response from Petals follows.', 'relay-sender-petals-exchange-for-gravity-forms'));
define('PGF_TRANSMIT_FAIL', __('Order NOT successfully sent - response from Petals follows.', 'relay-sender-petals-exchange-for-gravity-forms'));