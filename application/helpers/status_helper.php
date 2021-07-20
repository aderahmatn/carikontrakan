<?php
function status($status)
{
    switch ($status) {
        case 'ditolak':
            return
                '<span class="badge badge-danger">' . ucwords($status) . '</span>';
            break;
        case 'menunggu pembayaran':
            return
                '<span class="badge badge-warning">' . ucwords($status) . '</span>';
            break;
        case 'menunggu konfirmasi':
            return
                '<span class="badge badge-primary">' . ucwords($status) . '</span>';
            break;
        case 'konfirmasi':
            return
                '<span class="badge badge-success">' . ucwords($status) . '</span>';
            break;
        case 'pesanan dibatalkan':
            return
                '<span class="badge badge-danger">' . ucwords($status) . '</span>';
            break;

        default:
            return
                '<span class="badge badge-warning">' . ucwords($status) . '</span>';
            break;
    }
}
