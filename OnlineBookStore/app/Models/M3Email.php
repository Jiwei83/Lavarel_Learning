<?php
/**
 * Created by PhpStorm.
 * User: majiwei
 * Date: 1/09/2017
 * Time: 11:33 AM
 */

namespace App\Models;


class M3Email {

    public $from;    //发件人邮箱
    public $to;      //收件人邮箱
    public $cc;      //抄送
    public $attach;  //附件
    public $subject; //主题
    public $content; //内容

}