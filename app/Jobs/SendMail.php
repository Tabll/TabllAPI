<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;
use Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $view;
    protected $data;
    protected $to;
    protected $subject;

    /**
     * Create a new job instance.
     *
     * @param  $view
     * @param  $data
     * @param  $to
     * @param  $subject
     */
    public function __construct($view, $data, $to, $subject)
    {
        $this->view = $view;
        $this->data = $data;
        $this->to = $to;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Mail::send($this->view, $this->data, function ($message) {
                $message->to($this->to)
                    ->subject($this->subject);
            });
        } catch (Exception $exception) {
            Log::error('邮件发送异常', [$exception->getMessage()]);
        }
    }
}
