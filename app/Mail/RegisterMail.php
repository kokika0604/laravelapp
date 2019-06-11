<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

      // 引数で受け取ったデータ用の変数
    protected $info;

    public function __construct($info)
    {
      // 引数で受け取ったデータを変数にセット
      $this->info = $info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
          ->subject('登録成功のお知らせ') // メールタイトル
          ->view('user.mail') // どのテンプレートを呼び出すか
          ->with(['info' => $this->info]); // withオプションでセットしたデータをテンプレートへ受け渡す
    }
}
