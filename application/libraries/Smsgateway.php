<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

define("USE_SPECIFIED", 0);
define("USE_ALL_DEVICES", 1);
define("USE_ALL_SIMS", 2);

class Smsgateway
{

    public $ci;
    public $api_url;
    public $api_key;
    public $api_secret;
    public $api_accont_number;

    public function __construct($gateway = array())
    {
        $this->ci = &get_instance();
        $setting_data = $this->ci->setting_data;
        $this->api_url = !empty($setting_data['sms_server_url'])? $setting_data['sms_server_url'] : "https://jacops-loppem.be/smsgateway";
        $this->api_key = !empty($setting_data['sms_api_key'])? $setting_data['sms_api_key'] : "58e64c51f5bdb38b91e3b02bbfcf63280cf1d872";
    }

    /**
     * @param string     $number      The mobile number where you want to send message.
     * @param string     $message     The message you want to send.
     * @param int|string $device      The ID of a device you want to use to send this message.
     * @param int        $schedule    Set it to timestamp when you want to send this message.
     * @param bool       $isMMS       Set it to true if you want to send MMS message instead of SMS.
     * @param string     $attachments Comma separated list of image links you want to attach to the message. Only works for MMS messages.
     * @param bool       $prioritize  Set it to true if you want to prioritize this message.
     *
     * @return array     Returns The array containing information about the message.
     * @throws Exception If there is an error while sending a message.
     */
    public function sendSingleMessage($number, $message, $device = 0, $schedule = null, $isMMS = false, $attachments = null, $prioritize = true)
    {
        $url = $this->api_url . "/services/send.php";
        $postData = array(
            'number' => $number,
            'message' => $message,
            'schedule' => $schedule,
            'key' => $this->api_key,
            'devices' => $device,
            'type' => $isMMS ? "mms" : "sms",
            'attachments' => $attachments,
            'prioritize' => $prioritize ? 1 : 0,
        );
        return $this->sendRequest($url, $postData)["messages"][0];
    }

    /**
     * @param array  $messages        The array containing numbers and messages.
     * @param int    $option          Set this to USE_SPECIFIED if you want to use devices and SIMs specified in devices argument.
     *                                Set this to USE_ALL_DEVICES if you want to use all available devices and their default SIM to send messages.
     *                                Set this to USE_ALL_SIMS if you want to use all available devices and all their SIMs to send messages.
     * @param array  $devices         The array of ID of devices you want to use to send these messages.
     * @param int    $schedule        Set it to timestamp when you want to send these messages.
     * @param bool   $useRandomDevice Set it to true if you want to send messages using only one random device from selected devices.
     *
     * @return array     Returns The array containing messages.
     *                   For example :-
     *                   [
     *                      0 => [
     *                              "ID" => "1",
     *                              "number" => "+11234567890",
     *                              "message" => "This is a test message.",
     *                              "deviceID" => "1",
     *                              "simSlot" => "0",
     *                              "userID" => "1",
     *                              "status" => "Pending",
     *                              "type" => "sms",
     *                              "attachments" => null,
     *                              "sentDate" => "2018-10-20T00:00:00+02:00",
     *                              "deliveredDate" => null
     *                              "groupID" => ")V5LxqyBMEbQrl9*J$5bb4c03e8a07b7.62193871"
     *                           ]
     *                   ]
     * @throws Exception If there is an error while sending messages.
     */
    public function sendMessages($messages, $option = USE_SPECIFIED, $devices = [], $schedule = null, $useRandomDevice = false)
    {
        $url = $this->api_url . "/services/send.php";
        $postData = [
            'messages' => json_encode($messages),
            'schedule' => $schedule,
            'key' => $this->api_key,
            'devices' => json_encode($devices),
            'option' => $option,
            'useRandomDevice' => $useRandomDevice,
        ];
        return $this->sendRequest($url, $postData)["messages"];
    }

    /**
     * @param int    $listID      The ID of the contacts list where you want to send this message.
     * @param string $message     The message you want to send.
     * @param int    $option      Set this to USE_SPECIFIED if you want to use devices and SIMs specified in devices argument.
     *                            Set this to USE_ALL_DEVICES if you want to use all available devices and their default SIM to send messages.
     *                            Set this to USE_ALL_SIMS if you want to use all available devices and all their SIMs to send messages.
     * @param array  $devices     The array of ID of devices you want to use to send the message.
     * @param int    $schedule    Set it to timestamp when you want to send this message.
     * @param bool   $isMMS       Set it to true if you want to send MMS message instead of SMS.
     * @param string $attachments Comma separated list of image links you want to attach to the message. Only works for MMS messages.
     *
     * @return array     Returns The array containing messages.
     * @throws Exception If there is an error while sending messages.
     */
    public function sendMessageToContactsList($listID, $message, $option = USE_SPECIFIED, $devices = [], $schedule = null, $isMMS = false, $attachments = null)
    {
        $url = $this->api_url . "/services/send.php";
        $postData = [
            'listID' => $listID,
            'message' => $message,
            'schedule' => $schedule,
            'key' => $this->api_key,
            'devices' => json_encode($devices),
            'option' => $option,
            'type' => $isMMS ? "mms" : "sms",
            'attachments' => $attachments,
        ];
        return $this->sendRequest($url, $postData)["messages"];
    }

    /**
     * @param int $id The ID of a message you want to retrieve.
     *
     * @return array     The array containing a message.
     * @throws Exception If there is an error while getting a message.
     */
    public function getMessageByID($id)
    {
        $url = $this->api_url . "/services/read-messages.php";
        $postData = [
            'key' => $this->api_key,
            'id' => $id,
        ];
        return $this->sendRequest($url, $postData)["messages"][0];
    }

    /**
     * @param string $groupID The group ID of messages you want to retrieve.
     *
     * @return array     The array containing messages.
     * @throws Exception If there is an error while getting messages.
     */
    public function getMessagesByGroupID($groupID)
    {
        $url = $this->api_url . "/services/read-messages.php";
        $postData = [
            'key' => $this->api_key,
            'groupId' => $groupID,
        ];
        return $this->sendRequest($url, $postData)["messages"];
    }

    /**
     * @param string $status         The status of messages you want to retrieve.
     * @param int    $startTimestamp Search for messages sent or received after this time.
     * @param int    $endTimestamp   Search for messages sent or received before this time.
     *
     * @return array     The array containing messages.
     * @throws Exception If there is an error while getting messages.
     */
    public function getMessagesByStatus($status, $startTimestamp = null, $endTimestamp = null)
    {
        $url = $this->api_url . "/services/read-messages.php";
        $postData = [
            'key' => $this->api_key,
            'status' => $status,
            'startTimestamp' => $startTimestamp,
            'endTimestamp' => $endTimestamp,
        ];
        return $this->sendRequest($url, $postData)["messages"];
    }

    /**
     * @param int $id The ID of a message you want to resend.
     *
     * @return array     The array containing a message.
     * @throws Exception If there is an error while resending a message.
     */
    public function resendMessageByID($id)
    {
        $url = $this->api_url . "/services/resend.php";
        $postData = [
            'key' => $this->api_key,
            'id' => $id,
        ];
        return $this->sendRequest($url, $postData)["messages"][0];
    }

    /**
     * @param string $groupID The group ID of messages you want to resend.
     * @param string $status  The status of messages you want to resend.
     *
     * @return array     The array containing messages.
     * @throws Exception If there is an error while resending messages.
     */
    public function resendMessagesByGroupID($groupID, $status = null)
    {
        $url = $this->api_url . "/services/resend.php";
        $postData = [
            'key' => $this->api_key,
            'groupId' => $groupID,
            'status' => $status,
        ];
        return $this->sendRequest($url, $postData)["messages"];
    }

    /**
     * @param string $status         The status of messages you want to retrieve.
     * @param int    $startTimestamp Resend messages sent or received after this time.
     * @param int    $endTimestamp   Resend messages sent or received before this time.
     *
     * @return array     The array containing messages.
     * @throws Exception If there is an error while resending messages.
     */
    public function resendMessagesByStatus($status, $startTimestamp = null, $endTimestamp = null)
    {
        $url = $this->api_url . "/services/resend.php";
        $postData = [
            'key' => $this->api_key,
            'status' => $status,
            'startTimestamp' => $startTimestamp,
            'endTimestamp' => $endTimestamp,
        ];
        return $this->sendRequest($url, $postData)["messages"];
    }

    /**
     * @param int    $listID      The ID of the contacts list where you want to add this contact.
     * @param string $number      The mobile number of the contact.
     * @param string $name        The name of the contact.
     * @param bool   $resubscribe Set it to true if you want to resubscribe this contact if it already exists.
     *
     * @return array     The array containing a newly added contact.
     * @throws Exception If there is an error while adding a new contact.
     */
    public function addContact($listID, $number, $name = null, $resubscribe = false)
    {
        $url = $this->api_url . "/services/manage-contacts.php";
        $postData = [
            'key' => $this->api_key,
            'listID' => $listID,
            'number' => $number,
            'name' => $name,
            'resubscribe' => $resubscribe,
        ];
        return $this->sendRequest($url, $postData)["contact"];
    }

    /**
     * @param int    $listID The ID of the contacts list from which you want to unsubscribe this contact.
     * @param string $number The mobile number of the contact.
     *
     * @return array     The array containing the unsubscribed contact.
     * @throws Exception If there is an error while setting subscription to false.
     */
    public function unsubscribeContact($listID, $number)
    {
        $url = $this->api_url . "/services/manage-contacts.php";
        $postData = [
            'key' => $this->api_key,
            'listID' => $listID,
            'number' => $number,
            'unsubscribe' => true,
        ];
        return $this->sendRequest($url, $postData)["contact"];
    }

    /**
     * @return string    The amount of message credits left.
     * @throws Exception If there is an error while getting message credits.
     */
    public function getBalance()
    {
        $url = $this->api_url . "/services/send.php";
        $postData = [
            'key' => $this->api_key,
        ];
        $credits = $this->sendRequest($url, $postData)["credits"];
        return is_null($credits) ? "Unlimited" : $credits;
    }

    public function sendRequest($url, $postData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }
        curl_close($ch);
        if ($httpCode == 200) {
            $json = json_decode($response, true);
            if ($json == false) {
                if (empty($response)) {
                    throw new Exception("Missing data in request. Please provide all the required information to send messages.");
                } else {
                    throw new Exception($response);
                }
            } else {
                if ($json["success"]) {
                    return $json["data"];
                } else {
                    throw new Exception($json["error"]["message"]);
                }
            }
        } else {
            throw new Exception("HTTP Error Code : {$httpCode}");
        }
    }

    public function getSingleMessageByID($id)
    {
        $url = $this->api_url . "/services/get-single-message.php";
        $postData = [
            'key' => $this->api_key,
            'id' => $id,
        ];
        $response = $this->sendRequest($url, $postData);
        echo "<pre>"; print_r($response); die();
        return $response["message"];
    }

}
