<?php

namespace mamadali\bale;

use yii\base\InvalidConfigException;

/**
 *
 * @property-read null|mixed $input
 */
class Bale extends BaleBase
{

    public $apiUrl = "https://tapi.bale.ai/bot";
    /**
     * Token taken from botFather
     * @var string
     */
    public $botToken;

    /**
     * Username of your bot
     * @var string
     */

    public $enableCsrfValidation = false;

    public function init()
    {
        if(!$this->botToken){
            throw new InvalidConfigException('The "botToken" property must be set.');
        }
        parent::init();
    }

    /**
	 *   sample
	 *   Yii::$app->bale->setWebhook([
	 *       'url' => url,
	 *   ]);
	 * @param array $options
	 * @return false|mixed|null
	 */
	public function setWebhook(array $options)
	{
		return $this->send('setWebhook', $options);
	}


	/**
     *   sample
     *   Yii::$app->bale->sendMessage([
     *       'chat_id' => $chat_id,
     *       'text' => 'test',
     *       'reply_markup' => json_encode($reply_markup)
     *       'reply_to_message_id' => $reply_to_message_id,
     *       'disable_web_page_preview' => $disable_web_page_preview,
     *   ]);
     * @param array $options
     * @return false|mixed|null
     */
    public function sendMessage(array $options){
        return $this->send('sendMessage', $options);
    }

    /**
     *   sample
     *   Yii::$app->bale->sendPhoto([
     *       'chat_id' => $chat_id,
     *       'photo' => 'path/to/test.jpg',//realpath
     *       'caption' => $caption,
     *       'reply_to_message_id' => $reply_to_message_id,
     *       'reply_markup' => $reply_markup
     *   ]);
     * @param array $options
     * @return false|mixed|null
     */
    public function sendPhoto(array $options)
    {
        return $this->send('sendPhoto', $options);
    }

    /**
     *   sample
     *   Yii::$app->bale->sendAudio([
     *       'chat_id' => $chat_id,
     *       'audio' => 'path/to/test.ogg',//realpath
     *       'caption' => '',
     *       'duration' => 0,
     *       'reply_to_message_id' => $reply_to_message_id,
     *       'reply_markup' => $reply_markup
     *   ]);
     */
    public function sendAudio(array $options)
    {
        return $this->send('sendAudio', $options);
    }

    /**
     *   sample
     *   Yii::$app->bale->sendDocument([
     *       'chat_id' => $chat_id,
     *       'document' => 'path/to/test.pdf',//realpath
     *       'caption' => '',
     *       'reply_to_message_id' => $reply_to_message_id,
     *       'reply_markup' => $reply_markup
     *   ]);
     * @param array $options
     * @return false|mixed|null
     */
    public function sendDocument(array $options)
    {
        return $this->send('sendDocument', $options);
    }

    /**
     *   sample
     *   Yii::$app->bale->sendVideo([
     *       'chat_id' => $chat_id,
     *       'video' => 'path/to/test.mp4',//realpath
     *       'duration' => 0,
     *       'width' => Integer,//Video width
     *       'height' => Integer, //Video height
     *       'caption' => $caption,
     *       'reply_to_message_id' => $reply_to_message_id,
     *       'reply_markup' => $reply_markup,
     *       'thumb' => InputFile or String,
     *       'supports_streaming' => Boolean, //Pass True, if the uploaded video is suitable for streaming
     *       'disable_notification' => Boolean,//Sends the message silently. Users will receive a notification with no sound.
     *   ]);
     * @param array $options
     * @return false|mixed|null
     */
    public function sendVideo(array $options)
    {
        return $this->send("/sendVideo", $options);
    }

}