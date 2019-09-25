<?php
namespace App\Traits;
use App\Orders;

    class ClearNotificationsTrait {
        
        public function clearNotifications()
        {
            $orders = new Orders();
            $orders->where('seen', 0)->update(['seen' => 1]);
        }
    
    }

?>