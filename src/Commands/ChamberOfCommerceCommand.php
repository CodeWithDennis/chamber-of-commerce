<?php

namespace CodeWithDennis\ChamberOfCommerce\Commands;

use Illuminate\Console\Command;

class ChamberOfCommerceCommand extends Command
{
    public $signature = 'chamber-of-commerce';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
