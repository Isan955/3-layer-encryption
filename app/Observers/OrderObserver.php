<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\BlockLedger;

class OrderObserver
{
    private function canonicalHash(array $data, string $timestamp, string $previousHash): string
    {
        ksort($data); // WAJIB agar deterministik

        return hash(
            'sha256',
            json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
            . $timestamp
            . $previousHash
        );
    }

    public function created(Order $order): void
    {
        $this->recordLedger($order, 'CREATED');
    }

    public function updated(Order $order): void
    {
        $this->recordLedger($order, 'UPDATED');
    }

    private function recordLedger(Order $order, string $action): void
    {
        // 🔑 Ambil block terakhir
        $lastBlock = BlockLedger::orderByDesc('id')->first();

        // 🔑 Previous hash (GENESIS jika kosong)
        $previousHash = $lastBlock?->current_hash ?? 'GENESIS';

        // 🔑 TIMESTAMP FORMAT MYSQL (JANGAN ISO)
        $timestamp = now()->format('Y-m-d H:i:s');

        // 🔑 Payload lengkap (SEMUA FIELD TERDETEK)
        $payload = [
            'action' => $action,
            'order'  => $order->toArray(),
        ];

        // 🔑 Hash final
        $currentHash = $this->canonicalHash(
            $payload,
            $timestamp,
            $previousHash
        );

        // 🔑 Simpan ke blockchain ledger
        BlockLedger::create([
            'table_name'   => 'orders',
            'record_id'    => $order->id,
            'data'         => json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'timestamp'    => $timestamp,
            'previous_hash'=> $previousHash,
            'current_hash' => $currentHash,
        ]);
    }
}
