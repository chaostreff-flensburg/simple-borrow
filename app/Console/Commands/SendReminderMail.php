<?php

namespace App\Console\Commands;

use App\Helpers\ItemHelper;
use App\Mail\RemindToReturnItem;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendReminderMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simple-borrow:send:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command sends a reminder mail to all users who have borrowed an item wich should be returned in 2 days.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Sending reminder mails...');
        $items = ItemHelper::getAllItemsWichShouldBeReturnedInXDays(2);
        foreach ($items as $item) {
            Mail::to($item->transactions->last()->email)->queue(new RemindToReturnItem($item));
        }
    }
}
