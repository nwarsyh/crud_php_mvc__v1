<?php
class AlertCore {
    public static function alertPesan($pesanAlert, $aksiAlert, $tipeAlert)
    {
        $_SESSION['pemberitahuan'] = [
            'pesanAlert' => $pesanAlert,
            'aksiAlert' => $aksiAlert,
            'tipeAlert' => $tipeAlert
        ];
    }
    public static function pemberitahuan()
    {
        if (isset($_SESSION['pemberitahuan'])){
            echo '<div class="alert alert-' . $_SESSION['pemberitahuan']['tipeAlert'] . ' alert-dismissible fade show" role="alert">
                <strong>' . $_SESSION['pemberitahuan']['pesanAlert'] . '</strong> | ' . $_SESSION['pemberitahuan']['aksiAlert'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            unset($_SESSION['alert']);
        }
    }
}