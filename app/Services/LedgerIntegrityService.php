<?php

namespace App\Services;

use App\Models\BlockLedger;

class LedgerIntegrityService
{
    public static function verify(): bool
    {
        $blocks = BlockLedger::orderBy('id')->get();

        foreach ($blocks as $index => $block) {
            if ($index === 0) continue;

            $previous = $blocks[$index - 1];

            $expectedHash = hash(
                'sha256',
                $block->data . $block->timestamp . $block->previous_hash
            );

            if ($expectedHash !== $block->current_hash) {
                return false;
            }

            if ($block->previous_hash !== $previous->current_hash) {
                return false;
            }
        }

        return true;
    }
}
