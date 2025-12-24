<?php

namespace App\Services;

use App\Models\BlockLedger;

class LedgerIntegrityService
{
    // 🔐 HASH CANONICAL (INTI SISTEM)
    private static function canonicalHash(array $data, string $previousHash, string $timestamp): string
    {
        ksort($data); // ❗ PENTING
        return hash(
            'sha256',
            json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
            . $timestamp
            . $previousHash
        );
    }

    // ➕ SIMPAN BLOCK BARU
    public static function store(array $data): void
    {
        $lastBlock = BlockLedger::orderByDesc('id')->first();

        $timestamp = now()->toISOString();
        $previousHash = $lastBlock?->current_hash ?? 'GENESIS';

        $currentHash = self::canonicalHash($data, $previousHash, $timestamp);

        BlockLedger::create([
            'data' => json_encode($data),
            'previous_hash' => $previousHash,
            'current_hash' => $currentHash,
            'timestamp' => $timestamp
        ]);
    }

    // 🔍 VERIFIKASI FULL LEDGER
    public static function verify(): array
    {
        $blocks = BlockLedger::orderBy('id')->get();

        foreach ($blocks as $index => $block) {

            $data = json_decode($block->data, true);

            $recalculatedHash = self::canonicalHash(
                $data,
                $block->previous_hash,
                $block->timestamp
            );

            // ❌ DATA DIUBAH
            if ($recalculatedHash !== $block->current_hash) {
                return [
                    'status' => 'COMPROMISED',
                    'block_id' => $block->id,
                    'reason' => 'DATA MODIFIED'
                ];
            }

            // ❌ RANTAI PUTUS
            if ($index > 0 && $block->previous_hash !== $blocks[$index - 1]->current_hash) {
                return [
                    'status' => 'COMPROMISED',
                    'block_id' => $block->id,
                    'reason' => 'CHAIN BROKEN'
                ];
            }
        }

        return ['status' => 'SECURE'];
    }
}
