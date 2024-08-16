<?php

namespace App\Console\Commands;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateExpiredCoupons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coupons:update-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status of expired coupons';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $coupon_status = Coupon::where('end_date', '<', Carbon::now())->get();
        foreach ($coupon_status as $coupon) {
            $coupon->update(['status' => 'expired']);
        }
        $this->info('Expired coupons updated successfully.');
    }
}
