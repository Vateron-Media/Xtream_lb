<?php
ignore_user_abort(true);
$e013f86a9991a7d905c0ec0b786b1f54 = trim(file_get_contents("php://input"));
if ($_SERVER["REMOTE_ADDR"] != "127.0.0.1" || empty($_GET["stream_id"]) || empty($e013f86a9991a7d905c0ec0b786b1f54)) {
    die;
}
$b6497ba71489783c3747f19debe893a4 = intval($_GET["stream_id"]);
$Ecf4751835141bfcce480ec62720b500 = array_filter(array_map("trim", explode("\n", $e013f86a9991a7d905c0ec0b786b1f54)));
$output = array();
foreach ($Ecf4751835141bfcce480ec62720b500 as $Fa2325a1b301ca7c383cb69087c42d91) {
    list($Cc2a18fdf76b8e3e115b27f927e5928b, $b16944a0f2657c5e94a14137db656a79) = explode("=", $Fa2325a1b301ca7c383cb69087c42d91);
    $output[trim($Cc2a18fdf76b8e3e115b27f927e5928b)] = trim($b16944a0f2657c5e94a14137db656a79);
}
$b4ad7225f6375fe5d757d3c7147fb034 = fopen("/home/xtreamcodes/iptv_xtream_codes/streams/{$b6497ba71489783c3747f19debe893a4}_.progress", "w");
fwrite($b4ad7225f6375fe5d757d3c7147fb034, json_encode($output));
fclose($b4ad7225f6375fe5d757d3c7147fb034);
