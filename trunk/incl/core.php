<?php

/**
 * @author BAKKBONE Australia
 * @package PgfCore
 * @license
**/

defined("PGF_EXEC") or die("Silence is golden");

GFForms::include_feed_addon_framework();
 
class PGF extends GFFeedAddOn {
 
    protected $_version = PGF_VERSION;
    protected $_min_gravityforms_version = '2.5';
    protected $_slug = 'pgf';
    protected $_path = 'relay-sender-petals-exchange-for-gravity-forms/relay-sender-petals-exchange-for-gravity-forms.php';
    protected $_full_path = __FILE__;
    protected $_title = PGF_TITLE;
    protected $_short_title = PGF_TITLE_SHORT;
 
    private static $_instance = null;
 
    public static function get_instance() {
        if ( self::$_instance == null ) {
            self::$_instance = new PGF();
        }
 
        return self::$_instance;
    }
 
	public function init() {
		parent::init();
	}
	
	public function minimum_requirements(){
		return array(
			'wordpress'	=>	array(
				'version'	=>	'6.0'
			),
			'php'		=>	array(
				'version'	=>	'7.4'
			)
		);
	}
	
	public function plugin_settings_fields() {
		return array(
			array(
				'title'  => esc_html( PGF_SETTINGS_TITLE ),
				'fields' => array(
					array(
						'name'              => 'memberid',
						'label'             => esc_html( PGF_MID ),
						'type'              => 'text',
						'input_type'		=> 'number',
						'class'             => 'small',
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					),
					array(
						'name'              => 'password',
						'label'             => esc_html( PGF_PASSWORD ),
						'type'              => 'text',
						'input_type'		=> 'password',
						'class'             => 'small',
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					)
				)
			)
		);
	}
	
	public function process_feed( $feed, $entry, $form ) {
		$feedName  = $feed['meta']['feedName'];

		// Retrieve the name => value pairs for all fields mapped in the 'mappedFields' field map.
		$field_map = $this->get_field_map_fields( $feed, 'mappedFields' );

		// Loop through the fields from the field map setting building an array of values to be passed to the third-party service.
		$merge_vars = array();
		foreach ( $field_map as $name => $field_id ) {

			// Get the field value for the specified field id
			$merge_vars[ $name ] = $this->get_field_value( $form, $entry, $field_id );

		}

		// Send the order to Petals.
		$url = 'http://www.petalsnetwork.com/wconnect/wc.isa?pbo~&ctype=34&';
		
		$sendid = $merge_vars['sendid'] == '' ? '' : '<sendid>'.$merge_vars['sendid'].'</sendid>'."\n";
		$recipient = $merge_vars['recipient'] == '' ? '' : '<recipient>'.$merge_vars['recipient'].'</recipient>'."\n";
		$surname = $merge_vars['surname'] == '' ? '' : '<surname>'.$merge_vars['surname'].'</surname>'."\n";
		$address = $merge_vars['address'] == '' ? '' : '<address>'.$merge_vars['address'].'</address>'."\n";
		$town = $merge_vars['town'] == '' ? '' : '<town>'.$merge_vars['town'].'</town>'."\n";
		$state = $merge_vars['state'] == '' ? '' : '<state>'.$merge_vars['state'].'</state>'."\n";
		$postalcode = $merge_vars['postalcode'] == '' ? '' : '<postalcode>'.$merge_vars['postalcode'].'</postalcode>'."\n";
		$crtyname = $merge_vars['crtyname'] == '' ? '' : '<crtyname>'.$merge_vars['crtyname'].'</crtyname>'."\n";
		$crtycode = $merge_vars['crtycode'] == '' ? '' : '<crtycode>'.$merge_vars['crtycode'].'</crtycode>'."\n";
		$phone = $merge_vars['phone'] == '' ? '' : '<phone>'.$merge_vars['phone'].'</phone>'."\n";
		$description = $merge_vars['description'] == '' ? '' : '<description>'.$merge_vars['description'].'</description>'."\n";
		$message = $merge_vars['message'] == '' ? '' : '<message>'.$merge_vars['message'].'</message>'."\n";
		$comments = $merge_vars['comments'] == '' ? '' : '<comments>'.$merge_vars['comments'].'</comments>'."\n";
		$makeup = $merge_vars['makeup'] == '' ? '' : '<makeup>'.$merge_vars['makeup'].'</makeup>'."\n";
		$deldate = $merge_vars['deldate'] == '' ? '' : '<deldate>'.date("Ymd",strtotime($merge_vars['deldate'])).'</deldate>'."\n";
		$deltime = $merge_vars['deltime'] == '' ? '' : '<deltime>'.$merge_vars['deltime'].'</deltime>'."\n";
		$tvalue = $merge_vars['tvalue'] == '' ? '' : '<tvalue>'.number_format($merge_vars['tvalue'],2,".","").'</tvalue>'."\n";
		$supplier = $merge_vars['supplier'] == '' ? '' : '<supplier>'.$merge_vars['supplier'].'</supplier>'."\n";
		$productid = $merge_vars['productid'] == '' ? '' : '<productid>'.$merge_vars['productid'].'</productid>'."\n";
		$contact_name = $merge_vars['contact_name'] == '' ? '' : '<contact_name>'.$merge_vars['contact_name'].'</contact_name>'."\n";
		$contact_email = $merge_vars['contact_email'] == '' ? '' : '<contact_email>'.$merge_vars['contact_email'].'</contact_email>'."\n";
		$contact_phone = $merge_vars['contact_phone'] == '' ? '' : '<contact_phone>'.$merge_vars['contact_phone'].'</contact_phone>'."\n";
		$addresstype = $merge_vars['addresstype'] == '' ? '' : '<addresstype>'.$merge_vars['addresstype'].'</addresstype>'."\n";
		$occasion = $merge_vars['occasion'] == '' ? '' : '<occasion>'.$merge_vars['occasion'].'</occasion>'."\n";
		$upsell = $merge_vars['upsell'] == '' ? '' : '<upsell>'.$merge_vars['upsell'].'</upsell>'."\n";
		$upsellAmt = $merge_vars['upsellAmt'] == '' ? '' : '<upsellAmt>'.number_format($merge_vars['upsellAmt'],2,".","").'</upsellAmt>'."\n";
		
		$body = '<?xml version="1.0" encoding="UTF-8"?>'."\n".'<order>'."\n".$sendid.$recipient.$surname.$address.$town.$state.$postalcode.$crtyname.$crtycode.$phone.$description.$message.$comments.$makeup.$deldate.$deltime.$tvalue.$supplier.$productid.$contact_name.$contact_email.$contact_phone.$addresstype.$occasion.$upsell.$upsellAmt.'</order>';
		
		$response = wp_remote_post($url, array(
            'method'    => 'POST',
            'headers'   => array('Content-Type' => 'application/xml'),
            'body'      => $body
        ));
		
        $rawxml = $response['body'];
        $xml = simplexml_load_string($rawxml);
        $symbol = ': ';
        $xmlarray = json_decode(json_encode((array)$xml), TRUE);
		unset($xmlarray['password']);
        $implosion = implode(", ", array_map( function($k, $v) use($symbol) { return $k . $symbol . $v; }, array_keys($xmlarray), array_values($xmlarray) ) );
		if($xmlarray['type'] == 100){
			$result = $this->add_note( $entry['id'], PGF_TRANSMIT_SUCCESS.' '.$implosion, 'success' );
		} else {
			$result = $this->add_note( $entry['id'], PGF_TRANSMIT_FAIL.' '.$implosion, 'error' );
		}
		
	}
	
	public function feed_settings_fields() {
		return array(
			array(
				'title'  => esc_html( PGF_FEED_TITLE ),
				'fields' => array(
					array(
						'label'   => esc_html(PGF_FEED_NAME),
						'type'    => 'text',
						'name'    => 'feedName',
						'class'   => 'small',
					),
					array(
						'name'      => 'mappedFields',
						'label'     => esc_html(PGF_MAP_FIELDS),
						'type'      => 'field_map',
						'tooltip'	=> PGF_MAP_FIELDS_TOOLTIP,
						'field_map' => array(
							array(
								'name'		=> 'sendid',
								'label'		=> PGF_FIELD_SENDID,
								'required'	=> 1,
								'field_type'=> array('text','number','hidden'),
								'tooltip'	=> PGF_FIELD_SENDID_TOOLTIP,
							),
							array(
								'name'		=> 'recipient',
								'label'		=> PGF_FIELD_RECIPIENT,
								'required'	=> 1,
								'field_type'=> array('text','name','hidden'),
								'tooltip'	=> PGF_FIELD_RECIPIENT_TOOLTIP,
							),
							array(
								'name'		=> 'surname',
								'label'		=> PGF_FIELD_SURNAME,
								'required'	=> 1,
								'field_type'=> array('text','name','hidden'),
								'tooltip'	=> PGF_FIELD_SURNAME_TOOLTIP,
							),
							array(
								'name'		=> 'address',
								'label'		=> PGF_FIELD_ADDRESS,
								'required'	=> 1,
								'field_type'=> array('text','address','textarea','hidden'),
								'tooltip'	=> PGF_FIELD_ADDRESS_TOOLTIP,
							),
							array(
								'name'		=> 'town',
								'label'		=> PGF_FIELD_TOWN,
								'required'	=> 1,
								'field_type'=> array('text','address','select','hidden'),
								'tooltip'	=> PGF_FIELD_TOWN_TOOLTIP,
							),
							array(
								'name'		=> 'state',
								'label'		=> PGF_FIELD_STATE,
								'required'	=> 0,
								'field_type'=> array('text','address','select','hidden'),
								'tooltip'	=> PGF_FIELD_STATE_TOOLTIP,
							),
							array(
								'name'		=> 'postalcode',
								'label'		=> PGF_FIELD_POSTALCODE,
								'required'	=> 1,
								'field_type'=> array('text','address','number','hidden'),
								'tooltip'	=> PGF_FIELD_POSTALCODE_TOOLTIP,
							),
							array(
								'name'		=> 'crtyname',
								'label'		=> PGF_FIELD_CRTYNAME,
								'required'	=> 1,
								'field_type'=> array('text','address','select','radio','hidden'),
								'tooltip'	=> PGF_FIELD_CRTYNAME_TOOLTIP,
							),
							array(
								'name'		=> 'crtycode',
								'label'		=> PGF_FIELD_CRTYCODE,
								'required'	=> 1,
								'field_type'=> array('text','select','radio','hidden'),
								'tooltip'	=> PGF_FIELD_CRTYCODE_TOOLTIP,
							),
							array(
								'name'		=> 'phone',
								'label'		=> PGF_FIELD_PHONE,
								'required'	=> 1,
								'field_type'=> array('text','number','phone','hidden'),
								'tooltip'	=> PGF_FIELD_PHONE_TOOLTIP,
							),
							array(
								'name'		=> 'description',
								'label'		=> PGF_FIELD_DESCRIPTION,
								'required'	=> 1,
								'field_type'=> array('text','textarea','hidden'),
								'tooltip'	=> PGF_FIELD_DESCRIPTION_TOOLTIP,
							),
							array(
								'name'		=> 'message',
								'label'		=> PGF_FIELD_MESSAGE,
								'required'	=> 1,
								'field_type'=> array('text','textarea','hidden'),
								'tooltip'	=> PGF_FIELD_MESSAGE_TOOLTIP,
							),
							array(
								'name'		=> 'comments',
								'label'		=> PGF_FIELD_COMMENTS,
								'required'	=> 0,
								'field_type'=> array('text','textarea','hidden'),
								'tooltip'	=> PGF_FIELD_COMMENTS_TOOLTIP,
							),
							array(
								'name'		=> 'makeup',
								'label'		=> PGF_FIELD_MAKEUP,
								'required'	=> 0,
								'field_type'=> array('text','textarea','hidden'),
								'tooltip'	=> PGF_FIELD_MAKEUP_TOOLTIP,
							),
							array(
								'name'		=> 'deldate',
								'label'		=> PGF_FIELD_DELDATE,
								'required'	=> 1,
								'field_type'=> array('text','date','hidden'),
								'tooltip'	=> PGF_FIELD_DELDATE_TOOLTIP,
							),
							array(
								'name'		=> 'deltime',
								'label'		=> PGF_FIELD_DELTIME,
								'required'	=> 0,
								'field_type'=> array('text','time','hidden'),
								'tooltip'	=> PGF_FIELD_DELTIME_TOOLTIP,
							),
							array(
								'name'		=> 'tvalue',
								'label'		=> PGF_FIELD_TVALUE,
								'required'	=> 1,
								'field_type'=> array('text','number','total','product','hidden'),
								'tooltip'	=> PGF_FIELD_TVALUE_TOOLTIP,
							),
							array(
								'name'		=> 'supplier',
								'label'		=> PGF_FIELD_SUPPLIER,
								'required'	=> 0,
								'field_type'=> array('text','number','hidden'),
								'tooltip'	=> PGF_FIELD_SUPPLIER_TOOLTIP,
							),
							array(
								'name'		=> 'productid',
								'label'		=> PGF_FIELD_PRODUCTID,
								'required'	=> 0,
								'field_type'=> array('text','number','hidden'),
								'tooltip'	=> PGF_FIELD_PRODUCTID_TOOLTIP,
							),
							array(
								'name'		=> 'contact_name',
								'label'		=> PGF_FIELD_CONTACT_NAME,
								'required'	=> 0,
								'field_type'=> array('text','name','hidden'),
								'tooltip'	=> PGF_FIELD_CONTACT_NAME_TOOLTIP,
							),
							array(
								'name'		=> 'contact_email',
								'label'		=> PGF_FIELD_CONTACT_EMAIL,
								'required'	=> 0,
								'field_type'=> array('text','email','hidden'),
								'tooltip'	=> PGF_FIELD_CONTACT_EMAIL_TOOLTIP,
							),
							array(
								'name'		=> 'contact_phone',
								'label'		=> PGF_FIELD_CONTACT_PHONE,
								'required'	=> 0,
								'field_type'=> array('text','number','phone','hidden'),
								'tooltip'	=> PGF_FIELD_CONTACT_PHONE_TOOLTIP,
							),
							array(
								'name'		=> 'addresstype',
								'label'		=> PGF_FIELD_ADDRESSTYPE,
								'required'	=> 0,
								'field_type'=> array('text','select','radio','hidden'),
								'tooltip'	=> PGF_FIELD_ADDRESSTYPE_TOOLTIP,
							),
							array(
								'name'		=> 'occasion',
								'label'		=> PGF_FIELD_OCCASION,
								'required'	=> 0,
								'field_type'=> array('text','select','radio','hidden'),
								'tooltip'	=> PGF_FIELD_OCCASION_TOOLTIP,
							),
							array(
								'name'		=> 'upsell',
								'label'		=> PGF_FIELD_UPSELL,
								'required'	=> 0,
								'field_type'=> array('text','select','radio','product','option','hidden'),
								'tooltip'	=> PGF_FIELD_UPSELL_TOOLTIP,
							),
							array(
								'name'		=> 'upsellAmt',
								'label'		=> PGF_FIELD_UPSELLAMT,
								'required'	=> 0,
								'field_type'=> array('text','number','product','option','total','hidden'),
								'tooltip'	=> PGF_FIELD_UPSELLAMT_TOOLTIP,
							)
						)
					),
					array(
						'name'           => 'condition',
						'label'          => esc_html(PGF_CL_TITLE),
						'type'           => 'feed_condition',
						'checkbox_label' => esc_html(PGF_CL_CHECK),
						'instructions'   => esc_html(PGF_CL_INSTRUCT)
					),
				),
			),
		);
	}

	public function feed_list_columns() {
		return array(
			'feedName'  => esc_html(PGF_FEED_NAME),
		);
	}
	
}