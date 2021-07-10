<?php
function status($status)
{
    switch ($status) {
        case 'cancel':
            return
                '<span class="badge badge-danger">' . $status . '</span>';
            break;
        case 'menunggu konfirmasi':
            return
                '<span class="badge badge-warning">' . $status . '</span>';
            break;
        case 'terkonfirmasi':
            return
                '<span class="badge badge-primary">' . $status . '</span>';
            break;
        case 'ditolak':
            return
                '<span class="badge badge-danger">' . $status . '</span>';
            break;

        default:
            return
                '<span class="badge badge-warning">' . $status . '</span>';
            break;
    }
}
