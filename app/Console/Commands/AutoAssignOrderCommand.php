<?php

namespace App\Console\Commands;

use App\DeliveryBoy;
use App\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AutoAssignOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:assign';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = Order::where(['status' => 'Confirmed', 'delivery_id' => 0])->get();

        foreach ($orders as $order) {

            if(Carbon::now()->diffInSeconds($order-> updated_at) > '180'){

                $new_delivery = DeliveryBoy::inRandomOrder()->where(['status' => '1', 'is_staff' => 1])->first();
                if(!$new_delivery){
                    $new_delivery = DeliveryBoy::inRandomOrder()->where(['status' => '1', 'is_staff' => 0])->first();
                }

                if(!$new_delivery) {
                    return false;
                } else {
                    $delivery = DeliveryBoy::find($new_delivery->id);
                    $delivery->status = '2';
                    $delivery->update();

                    $order->delivery_id = $new_delivery->id;
                    $order->update();
                }
            }

        } // end of for each

        $this -> info('Orders Updated Successfully');

    } // end of handle

} // end of command
