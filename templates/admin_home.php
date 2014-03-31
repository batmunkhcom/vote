
<div class="row">
    <div class="col-lg-3">
        <form id="searchForm" action="ajax.php?action=get_by_code" method="post" style="width: 170px; float: right; margin-bottom: 10px;">
                    <input type="text" name="phone" id="searchPhone" placeholder="Код дугаараар хайх" value="">
                </form>
    </div>
    <div class="col-lg-9">
        <div id="searchResult"></div>
    </div>
</div>


<div class="row">
    <hr>
    <div class="col-lg-8">
        <div class="title">Шинэ мессэж</div>
        <?php
        $sms_new = get_sms('id DESC', 100);
        ?>
        <div class="m_list">
            <?php
            for ($i = 0; $i < mysql_num_rows($sms_new); $i++) {
                echo '<div class="row ';
                if (mysql_result($sms_new, $i, "is_valid") == 0) {
                    echo 'alert-danger';
                } else {
                    echo ' alert-success';
                }
                echo '">';
                echo '<div class="col-lg-1 text-center">' . ($i + 1) . '</div>';
                echo '<div class="col-lg-2 text-center">' . mysql_result($sms_new, $i, "phone") . '</div>';
                echo '<div class="col-lg-2 text-center">' . mysql_result($sms_new, $i, "sms") . '</div>';
                echo '<div class="col-lg-1 text-center">' . mysql_result($sms_new, $i, "score") . '</div>';
                echo '<div class="col-lg-5 text-center">' . mysql_result($sms_new, $i, "date_added") . '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="title">1-4 үеийн <span style="color:#06F">СУПЕР</span> ялагч</div>

        <div class="m_list">
            <?php
            $winners = get_winners(50);
            for ($i = 0; $i < mysql_num_rows($winners); $i++) {
                echo '<div class="row">';
                echo '<div class="col-lg-2 text-center">' . ($i + 1) . '</div>';
                echo '<div class="col-lg-3 text-center">' . mysql_result($winners, $i, "phone") . '</div>';
                echo '<div class="col-lg-7 text-center">' . mysql_result($winners, $i, "onoo") . '</div>';
                echo '</div>';
            }
            ?>
        </div>

    </div>

    <div class="clearfix"></div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="title">Блок хийгдсэн дугаарууд</div>
        <?php
        $blocks = blocked_numbers(50);
        ?>
        <div class="m_list">
            <?php
            for ($i = 0; $i < mysql_num_rows($blocks); $i++) {
                echo '<div class="row">';
                echo '<div class="col-lg-2 text-center">' . ($i + 1) . '</div>';
                echo '<div class="col-lg-3 text-center">' . mysql_result($blocks, $i, "phone") . '</div>';
                echo '<div class="col-lg-7 text-center">' . mysql_result($blocks, $i, "date_added") . '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>



<div class="row">
    <hr>
    <div class="col-lg-3">
        <div class="title">1-р үеийн ялагчид</div>

        <div class="m_list">
            <?php
            $winners = get_winners(50, 1);
            for ($i = 0; $i < mysql_num_rows($winners); $i++) {
                echo '<div class="row">';
                echo '<div class="col-lg-2 text-center">' . ($i + 1) . '</div>';
                echo '<div class="col-lg-3 text-center">' . mysql_result($winners, $i, "phone") . '</div>';
                echo '<div class="col-lg-7 text-center">' . mysql_result($winners, $i, "onoo") . '</div>';
                echo '</div>';
            }
            ?>
        </div>

    </div>
    <div class="col-lg-3">
        <div class="title">2-р үеийн ялагчид</div>

        <div class="m_list">
            <?php
            $winners = get_winners(50, 2);
            for ($i = 0; $i < mysql_num_rows($winners); $i++) {
                echo '<div class="row">';
                echo '<div class="col-lg-2 text-center">' . ($i + 1) . '</div>';
                echo '<div class="col-lg-3 text-center">' . mysql_result($winners, $i, "phone") . '</div>';
                echo '<div class="col-lg-7 text-center">' . mysql_result($winners, $i, "onoo") . '</div>';
                echo '</div>';
            }
            ?>
        </div>

    </div>
    <div class="col-lg-3">
        <div class="title">3-р үеийн ялагчид</div>

        <div class="m_list">
            <?php
            $winners = get_winners(50, 3);
            for ($i = 0; $i < mysql_num_rows($winners); $i++) {
                echo '<div class="row">';
                echo '<div class="col-lg-2 text-center">' . ($i + 1) . '</div>';
                echo '<div class="col-lg-3 text-center">' . mysql_result($winners, $i, "phone") . '</div>';
                echo '<div class="col-lg-7 text-center">' . mysql_result($winners, $i, "onoo") . '</div>';
                echo '</div>';
            }
            ?>
        </div>

    </div>
    <div class="col-lg-3">
        <div class="title">4-р үеийн ялагчид</div>

        <div class="m_list">
            <?php
            $winners = get_winners(50, 4);
            for ($i = 0; $i < mysql_num_rows($winners); $i++) {
                echo '<div class="row">';
                echo '<div class="col-lg-2 text-center">' . ($i + 1) . '</div>';
                echo '<div class="col-lg-3 text-center">' . mysql_result($winners, $i, "phone") . '</div>';
                echo '<div class="col-lg-7 text-center">' . mysql_result($winners, $i, "onoo") . '</div>';
                echo '</div>';
            }
            ?>
        </div>

    </div>
</div>


<script>
    $(function(){
        $('#searchForm').submit(function() {
                    $.ajax({
                        type: "POST",
                        url: "ajax.php?action=get_by_code",
                        data: "sms=" + $('#searchPhone').val()
                    })
                            .done(function(msg) {

                                $('#searchResult').html(msg);
                                $('#searchResult').slideDown();
                            });

                    return false;
                });
    });
</script>