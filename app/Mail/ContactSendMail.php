<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $kana;
    private $email;
    private $tel;
    private $address;
    private $gender;
    private $birth;
    private $career;
    private $appeal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->name = $inputs['name'];
        $this->kana = $inputs['kana'];
        $this->email = $inputs['email'];
        $this->tel = $inputs['tel'];
        $this->address = $inputs['address'];
        $this->gender = $inputs['gender'];
        $this->birth = $inputs['birth'];
        $this->career = $inputs['career'];
        $this->appeal = $inputs['appeal'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('ご応募ありがとうございます。（自動返信メール）')
        ->view('contact.mail')
        ->with([
            'name' => $this->name,
            'kana' => $this->kana,
            'email' => $this->email,
            'tel' => $this->tel,
            'address'  => $this->address,
            'gender'  => $this->gender,
            'birth'  => $this->birth,
            'career'  => $this->career,
            'appeal'  => $this->appeal,
        ]);;
    }
}
