<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\BlockLedger;

class OrderObserver
{
    private function generateHash($data, $timestamp, $previousHash)
    {
        return hash('sha256', $data . $timestamp . $previousHash);
    }

    public function created(Order $order): void
    {
        $this->recordLedger($order, 'CREATED');
    }

    public function updated(Order $order): void
    {
        $this->recordLedger($order, 'UPDATED');
    }

    private function recordLedger(Order $order, $action)
    {
        $lastBlock = BlockLedger::latest()->first();

        $previousHash = $lastBlock
            ? $lastBlock->current_hash
            : 'GENESIS';

        $timestamp = now();

        $data = json_encode([
            'action' => $action,
            'order' => $order->toArray(),
        ]);

        $currentHash = $this->generateHash(
            $data,
            $timestamp,
            $previousHash
        );

        BlockLedger::create([
            'table_name' => 'orders',
            'record_id' => $order->id,
            'data' => $data,
            'timestamp' => $timestamp,
            'previous_hash' => $previousHash,
            'current_hash' => $currentHash,
        ]);
    }
}

