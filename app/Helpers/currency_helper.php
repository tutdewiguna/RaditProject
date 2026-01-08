<?php

if (!function_exists('format_rupiah')) {
    /**
     * Format a number as Indonesian Rupiah.
     *
     * @param int|float|string $amount
     * @return string
     */
    function format_rupiah($amount)
    {
        // Ensure numeric
        if (!is_numeric($amount)) {
            return $amount;
        }

        return "Rp " . number_format($amount, 0, ',', '.');
    }
}
