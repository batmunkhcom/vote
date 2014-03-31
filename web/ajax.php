<?php

require_once 'config.php';
require_once 'common.php';

switch ($_GET['action']) {
    case 'close_it':
//        mysql_query("UPDATE temtseen SET is_closed=1");
        break;
    case 'top10':
        $top10 = get_winners(10);
        break;
    case 'top10_s':
        $top10 = get_winners(10, $_POST['stage']);
        $r = array();
        for ($i = 0; $i < mysql_num_rows($top10); $i++) {
            
            $r[$i] = array(
                'phone' => mysql_result($top10, $i, 'phone'),
                'onoo' => mysql_result($top10, $i, 'onoo')
            );
        }
        echo json_encode($r);
        break;
    case 'sms_chat':
        $q_sms = "SELECT * FROM sms ";
        if (isset($_SESSION['sms_chat_date'])) {
            $q_sms .= "WHERE date_added>'" . $_SESSION['sms_chat_date'] . "'";
        }
        $q_sms .=" ORDER BY id DESC LIMIT 1";
//        echo $q_sms;
        $sms = mysql_query($q_sms);
        $r = array();
        for ($i = 0; $i < mysql_num_rows($sms); $i++) {
            $r[$i] = array(
                'phone' => mysql_result($sms, $i, 'phone'),
                'sms' => mysql_result($sms, $i, 'sms'),
//                'sms' => $q_sms,
                'date_added' => mysql_result($sms, $i, 'date_added')
            );
            $_SESSION['sms_chat_date'] = mysql_result($sms, $i, 'date_added');
        }
        echo json_encode($r);
        break;
    case 'search':
        $q_sms = "SELECT * FROM sms WHERE phone='" . $_POST['phone'] . "'";
        $q_sms .=" ORDER BY id ASC";
//        echo $q_sms;
        $sms = mysql_query($q_sms);

        echo '<div class="searchOnoo">Та <span>' . get_onoo($_POST['phone']) . '</span> оноогоор ' . get_bairlal($_POST['phone']) . '-р байранд байна.</div>';

        for ($i = 0; $i < mysql_num_rows($sms); $i++) {
            echo '<div class="searchItem">';
            echo '<div class="searchPhone">' . mysql_result($sms, $i, 'phone') . '</div>';
            echo '<div class="searchSms">' . mysql_result($sms, $i, 'sms') . '</div>';
            echo '<div class="searchDate">' . mysql_result($sms, $i, 'date_added') . '</div>';
            echo '<br clear="all" />';
            echo '</div>';
        }

        break;
    case 'get_by_code':
        $q_sms = "SELECT * FROM sms WHERE sms='" . addslashes($_POST['sms']) . "' ";
        $q_sms .=" ORDER BY id ASC LIMIT 1";
//        echo $q_sms;
        $sms = mysql_query($q_sms);
        if (mysql_num_rows($sms) == 1) {
            echo '<div class="searchItem">';
            echo '<div class="searchPhone">' . mysql_result($sms, $i, 'phone') . '</div>';
//            echo '<div class="searchPhone"> нийт' . get_onoo(mysql_result($sms, $i, 'phone')) . ' оноотой</div>';
            echo '<div class="searchSms">' . mysql_result($sms, $i, 'sms') . '</div>';
            echo '<div class="searchDate">' . mysql_result($sms, $i, 'date_added') . '</div>';

            //code shalgah
            echo '<div class="searchDate" style="padding-left: 10px; text-align:center; color: #333333;">' ;
            $tbl = 'code' . $suffix[$_POST['sms']{0}];
            $q_check_code = "SELECT * FROM " . $tbl . " WHERE code='" . addslashes($_POST['sms']) . "' LIMIT 1";
            $r_check_code = mysql_query($q_check_code);

            if(mysql_num_rows($r_check_code) == 0){
                echo 'Код олдсонгүй';
            }else{
                if(mysql_result($r_check_code, 0,'usage') == 0){
                    echo 'Ашиглагдсан зөв код байна';
                }else{
                    echo 'Ашиглагдаагүй зөв код байна';
                }
            }
            echo  '</div>';
            echo '<br clear="all" />';
            echo '</div>';
        } else {
            echo 'Юу ч олдсонгүй';
        }
        break;
}