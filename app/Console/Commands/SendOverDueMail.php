<?php

namespace App\Console\Commands;

use App\Helpers\ItemHelper;
use App\Mail\RemindToReturnItem;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendOverDueMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simple-borrow:send:overdue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command sends a mail to all users who have borrowed an item wich is overdue.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Sending overdue mails...');
        $items = ItemHelper::getAllItemsWichAreOverdue();
        foreach ($items as $item) {
            Mail::to($item->transactions->last()->email)->queue(new RemindToReturnItem($item));
        }
    }
}
