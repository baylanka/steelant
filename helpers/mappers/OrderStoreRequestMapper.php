<?php

namespace helpers\mappers;

use app\Request;
use model\Connector;
use model\Order;

class OrderStoreRequestMapper
{
    public static function getModel(Request $request): Order
    {
        $order = new Order();
        $order->project = $request->get('project');
        $order->status = Order::STATUS_PENDING;
        $order->connector_id = $request->get('connectorId');
        $order->number_of_piles = $request->get('connectorCount');
        $order->delivery_address = $request->get('delivery_address');
        $order->sheet_pile_name = $request->get('usedSheetPileName');
        $order->postal_code = $request->get('postalCode');
        $order->country = $request->get('country');
        $order->delivery_date = $request->get('deliveryDate');
        return $order;
    }
}