<?php
//业务ID
$iBusinessID = 5;
$now         = time();

//==================================渠道================================================
$channels    = [];
$channels[1] = "快钱";
$channels[2] = "平安付";

foreach ($channels as $key => $value) {
    $sql1 = <<<TEST
    INSERT INTO `t_business_channel_rules` (`iAutoID`, `iBusinessID`, `iChannelID`, `iStatus`, `iCreateTime`, `iUpdateTime`) VALUES (NULL, {$iBusinessID}, {$key}, 1, {$now}, {$now});
    TEST;
        echo $sql1 . "\n";
        }
        echo "\n\n";

        //==================================卡类型================================================
        $cardTypes    = [];
        $cardTypes[1] = "普通卡";
        $cardTypes[2] = "信用卡";
        $cardTypes[3] = "渠道";

        foreach ($cardTypes as $key => $value) {
            $sql2 = <<<TEST
            INSERT INTO `t_business_cardtype_rules`(`iAutoID`, `iBusinessID`, `iCardType`, `iStatus`, `iCreateTime`, `iUpdateTime`) VALUES (NULL, {$iBusinessID}, {$key}, 1, {$now}, {$now});
            TEST;
                echo $sql2 . "\n";
                }
                echo "\n\n";

                //==================================普通卡 网关================================================
                $banks      = [];
                $banks[3]   = "中国工商银行";
                $banks[1]   = "招商银行";
                $banks[5]   = "中国农业银行";
                $banks[7]   = "中国建设银行";
                $banks[20]  = "平安银行";
                $banks[11]  = "浦发银行";
                $banks[26]  = "上海银行";
                $banks[9]   = "中国银行";
                $banks[12]  = "中国光大银行";
                $banks[19]  = "广发银行";
                $banks[25]  = "兴业银行";
                $banks[15]  = "中国民生银行";
                $banks[21]  = "中信银行";
                $banks[13]  = "中国交通银行";
                $banks[2]   = "上海农商银行";


                $i = 0;
                foreach ($banks as $key => $value) {
                    $sql3 = <<<TEST
                    INSERT INTO `t_business_bank_rules`(`iBusinessID`, `iBankID`, `iCardType`, `iPayType`, `iDefaultChannelID`, `iOrder`, `iStatus`, `iCreateTime`, `iUpdateTime`) VALUES ({$iBusinessID}, {$key}, 1, 1, 1, {$i}, 1, {$now}, {$now});
                    TEST;
                        echo $sql3 . "\n";
                            $i++;
                            }
                            echo "\n\n";

                            //==================================普通卡 快捷================================================
                            $banks      = [];
                            $banks[3]   = "中国工商银行";
                            $banks[1]   = "招商银行";
                            $banks[5]   = "中国农业银行";
                            $banks[7]   = "中国建设银行";
                            $banks[20]  = "平安银行";
                            $banks[11]  = "浦发银行";
                            $banks[26]  = "上海银行";
                            $banks[9]   = "中国银行";
                            $banks[12]  = "中国光大银行";
                            $banks[19]  = "广发银行";
                            $banks[25]  = "兴业银行";
                            $banks[15]  = "中国民生银行";
                            $banks[23]  = "华夏银行";


                            $i = 0;
                            foreach ($banks as $key => $value) {
                                $sql4 = <<<TEST
                                INSERT INTO `t_business_bank_rules`(`iBusinessID`, `iBankID`, `iCardType`, `iPayType`, `iDefaultChannelID`, `iOrder`, `iStatus`, `iCreateTime`, `iUpdateTime`) VALUES ({$iBusinessID}, {$key}, 1, 2, 1, {$i}, 1, {$now}, {$now});
                                TEST;
                                    echo $sql4 . "\n";
                                        $i++;
                                        }
                                        echo "\n\n";

                                        //==================================信用卡 普通================================================
                                        $banks      = [];
                                        $banks[3]   = "中国工商银行";
                                        $banks[1]   = "招商银行";
                                        $banks[5]   = "中国农业银行";
                                        $banks[7]   = "中国建设银行";
                                        $banks[20]  = "平安银行";
                                        $banks[11]  = "浦发银行";
                                        $banks[26]  = "上海银行";
                                        $banks[9]   = "中国银行";
                                        $banks[12]  = "中国光大银行";
                                        $banks[19]  = "广发银行";
                                        $banks[25]  = "兴业银行";
                                        $banks[15]  = "中国民生银行";


                                        $i = 0;
                                        foreach ($banks as $key => $value) {
                                            $sql5 = <<<TEST
                                            INSERT INTO `t_business_bank_rules` (`iBusinessID`, `iBankID`, `iCardType`, `iPayType`, `iDefaultChannelID`, `iOrder`, `iStatus`, `iCreateTime`, `iUpdateTime`) VALUES ({$iBusinessID}, {$key}, 2, 1, 1, {$i}, 1, {$now}, {$now});
                                            TEST;
                                                echo $sql5 . "\n";
                                                    $i++;
                                                    }
                                                    echo "\n\n";

                                                    //==================================信用卡 快捷================================================
                                                    $banks[21]  = "中信银行";
                                                    $banks[23]  = "华夏银行";

                                                    $i = 0;
                                                    foreach ($banks as $key => $value) {
                                                        $sql6 = <<<TEST
                                                        INSERT INTO `t_business_bank_rules`(`iBusinessID`, `iBankID`, `iCardType`, `iPayType`, `iDefaultChannelID`, `iOrder`, `iStatus`, `iCreateTime`, `iUpdateTime`) VALUES ({$iBusinessID}, {$key}, 2, 2, 1, {$i}, 1, {$now}, {$now});
                                                        TEST;
                                                            echo $sql6 . "\n";
                                                                $i++;
                                                                }

                                                                ?>
