<?php
class Person_PhoneType extends PBEnum
{
  const MOBILE  = 0;
  const HOME  = 1;
  const WORK  = 2;

  public function __construct($reader=null)
  {
   	parent::__construct($reader);
 	$this->names = array(
			0 => "MOBILE",
			1 => "HOME",
			2 => "WORK");
   }
}
class Person_PhoneNumber extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    self::$fields["Person_PhoneNumber"]["1"] = "PBString";
    $this->values["1"] = "";
    self::$fieldNames["Person_PhoneNumber"]["1"] = "number";
    self::$fields["Person_PhoneNumber"]["2"] = "Person_PhoneType";
    $this->values["2"] = "";
    $this->values["2"] = new Person_PhoneType();
    $this->values["2"]->value = Person_PhoneType::HOME;
    self::$fieldNames["Person_PhoneNumber"]["2"] = "type";
  }
  function number()
  {
    return $this->_get_value("1");
  }
  function set_number($value)
  {
    return $this->_set_value("1", $value);
  }
  function type()
  {
    return $this->_get_value("2");
  }
  function set_type($value)
  {
    return $this->_set_value("2", $value);
  }
  function type_string()
  {
    return $this->values["2"]->get_description();
  }
}
class Person extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    self::$fields["Person"]["1"] = "PBString";
    $this->values["1"] = "";
    self::$fieldNames["Person"]["1"] = "name";
    self::$fields["Person"]["2"] = "PBInt";
    $this->values["2"] = "";
    self::$fieldNames["Person"]["2"] = "id";
    self::$fields["Person"]["3"] = "PBString";
    $this->values["3"] = "";
    self::$fieldNames["Person"]["3"] = "email";
    self::$fields["Person"]["4"] = "Person_PhoneNumber";
    $this->values["4"] = array();
    self::$fieldNames["Person"]["4"] = "phone";
    self::$fields["Person"]["5"] = "PBString";
    $this->values["5"] = "";
    self::$fieldNames["Person"]["5"] = "surname";
  }
  function name()
  {
    return $this->_get_value("1");
  }
  function set_name($value)
  {
    return $this->_set_value("1", $value);
  }
  function id()
  {
    return $this->_get_value("2");
  }
  function set_id($value)
  {
    return $this->_set_value("2", $value);
  }
  function email()
  {
    return $this->_get_value("3");
  }
  function set_email($value)
  {
    return $this->_set_value("3", $value);
  }
  function phone($offset)
  {
    return $this->_get_arr_value("4", $offset);
  }
  function add_phone()
  {
    return $this->_add_arr_value("4");
  }
  function set_phone($index, $value)
  {
    $this->_set_arr_value("4", $index, $value);
  }
  function set_all_phones($values)
  {
    return $this->_set_arr_values("4", $values);
  }
  function remove_last_phone()
  {
    $this->_remove_last_arr_value("4");
  }
  function phones_size()
  {
    return $this->_get_arr_size("4");
  }
  function get_phones()
  {
    return $this->_get_value("4");
  }
  function surname()
  {
    return $this->_get_value("5");
  }
  function set_surname($value)
  {
    return $this->_set_value("5", $value);
  }
}
class AddressBook extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    self::$fields["AddressBook"]["1"] = "Person";
    $this->values["1"] = array();
    self::$fieldNames["AddressBook"]["1"] = "person";
  }
  function person($offset)
  {
    return $this->_get_arr_value("1", $offset);
  }
  function add_person()
  {
    return $this->_add_arr_value("1");
  }
  function set_person($index, $value)
  {
    $this->_set_arr_value("1", $index, $value);
  }
  function set_all_persons($values)
  {
    return $this->_set_arr_values("1", $values);
  }
  function remove_last_person()
  {
    $this->_remove_last_arr_value("1");
  }
  function persons_size()
  {
    return $this->_get_arr_size("1");
  }
  function get_persons()
  {
    return $this->_get_value("1");
  }
}
class Test extends PBMessage
{
  var $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    self::$fields["Test"]["2"] = "PBString";
    $this->values["2"] = array();
    self::$fieldNames["Test"]["2"] = "person";
  }
  function person($offset)
  {
    $v = $this->_get_arr_value("2", $offset);
    return $v->get_value();
  }
  function append_person($value)
  {
    $v = $this->_add_arr_value("2");
    $v->set_value($value);
  }
  function set_person($index, $value)
  {
    $v = new self::$fields["Test"]["2"]();
    $v->set_value($value);
    $this->_set_arr_value("2", $index, $v);
  }
  function remove_last_person()
  {
    $this->_remove_last_arr_value("2");
  }
  function persons_size()
  {
    return $this->_get_arr_size("2");
  }
  function get_persons()
  {
    return $this->_get_value("2");
  }
}
?>